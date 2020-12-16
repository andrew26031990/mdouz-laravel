<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleCategoryTranslateRepository;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lavary\Menu\Menu as LavMenu;
use App\Common\Utility;
class SiteController extends Controller
{
    private $langModelRepository;

    public function __construct(LangModelRepository $langModelRepo)
    {
        $this->langModelRepository = $langModelRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = $this->langModelRepository->all();
        $lang_selected = DB::table('lang')->where('lang.url', app()->getLocale())->get();

        $portals = $this->getPortalsView($lang_selected[0]->id);
        //Menu
        $menu = $this->buildMenu($lang_selected[0]->id);
        //Menu
        //Latest news
        $latest_news = $this->latestNews($lang_selected[0]->id);
        //Latest news
        //Socials
        $socials = $this->getSocials();
        //Socials
        $tendering = $this->getTendering($lang_selected[0]->id);

        $getBottomArticles = $this->bottom_articles($lang_selected[0]->id);
        //dd($getBottomArticles);
        return view('site.sliders.sliders', ['menu' => $menu])->
            with('language', $lang)->with('latest_news', $latest_news)->
            with('socials', $socials)->with('portals', $portals)->with('tendering', $tendering)->with('bottom_articles', $getBottomArticles);
    }

    public function buildMenu ($lang_id){
        $arrMenu = DB::table('article_category')->
        join('article_category_translate', 'article_category_translate.article_category_id', '=', 'article_category.id')->
        join('lang', 'article_category_translate.lang_id', '=', 'lang.id')->where('article_category_translate.lang_id', $lang_id)->
        where('article_category.menu', 1)->where('article_category_translate.slug', '!=', 'video')->
        select('article_category.id as id', 'article_category.parent_id as parent_id', 'article_category_translate.title as title', 'article_category_translate.slug as slug')->get();

        $mBuilder = (new \Lavary\Menu\Menu)->make('MyNav', function($m) use ($arrMenu){
            $parent = '';
            foreach($arrMenu as $item){
                if($item->parent_id === null){
                    $m->add($item->title, app()->getLocale().'/'.$item->slug)->id($item->id);
                    $parent = $item->slug;
                }
                else {
                    if($m->find($item->parent_id)){
                        $m->find($item->parent_id)->add($item->title, app()->getLocale().'/'.$item->slug)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }

    /*public function latestNews ($lang_id){
        return $latest_news = DB::table('article')->
            join('article_translate', 'article_translate.article_id', '=', 'article.id')->
            join('lang', 'article_translate.lang_id', '=', 'lang.id')->where('article_translate.lang_id', $lang_id)->
            where('article.on_home', 1)->select('article.id as id', 'article.published_at as published_at', 'article.thumbnail_base_url as thumbnail_base_url', 'article.thumbnail_path as thumbnail_path', 'article_translate.title as at_title', 'article_translate.slug as at_slug', 'article_translate.description as at_description')->orderBy('article.id', 'desc')->limit(6)->get();
    }*/

    public function latestNews ($lang_id){
        return $latest_news = DB::table('article')->
            join('article_translate', 'article_translate.article_id', '=', 'article.id')->
            join('article_category', 'article_category.id', '=', 'article.category_id')->
            join('article_category_translate', 'article_category_translate.article_category_id', '=', 'article_category.id')->
            join('lang', 'article_translate.lang_id', '=', 'lang.id')->where('article_translate.lang_id', $lang_id)->where('article_category_translate.lang_id', $lang_id)->
            where('article.on_home', 1)->select('article.id as id', 'article.published_at as published_at', 'article.thumbnail_base_url as thumbnail_base_url', 'article.thumbnail_path as thumbnail_path', 'article_translate.title as at_title', 'article_translate.slug as at_slug', 'article_translate.description as at_description', 'article_category_translate.slug as act_slug', 'article_category_translate.title as act_title')->orderBy('article.id', 'desc')->limit(6)->get();
    }

    public function bottom_articles ($lang_id){
        return $latest_news = DB::table('article')->
            join('article_translate', 'article_translate.article_id', '=', 'article.id')->
            join('article_category', 'article_category.id', '=', 'article.category_id')->
            join('article_category_translate', 'article_category_translate.article_category_id', '=', 'article_category.id')->
            join('lang', 'article_translate.lang_id', '=', 'lang.id')->where('article_translate.lang_id', $lang_id)->where('article_category_translate.lang_id', $lang_id)->
            select('article.id as id', 'article.published_at as published_at', 'article.thumbnail_base_url as thumbnail_base_url', 'article.thumbnail_path as thumbnail_path', 'article_translate.title as at_title', 'article_translate.slug as at_slug', 'article_translate.description as at_description', 'article_category_translate.slug as act_slug', 'article_category_translate.title as act_title')->orderBy('article.id', 'desc')->get();
    }

    public function getPortalsView ($lang_id){
        return $latest_news = DB::table('key_storage_item')->
            join('key_storage_item_translate', 'key_storage_item_translate.key_storage_item_id', '=', 'key_storage_item.id')
            ->where('key_storage_item_translate.lang_id', '=',$lang_id)->
            select('key_storage_item.id as ksi_id', 'key_storage_item_translate.value as ksit_value', 'key_storage_item.base_url as ksi_base_url', 'key_storage_item.path as ksi_path', 'key_storage_item_translate.comment as ksit_comment')->
            get();
    }

    public function getSocials(){
        return DB::table('social')->get();
    }

    public function getTendering($lang_id){
        return DB::table('article_translate')->
            join('article', 'article.id', '=', 'article_translate.article_id')->
            join('article_category','article.category_id', '=', 'article_category.id')->
            join('article_category_translate', 'article_category.id', '=', 'article_category_translate.article_category_id')->
            where('article_translate.lang_id', '=', $lang_id)->
            where('article_category_translate.lang_id', '=', $lang_id)->
            where('article_category.id', '=', 26)->
            where('article_translate.lang_id', '=', $lang_id)->
            select('article_category_translate.slug as act_slug', 'article.published_at as a_published', 'article_translate.slug as at_slug', 'article_translate.title as at_title', 'article_category_translate.title as act_title')->
            limit(5)->get();
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

    public function search(Request $request)
    {
        $search = $request->input('search_field');
        $lang = $this->langModelRepository->all();
        $lang_selected = DB::table('lang')->where('lang.url', app()->getLocale())->get();
        $menu = $this->buildMenu($lang_selected[0]->id);
        $latest_news = $this->latestNews($lang_selected[0]->id);
        $articles = DB::table('article_category_translate')->
            join('article_category', 'article_category_translate.article_category_id', '=', 'article_category.id')->
            join('article', 'article_category.id', '=', 'article.category_id')->
            join('article_translate', 'article.id', '=', 'article_translate.article_id')->
            where('article_translate.lang_id', $lang_selected[0]->id)->
            where('article_category_translate.lang_id', $lang_selected[0]->id)->
            where('article_translate.title', 'like', '%' . $search . '%')->
            select(['article_translate.article_id as ac_id', 'article_category_translate.slug as ac_slug', 'article.published_at as date_published', 'article.thumbnail_base_url as base_url', 'article.thumbnail_path as image_name', 'article_translate.title as title', 'article_translate.description as description', 'article_translate.slug as slug'])->
            paginate(9);
        return view('site.search.search', ['menu' => $menu])->with('language', $lang)->
            with('latest_news', $latest_news)->with('articles', $articles)->
            with('socials', $this->getSocials())->with('portals', $this->getPortalsView($lang_selected[0]->id))->with('tendering', $this->getTendering($lang_selected[0]->id));
    }
}
