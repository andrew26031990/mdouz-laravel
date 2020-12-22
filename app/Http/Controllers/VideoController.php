<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Repositories\LangModelRepository;
use App\Repositories\VideoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class VideoController extends AppBaseController
{
    /** @var  VideoRepository */
    private $videoRepository;
    private $langModelRepository;

    public function __construct(VideoRepository $videoRepo, LangModelRepository $langModelRepo)
    {
        $this->videoRepository = $videoRepo;
        $this->langModelRepository = $langModelRepo;
    }

    /**
     * Display a listing of the Video.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lang = $this->langModelRepository->all();
        $videos = DB::table('video')->join('article_category', 'video.category_id', '=', 'article_category.id')->
        select('article_category.name as ac_name', 'video.id as v_id', 'video.photo_path as v_pp', 'video.photo_base_path as v_pbp')->get();
        $video_translate = DB::table('video_translate')->get();
        return view('videos.index')
            ->with('videos', $videos)->with('video_translate', $video_translate)->with('language', $lang);
    }

    /**
     * Show the form for creating a new Video.
     *
     * @return Response
     */
    public function create()
    {
        $lang = $this->langModelRepository->all();
        $categories = DB::table('article_category')->get();
        return view('videos.create')->with('language', $lang)->with('categories', $categories);
    }

    /**
     * Store a newly created Video in storage.
     *
     * @param CreateVideoRequest $request
     *
     * @return Response
     */
    public function store(CreateVideoRequest $request)
    {
        $input = $request->all();

        try{
            //Add new article
            $newVideo = $this->videoRepository->create(array('category_id' => $request->category_id,
                'created_at' => strtotime('today GMT'),
                'updated_at' => strtotime('today GMT')));

            //Add image
            /*if(isset($input['video_image'])){
                $this->fileUploadMain($request, $newVideo->id, 'create');
            }*/

            //Add article translation fields
            foreach($input['Fields'] as $key => $part){
                $video_translate = DB::table('video_translate')->insertGetId(array('video_id'=>$newVideo->id, 'lang_id' => $key, 'title' => $part['title'], 'slug' => $part['link'], 'description' => $part['description'], 'youtube_url' => $part['youtube']));
                $this->fileUploadAttachment($request, $key, $newVideo->id, $video_translate, 'create');
            }

            Flash::success('Video saved successfully.');

            return redirect(route('videos.index'));
        }catch (\Exception $ex){
            Flash::error('Unable to save Video. Reason: '.$ex->getMessage());
            return redirect(route('videos.index'));
        }
        /*$input = $request->all();

        $video = $this->videoRepository->create($input);

        Flash::success('Video saved successfully.');

        return redirect(route('videos.index'));*/
    }

    /**
     * Display the specified Video.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $video = $this->videoRepository->find($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        return view('videos.show')->with('video', $video);
    }

    /**
     * Show the form for editing the specified Video.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $video = $this->videoRepository->find($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        $categories = DB::table('article_category')->get();
        $lang = $this->langModelRepository->all();
        $translations_lang_array = DB::table('video_translate')->where('video_id', $id)->select('video_translate.lang_id as at_lang')->get();
        $lang_array = $this->getArray($translations_lang_array);
        $video_translate = DB::table('video_translate')->where('video_id', $id)->get();
        return view('videos.edit')->with('video', $video)->with('categories', $categories)->
        with('language', $lang)->with('lang_array', $lang_array)->with('video_translate', $video_translate);
    }

    public function getArray($translations_lang_array){
        $arr = [];
        foreach ($translations_lang_array as $key => $item){
            array_push($arr, $item->at_lang);
        }
        return $arr;
    }

    /**
     * Update the specified Video in storage.
     *
     * @param int $id
     * @param UpdateVideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideoRequest $request)
    {
        //dd($request['Fields'][1]);
        $video = $this->videoRepository->find($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        $this->videoRepository->update(array('category_id' => $request->category_id,
            'updated_at' => strtotime('today GMT')), $id);

        /*if($request->video_image !== null){
            $this->fileUploadMain($request, $id, 'update');
        }*/

        foreach($request['Fields'] as $key => $part){
            $video_translate = DB::table('video_translate')->updateOrInsert(['lang_id'=>$key, 'video_id'=>$video->id], ['title' => $part['title'], 'slug' => $part['link'], 'description' => $part['description'], 'youtube_url' => $part['youtube']]);

            if(isset($request['Fields'][$key]['video'])){
                $this->fileUploadAttachment($request, $key, $id, $video_translate, 'update');
            }

        }
        //$video = $this->videoRepository->update($request->all(), $id);

        Flash::success('Video updated successfully.');

        return redirect(route('videos.index'));
    }

    /**
     * Remove the specified Video from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $video = $this->videoRepository->find($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        $video_translate = DB::table('video_translate')->where('video_id', '=', $video->id)->get();
        $video_image = DB::table('video')->where('id', '=', $video->id)->get();

        if($video_image[0]->photo_base_path !== null || $video_image[0]->photo_path !== null){
            if(file_exists(public_path().$video_image[0]->photo_base_path.'/'.$video_image[0]->photo_path)){
                unlink(public_path().$video_image[0]->photo_base_path.'/'.$video_image[0]->photo_path);
            }
        }

        foreach ($video_translate as $video){
            if(file_exists(public_path().$video->video_base_url.'/'.$video->video_path)){
                unlink(public_path().$video->video_base_url.'/'.$video->video_path);
            }
        }

        $this->videoRepository->delete($id);

        Flash::success('Video deleted successfully.');

        return redirect(route('videos.index'));
    }

    public function fileUploadMain(Request $request, $video_id, $action)
    {
        switch ($action) {
            case "update":
                $video_image = DB::table('video')->where('id', '=', $video_id)->get();
                if($video_image[0]->photo_base_path !== null || $video_image[0]->photo_path){
                    if(file_exists(public_path().$video_image[0]->photo_base_path.'/'.$video_image[0]->photo_path)){
                        unlink(public_path().$video_image[0]->photo_base_path.'/'.$video_image[0]->photo_path);
                    }
                }
                $baseUrl = '/uploads/video/video_photo';
                $file = $request->file('video_image');
                $name = date('Ymdhis').'_'.$file->getClientOriginalName();
                DB::table('video')->where('id', $video_id)->update(array('photo_base_path' => $baseUrl, 'photo_path' => $name));
                $file->move(public_path().$baseUrl, $name);
                break;
            case "create":
                $baseUrl = '/uploads/video/video_photo';
                $file = $request->file('video_image');
                $name = date('Ymdhis').'_'.$file->getClientOriginalName();
                DB::table('video')->where('id', $video_id)->update(array('photo_base_path' => $baseUrl, 'photo_path' => $name));
                $file->move(public_path().$baseUrl, $name);
                break;
        }
    }

    public function fileUploadAttachment(Request $request, $lang_id, $video_id, $video_translate_id, $action)
    {
        switch ($action) {
            case "update":
                $video_translate = DB::table('video_translate')->where('video_id', '=', $video_id)->where('lang_id', '=', $lang_id)->get();
                if($video_translate[0]->video_base_url !== null || $video_translate[0]->video_path){
                    if(file_exists(public_path().$video_translate[0]->video_base_url.'/'.$video_translate[0]->video_path)){
                        unlink(public_path().$video_translate[0]->video_base_url.'/'.$video_translate[0]->video_path);
                    }
                }
                $baseUrl = '/uploads/video/video_attachment';
                $language_slug = DB::table('lang')->where('id', '=', $lang_id)->first('url');
                $name = $language_slug->url.'_'.date('Ymdhis').'_'.$request->file('Fields')[$lang_id]['video']->getClientOriginalName();
                DB::table('video_translate')->updateOrInsert(['video_id'=> $video_id, 'lang_id'=> $lang_id], ['video_base_url' => $baseUrl , 'video_path' => $name]);
                $request->file('Fields')[$lang_id]['video']->move(public_path().$baseUrl, $name);
                break;
            case "create":
                $baseUrl = '/uploads/video/video_attachment';
                $language_slug = DB::table('lang')->where('id', '=', $lang_id)->first('url');
                $name = $language_slug->url.'_'.date('Ymdhis').'_'.$request->file('Fields')[$lang_id]['video']->getClientOriginalName();
                DB::table('video_translate')->where('id', $video_translate_id)->where('lang_id', $lang_id)->where('video_id', $video_id)->update(array('video_base_url' => $baseUrl, 'video_path' => $name));
                $request->file('Fields')[$lang_id]['video']->move(public_path().$baseUrl, $name);
                break;
        }

    }
}
