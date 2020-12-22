<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleCategoryRequest;
use App\Http\Requests\UpdateArticleCategoryRequest;
use App\Repositories\ArticleCategoryRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ArticleCategoryTranslateRepository;
use App\Repositories\LangModelRepository;
use App\Repositories\LogsRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;

class ArticleCategoryController extends AppBaseController
{
    /** @var  ArticleCategoryRepository */
    private $articleCategoryRepository;
    private $langModelRepository;
    private $articleCategoryTranslateRepository;
    private $logsRepository;

    public function __construct(ArticleCategoryRepository $articleCategoryRepo, LangModelRepository $langModelRepo, ArticleCategoryTranslateRepository $articleCategoryTranslateRepo,  LogsRepository $logsRepo)
    {
        $this->articleCategoryRepository = $articleCategoryRepo;
        $this->langModelRepository = $langModelRepo;
        $this->articleCategoryTranslateRepository = $articleCategoryTranslateRepo;
        $this->logsRepository = $logsRepo;
    }

    /**
     * Display a listing of the ArticleCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lang = $this->langModelRepository->all();
        $articleCategories = $this->articleCategoryRepository->all();
        $article_category_translate = DB::table('article_category_translate')->get();
        return view('article_categories.index')
            ->with('articleCategories', $articleCategories)->with('article_category_translate', $article_category_translate)->with('language', $lang);
    }

    /**
     * Show the form for creating a new ArticleCategory.
     *
     * @return Response
     */
    public function create()
    {
        $lang = $this->langModelRepository->all();
        $parentCategories = DB::table('article_category')->get();
        return view('article_categories.create')->with('language', $lang)->with('parentCategories', $parentCategories);
    }

    /**
     * Store a newly created ArticleCategory in storage.
     *
     * @param CreateArticleCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleCategoryRequest $request)
    {
        $input = $request->all();
        try{
            $id = $this->articleCategoryRepository->create(array('parent_id'=>$request->parent, 'status' => $request->status, 'menu' => $request->menu, 'name' => $request->name));
            foreach($input['Fields'] as $key => $part){
                $this->articleCategoryTranslateRepository->create(array('article_category_id'=>$id->id, 'title' => $part['title'], 'slug' => $part['link'], 'lang_id' => $key));
            }

            $description = 'User '.Auth::user()->name.' stored article category with id '.$id;

            $this->logsRepository->create(array('event' => 'store article', 'description'=>$description, 'ip'=> request()->ip(), 'date'=> strtotime('today GMT')));

            Flash::success('Категория успешно сохранена');
            return redirect(route('articleCategories.index'));
        }catch (\Exception $ex){
            Flash::error('Невозможно сохранить категорию'.$ex);
            return redirect(route('articleCategories.index'));
        }

    }

    /**
     * Display the specified ArticleCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articleCategory = $this->articleCategoryRepository->find($id);

        if (empty($articleCategory)) {
            Flash::error('Категория не найдена');

            return redirect(route('articleCategories.index'));
        }

        return view('article_categories.show')->with('articleCategory', $articleCategory);
    }

    /**
     * Show the form for editing the specified ArticleCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $articleCategory = $this->articleCategoryRepository->find($id);
        $lang = $this->langModelRepository->all();
        if (empty($articleCategory)) {
            Flash::error('Категория не найдена');

            return redirect(route('articleCategories.index'));
        }
        $lang = $this->langModelRepository->all();
        $parentCategories = DB::table('article_category')->get();

        $translations = DB::table('article_category_translate')->where('article_category_id', $id)->get();
        $translations_lang_array = DB::table('article_category_translate')->where('article_category_id', $id)->select('article_category_translate.lang_id as act_lang')->get();
        $new_array = $this->getArray($translations_lang_array);

        return view('article_categories.edit')->with('articleCategory', $articleCategory)->
            with('parentCategories', $parentCategories)->with('language', $lang)->with('translations', $translations)->with('new_array', $new_array);
    }

    public function getArray($translations_lang_array){
        $arr = [];
        foreach ($translations_lang_array as $key => $item){
            array_push($arr, $item->act_lang);
        }
        return $arr;
    }

    /**
     * Update the specified ArticleCategory in storage.
     *
     * @param int $id
     * @param UpdateArticleCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleCategoryRequest $request)
    {
        $articleCategory = $this->articleCategoryRepository->find($id);

        if (empty($articleCategory)) {
            Flash::error('Категория не найдена');

            return redirect(route('articleCategories.index'));
        }

        try{
            DB::table('article_category')->where('id', $id)->update(['status' => $request->status, 'menu' => $request->menu, 'name' => $request->name]);
            foreach($request['Fields'] as $key => $part){
                DB::table('article_category_translate')->
                    updateOrInsert(['article_category_translate.article_category_id' => $id, 'lang_id' => $key], ['title' => $part['title'], 'slug' => $part['link']]);
            }

            $description = 'User '.Auth::user()->name.' updated article category with id '.$id;

            $this->logsRepository->create(array('event' => 'store article', 'description'=>$description, 'ip'=> request()->ip(), 'date'=> strtotime('today GMT')));


            Flash::success('Категория успешно обновлена');
            return redirect(route('articleCategories.index'));
        }catch (\Exception $ex){
            Flash::error('Невозможно обновить категорию'.$ex);
            return redirect(route('articleCategories.index'));
        }

        $articleCategory = $this->articleCategoryRepository->update($request->all(), $id);

        Flash::success('Категория успешно обновлена');

        return redirect(route('articleCategories.index'));
    }

    /**
     * Remove the specified ArticleCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articleCategory = $this->articleCategoryRepository->find($id);

        if (empty($articleCategory)) {
            Flash::error('Категория не найдена');

            return redirect(route('articleCategories.index'));
        }

        try{
            DB::table('article_category_translate')->where('article_category_id', '=', $id)->delete();
            $this->articleCategoryRepository->delete($id);

            $description = 'User '.Auth::user()->name.' destroyed article category with id '.$id;

            $this->logsRepository->create(array('event' => 'destroy article', 'description'=>$description, 'ip'=> request()->ip(), 'date'=> strtotime('today GMT')));

            Flash::success('Категория успешно удалена');
            return redirect(route('articleCategories.index'));
        }catch (\Exception $ex){
            Flash::error('Невозможно удалить категорию'.$ex);
            return redirect(route('articleCategories.index'));
        }

    }
}
