<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\ArticleRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class ArticleController extends AppBaseController
{
    /** @var  ArticleRepository */
    private $articleRepository;
    private $langModelRepository;

    public function __construct(ArticleRepository $articleRepo, LangModelRepository $langModelRepo)
    {
        $this->articleRepository = $articleRepo;
        $this->langModelRepository = $langModelRepo;
    }

    /**
     * Display a listing of the Article.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $articles = DB::table('article')->join('article_category', 'article_category.id', '=', 'article.category_id')->
        select('article_category.name as ac_name', 'article.*')->get();
        return view('articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new Article.
     *
     * @return Response
     */
    public function create()
    {
        $lang = $this->langModelRepository->all();
        $categories = DB::table('article_category')->get();
        return view('articles.create')->with('language', $lang)->with('categories', $categories);
    }

    /**
     * Store a newly created Article in storage.
     *
     * @param CreateArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input = $request->all();
        try{
            //Add new article
            $newArticle = $this->articleRepository->create(array('category_id' => $request->category_id,
                'published_at' => strtotime('today GMT'),
                'status' => $request->status, 'on_main' => $request->on_main,
                'on_home' => $request->on_home,
                'menu' => $request->menu,
                'created_at' => strtotime('today GMT'),
                'updated_at' => strtotime('today GMT')));

            //Add article image
            if(isset($request['file'])){
                $this->fileUploadMain($request, $newArticle->id);
            }

            //Add article attachment
            if(isset($request['attachment'])){
                $this->fileUploadAttachment($request, $newArticle->id);
            }

            //Add article translation fields
            foreach($input['Fields'] as $key => $part){
                DB::table('article_translate')->insert(array('article_id'=>$newArticle->id, 'lang_id' => $key, 'title' => $part['title'], 'slug' => $part['link'], 'description' => $part['description'], 'body' => $part['body']));
            }

            Flash::success('Article saved successfully.');

            return redirect(route('articles.index'));
        }catch (\Exception $ex){
            Flash::error('Unable to save article. Reason: '.$ex->getMessage());
            return redirect(route('articles.index'));
        }
    }

    public function fileUploadMain(Request $request, $article_id)
    {
        $baseUrl = '/uploads/articles/article_photo';
        $file = $request->file('file');
        $name = date('Ymdhis').'_'.$file->getClientOriginalName();
        DB::table('article')->where('id', $article_id)->update(array('thumbnail_base_url' => $baseUrl, 'thumbnail_path' => $file->getClientOriginalName()));
        $file->move(public_path().$baseUrl, $name);
    }

    public function fileUploadAttachment(Request $request, $article_id)
    {
        $baseUrl = '/uploads/articles/article_attachment';

        foreach ($request->file('attachment') as $file) {
            $name = date('Ymdhis').'_'.$file->getClientOriginalName();
            $mimeType = $file->getClientMimeType();
            $size = $file->getSize();
            DB::table('article_attachment')->insert(array('article_id' => $article_id, 'path' => $name, 'base_url' => $baseUrl, 'base_url' => $baseUrl, 'type' => $mimeType, 'size' => $size, 'name'=>$name, 'created_at'=>strtotime('today GMT')));
            $file->move(public_path().$baseUrl, $name);
        }

    }

    /**
     * Display the specified Article.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified Article in storage.
     *
     * @param int $id
     * @param UpdateArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleRequest $request)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        $article = $this->articleRepository->update($request->all(), $id);

        Flash::success('Article updated successfully.');

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified Article from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        $this->articleRepository->delete($id);

        Flash::success('Article deleted successfully.');

        return redirect(route('articles.index'));
    }
}
