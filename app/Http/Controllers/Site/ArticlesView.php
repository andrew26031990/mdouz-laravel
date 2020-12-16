<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesView extends Controller
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
        if(str_contains($request->server('REQUEST_URI'), 'video')){
            $lang = $this->langModelRepository->all();
            $lang_selected = DB::table('lang')->where('lang.url', app()->getLocale())->get();
            $category = DB::table('article_category_translate')->where('article_category_translate.lang_id', $lang_selected[0]->id)->
            where('article_category_translate.slug' ,$request->segment(2))->get();
            $site_controller = $this->siteController;
            $menu = $site_controller->buildMenu($lang_selected[0]->id);
            $latest_news = $site_controller->latestNews($lang_selected[0]->id);
            $videos_from_category = DB::table('video_translate')->
                join('video', 'video_translate.video_id', '=', 'video.id')->
                join('article_category', 'article_category.id', '=', 'video.category_id')->
                join('article_category_translate', 'article_category.id', '=', 'article_category_translate.article_category_id')->
                where('article_category_translate.slug', $request->segment(2))->
                where('article_category_translate.lang_id', $lang_selected[0]->id)->
                paginate(9, ['video_translate.title']);
            dd($videos_from_category);
            return view('site.articles.articles', ['menu' => $menu])->with('language', $lang)->
            with('latest_news', $latest_news)->with('videos_from_category', $videos_from_category)->
            with('socials', $this->siteController->getSocials())->with('category', $category)->
            with('portals', $this->siteController->getPortalsView($lang_selected[0]->id))
                ->with('tendering', $this->siteController->getTendering($lang_selected[0]->id))
                ->with('bottom_articles', $this->siteController->bottom_articles($lang_selected[0]->id));
        }
        $lang = $this->langModelRepository->all();
        $lang_selected = DB::table('lang')->where('lang.url', app()->getLocale())->get();
        $category = DB::table('article_category_translate')->where('article_category_translate.lang_id', $lang_selected[0]->id)->
            where('article_category_translate.slug' ,$request->segment(2))->get();
        $site_controller = $this->siteController;
        $menu = $site_controller->buildMenu($lang_selected[0]->id);
        $latest_news = $site_controller->latestNews($lang_selected[0]->id);
        $articles_from_category = DB::table('article_category_translate')->
            join('article_category', 'article_category_translate.article_category_id', '=', 'article_category.id')->
            join('article', 'article_category.id', '=', 'article.category_id')->
            join('article_translate', 'article.id', '=', 'article_translate.article_id')->
            where('article_category_translate.slug', $request->segment(2))->
            where('article_translate.lang_id', $lang_selected[0]->id)->
            distinct()->orderBy('article.published_at', 'desc')->paginate(9, ['article.published_at as date_published', 'article.thumbnail_base_url as base_url', 'article.thumbnail_path as image_name', 'article_translate.title as title', 'article_translate.description as description', 'article_translate.slug as slug']);
        return view('site.articles.articles', ['menu' => $menu])->with('language', $lang)->
            with('latest_news', $latest_news)->with('articles_from_category', $articles_from_category)->
            with('socials', $this->siteController->getSocials())->with('category', $category)->
            with('portals', $this->siteController->getPortalsView($lang_selected[0]->id))
            ->with('tendering', $this->siteController->getTendering($lang_selected[0]->id))
            ->with('bottom_articles', $this->siteController->bottom_articles($lang_selected[0]->id));
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
