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
        $articles = DB::table('article')->join('article_translate', 'article.id', '=', 'article_translate.article_id')->
            where('article_translate.lang_id', '=', 3)->where('article_translate.title', '!=', '')->get();
        return view('footer_menus.create')->with('articles', $articles);
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
        dd($request);
        $input = $request->all();

        $footerMenu = DB::table('footer_menu')->insertGetId(array('title'=>$request->title, 'key'=>$request->key, 'status'=>$request->status));

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
        $footerMenu = $this->footerMenuRepository->find($id);
        $articles = DB::table('article')->join('article_translate', 'article.id', '=', 'article_translate.article_id')->
            where('article_translate.lang_id', '=', 3)->where('article_translate.title', '!=', '')->get();
        $uploaded = DB::table('footer_menu_item')->where('footer_menu_item.footer_menu_id', '=', $id)->select('footer_menu_item.item_id')->get();
        $uploaded_articles = $this->getArray($uploaded);

        if (empty($footerMenu)) {
            Flash::error('Footer Menu not found');

            return redirect(route('footerMenus.index'));
        }

        return view('footer_menus.edit')->with('footerMenu', $footerMenu)->with('articles', $articles)->with('uploaded_articles', $uploaded_articles);
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
