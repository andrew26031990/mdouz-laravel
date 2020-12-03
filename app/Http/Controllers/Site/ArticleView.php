<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleView extends Controller
{
    private $articleRepository;
    private $langModelRepository;
    private $siteController;

    public function __construct(ArticleRepository $articleRepo, LangModelRepository $langModelRepo, SiteController $siteController)
    {
        $this->articleRepository = $articleRepo;
        $this->langModelRepository = $langModelRepo;
        $this->siteController = $siteController;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = $this->langModelRepository->all();
        $lang_selected = DB::table('lang')->where('lang.url', app()->getLocale())->get();
        $site_controller = $this->siteController;
        $menu = $site_controller->buildMenu($lang_selected[0]->id);
        $latest_news = $site_controller->latestNews($lang_selected[0]->id);
        $article = DB::table('article_translate')->
            join('article', 'article_translate.article_id', '=', 'article.id')->
            where('article_translate.slug', $request->segment(3))->
            where('article_translate.lang_id', $lang_selected[0]->id)->get();
        $article_attachment = DB::table('article_attachment')->
            where('article_attachment.article_id', $article[0]->id)->get();
        return view('site.article.article', ['menu' => $menu])->with('language', $lang)->
            with('latest_news', $latest_news)->with('article', $article)->with('article_attachment', $article_attachment)->
            with('socials', $this->siteController->getSocials());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
