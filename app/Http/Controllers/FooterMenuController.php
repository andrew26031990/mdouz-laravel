<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFooterMenuRequest;
use App\Http\Requests\UpdateFooterMenuRequest;
use App\Repositories\ArticleRepository;
use App\Repositories\FooterMenuRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class FooterMenuController extends AppBaseController
{
    /** @var  FooterMenuRepository */
    private $footerMenuRepository;
    private $articleRepository;
    private $langModelRepository;

    public function __construct(FooterMenuRepository $footerMenuRepo, LangModelRepository $langModelRepo, ArticleRepository $articleRepo)
    {
        $this->footerMenuRepository = $footerMenuRepo;
        $this->articleRepository = $articleRepo;
        $this->langModelRepository = $langModelRepo;
    }

    /**
     * Display a listing of the FooterMenu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $footerMenus = $this->footerMenuRepository->all();

        return view('footer_menus.index')
            ->with('footerMenus', $footerMenus);
    }

    /**
     * Show the form for creating a new FooterMenu.
     *
     * @return Response
     */
    public function create()
    {
        $lang = $this->langModelRepository->all();
        $articles = DB::table('article')->join('article_translate', 'article.id', '=', 'article_translate.article_id')->
            where('article_translate.lang_id', '=', 3)->where('article_translate.title', '!=', '')->select('article.id as id', 'article_translate.title as title')->get();
        return view('footer_menus.create')->with('articles', $articles)->with('language', $lang);
    }

    /**
     * Store a newly created FooterMenu in storage.
     *
     * @param CreateFooterMenuRequest $request
     *
     * @return Response
     */
    public function store(CreateFooterMenuRequest $request)
    {
        $input = $request->all();

        $footerMenu = DB::table('footer_menu')->insertGetId(array('title'=>$request->title, 'key'=>$request->key, 'status'=>$request->status));

        foreach($input['Fields'] as $key => $part){
            DB::table('footer_menu_translate')->insert(array('footer_menu_id'=>$footerMenu, 'lang_id' => $key, 'title' => $part['title']));
        }

        foreach ($request->articles as $article){
            DB::table('footer_menu_item')->insert(array('footer_menu_id'=>$footerMenu, 'item_id'=>$article));
        }

        Flash::success('Footer Menu saved successfully.');

        return redirect(route('footerMenus.index'));
    }

    /**
     * Display the specified FooterMenu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $footerMenu = $this->footerMenuRepository->find($id);

        if (empty($footerMenu)) {
            Flash::error('Footer Menu not found');

            return redirect(route('footerMenus.index'));
        }

        return view('footer_menus.show')->with('footerMenu', $footerMenu);
    }

    /**
     * Show the form for editing the specified FooterMenu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lang = $this->langModelRepository->all();
        $footerMenu = $this->footerMenuRepository->find($id);
        $articles = DB::table('article')->join('article_translate', 'article.id', '=', 'article_translate.article_id')->
            where('article_translate.lang_id', '=', 3)->where('article_translate.title', '!=', '')->get();
        $uploaded = DB::table('footer_menu_item')->where('footer_menu_item.footer_menu_id', '=', $id)->select('footer_menu_item.item_id')->get();
        $uploaded_articles = $this->getArray($uploaded);
        $footerMenuTranslate = DB::table('footer_menu_translate')->where('footer_menu_id', '=', $id)->get();
        if (empty($footerMenu)) {
            Flash::error('Footer Menu not found');

            return redirect(route('footerMenus.index'));
        }
        return view('footer_menus.edit')->with('footerMenu', $footerMenu)->
            with('articles', $articles)->with('uploaded_articles', $uploaded_articles)->
            with('language', $lang)->with('footer_menu_translate', $footerMenuTranslate);
    }

    public function getArray($array){
        $arr = [];
        foreach ($array as $key => $item){
            array_push($arr, $item->item_id);
        }
        return $arr;
    }

    /**
     * Update the specified FooterMenu in storage.
     *
     * @param int $id
     * @param UpdateFooterMenuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFooterMenuRequest $request)
    {
        $footerMenu = $this->footerMenuRepository->find($id);

        if (empty($footerMenu)) {
            Flash::error('Footer Menu not found');

            return redirect(route('footerMenus.index'));
        }

        $this->footerMenuRepository->update(array('title' => $request->title, 'key'=>$request->key, 'status'=>$request->status), $id);

        DB::table('footer_menu_item')->where('footer_menu_item.footer_menu_id', '=', $id)->delete();

        foreach($request['Fields'] as $key => $part){
            DB::table('footer_menu_translate')->updateOrInsert(array('footer_menu_id'=>$id, 'lang_id' => $key), array('title' => $part['title']));
        }

        foreach ($request['articles'] as $article){
            DB::table('footer_menu_item')->insert(array('footer_menu_id'=>$id, 'item_id'=>$article));
        }

        Flash::success('Footer Menu updated successfully.');

        return redirect(route('footerMenus.index'));
    }

    /**
     * Remove the specified FooterMenu from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $footerMenu = $this->footerMenuRepository->find($id);

        if (empty($footerMenu)) {
            Flash::error('Footer Menu not found');

            return redirect(route('footerMenus.index'));
        }

        $this->footerMenuRepository->delete($id);

        Flash::success('Footer Menu deleted successfully.');

        return redirect(route('footerMenus.index'));
    }
}
