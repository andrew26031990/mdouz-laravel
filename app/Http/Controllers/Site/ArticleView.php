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

        if(str_contains($request->server('REQUEST_URI'), 'video')){
            $view = 'video';
            $article = DB::table('video_translate')->
                join('video', 'video_translate.video_id', '=', 'video.id')->
                where('video_translate.slug', $request->segment(3))->
                where('video_translate.lang_id', $lang_selected[0]->id)->get();
            return view("site.article.$view", ['menu' => $menu])->with('language', $lang)->
            with('latest_news', $latest_news)->with('article', $article)->
            with('socials', $this->siteController->getSocials())
                ->with('portals', $this->siteController->getPortalsView($lang_selected[0]->id))
                ->with('tendering', $this->siteController->getTendering($lang_selected[0]->id))
                ->with('bottom_articles', $this->siteController->bottom_articles($lang_selected[0]->id))
                ->with('bottom_articles_title', $this->siteController->bottom_articles_title($lang_selected[0]->id));
        }else{
            $view = 'article';
            $article = DB::table('article_translate')->
                join('article', 'article_translate.article_id', '=', 'article.id')->
                where('article_translate.slug', $request->segment(3))->
                where('article_translate.lang_id', $lang_selected[0]->id)->get();
            $article_attachment = DB::table('article_attachment')->
                where('article_attachment.article_id', $article[0]->id)->get();
            return view("site.article.$view", ['menu' => $menu])->with('language', $lang)->
            with('latest_news', $latest_news)->with('article', $article)->with('article_attachment', $article_attachment)->
            with('socials', $this->siteController->getSocials())
                ->with('portals', $this->siteController->getPortalsView($lang_selected[0]->id))
                ->with('tendering', $this->siteController->getTendering($lang_selected[0]->id))
                ->with('bottom_articles', $this->siteController->bottom_articles($lang_selected[0]->id))
                ->with('bottom_articles_title', $this->siteController->bottom_articles_title($lang_selected[0]->id));
        }



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
