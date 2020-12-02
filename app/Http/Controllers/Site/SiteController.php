<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleCategoryTranslateRepository;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lavary\Menu\Menu as LavMenu;
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
        //Menu
        $arrMenu = DB::table('article_category')->
            join('article_category_translate', 'article_category_translate.article_category_id', '=', 'article_category.id')->
            join('lang', 'article_category_translate.lang_id', '=', 'lang.id')->where('article_category_translate.lang_id', $lang_selected[0]->id)->
            where('article_category.menu', 1)->select('article_category.id as id', 'article_category.parent_id as parent_id', 'article_category_translate.title as title')->get();
        $menu = $this->buildMenu($arrMenu);
        //Menu

        //Latest news
        $latest_news = DB::table('article')->
            join('article_translate', 'article_translate.article_id', '=', 'article.id')->
            join('lang', 'article_translate.lang_id', '=', 'lang.id')->where('article_translate.lang_id', $lang_selected[0]->id)->
            where('article.on_home', 1)->select('article.id as id', 'article.published_at as published_at', 'article.thumbnail_base_url as thumbnail_base_url', 'article.thumbnail_path as thumbnail_path', 'article_translate.title as at_title', 'article_translate.slug as at_slug', 'article_translate.description as at_description')->orderBy('article.id', 'desc')->limit(6)->get();
        //dd($latest_news);
        //Latest news
        return view('site.sliders.sliders', ['menu' => $menu])->with('language', $lang)->with('latest_news', $latest_news);
    }

    public function buildMenu ($arrMenu){
        $mBuilder = (new \Lavary\Menu\Menu)->make('MyNav', function($m) use ($arrMenu){
            foreach($arrMenu as $item){
                if($item->parent_id === null){
                    $m->add($item->title, $item->id)->id($item->id);
                }
                else {
                    if($m->find($item->parent_id)){
                        $m->find($item->parent_id)->add($item->title, $item->id)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
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
