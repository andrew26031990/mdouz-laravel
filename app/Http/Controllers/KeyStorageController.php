<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKeyStorageRequest;
use App\Http\Requests\UpdateKeyStorageRequest;
use App\Repositories\KeyStorageRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Response;

class KeyStorageController extends AppBaseController
{
    /** @var  KeyStorageRepository */
    private $keyStorageRepository;
    private $langModelRepository;

    public function __construct(KeyStorageRepository $keyStorageRepo, LangModelRepository $langModelRepo)
    {
        $this->keyStorageRepository = $keyStorageRepo;
        $this->langModelRepository = $langModelRepo;
    }

    /**
     * Display a listing of the KeyStorage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $keyStorages = $this->keyStorageRepository->all();

        return view('key_storages.index')
            ->with('keyStorages', $keyStorages);
    }

    /**
     * Show the form for creating a new KeyStorage.
     *
     * @return Response
     */
    public function create()
    {
        $lang = $this->langModelRepository->all();
        return view('key_storages.create')->with('language', $lang);
    }

    /**
     * Store a newly created KeyStorage in storage.
     *
     * @param CreateKeyStorageRequest $request
     *
     * @return Response
     */
    public function store(CreateKeyStorageRequest $request)
    {
        $input = $request->all();
        try{
            if($request->keyword !== null){
                $keyStorage = $this->keyStorageRepository->create(array('keyword' => $request->keyword, 'created_at' => strtotime('today GMT'), 'updated_at' => strtotime('today GMT')));

                //Add article image
                if(isset($request['file'])){
                    $this->fileUpload($request, $keyStorage->id);
                }

                foreach ($request['Fields']  as $key => $part){
                    DB::table('key_storage_item_translate')->updateOrInsert(['key_storage_item_id' => $keyStorage->id, 'lang_id'=>$key],['value' => $part['value'], 'comment' => $part['comment']]);
                }
            }else{
                Flash::error('Не задано ключевое слово');
                return redirect(route('keyStorages.index'));
            }
        }catch (\Exception $ex){
            Flash::error('Ошибка сохранения: '.$ex->getMessage());
            return redirect(route('keyStorages.index'));
        }

        Flash::success('Key Storage saved successfully.');

        return redirect(route('keyStorages.index'));
    }

    public function fileUpload(Request $request, $key_storage_item_id)
    {
        $baseUrl = '/uploads/key_storage_item_images';
        $file = $request->file('file');
        $name = date('Ymdhis').'_'.$file->getClientOriginalName();
        DB::table('key_storage_item')->where('id', $key_storage_item_id)->update(array('base_url' => $baseUrl, 'path' => $name));
        $file->move(public_path().$baseUrl, $name);
    }

    /**
     * Display the specified KeyStorage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $keyStorage = $this->keyStorageRepository->find($id);

        if (empty($keyStorage)) {
            Flash::error('Key Storage not found');

            return redirect(route('keyStorages.index'));
        }

        return view('key_storages.show')->with('keyStorage', $keyStorage);
    }

    /**
     * Show the form for editing the specified KeyStorage.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        $keyStorage = $this->keyStorageRepository->find($id);

        if (empty($keyStorage)) {
            Flash::error('Key Storage not found');

            return redirect(route('keyStorages.index'));
        }

        $lang = $this->langModelRepository->all();

        $keystorage_translate = DB::table('key_storage_item_translate')->where('key_storage_item_translate.key_storage_item_id', $id)->get();

        return view('key_storages.edit')->with('keyStorage', $keyStorage)->with('language', $lang)->with('keystorage_translate', $keystorage_translate);
    }

    /**
     * Update the specified KeyStorage in storage.
     *
     * @param int $id
     * @param UpdateKeyStorageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeyStorageRequest $request)
    {
        $keyStorage = $this->keyStorageRepository->find($id);

        if (empty($keyStorage)) {
            Flash::error('Key Storage not found');

            return redirect(route('keyStorages.index'));
        }

        $updated = $this->keyStorageRepository->update(array('keyword' => $request->keyword), $id);

        if(isset($request['file'])){
            if($keyStorage->base_url !== null || $keyStorage->path != null){
                unlink(public_path($keyStorage->base_url.'/'.$keyStorage->path));
            }
            $this->fileUpload($request, $id);
        }

        //Add article translation fields
        foreach($request['Fields'] as $key => $part){
            DB::table('key_storage_item_translate')->updateOrInsert(['lang_id'=>$key, 'key_storage_item_id'=>$keyStorage->id] ,['value' => $part['value'], 'comment' => $part['comment']]);
        }

        $keyStorage = $this->keyStorageRepository->update($request->all(), $id);

        Flash::success('Key Storage updated successfully.');

        return redirect(route('keyStorages.index'));
    }

    public function deleteFile($base_url, $path)
    {
        //dd(public_path().$base_url.'/'.$path);
        unlink(public_path().$base_url.'/'.$path);
    }

    /**
     * Remove the specified KeyStorage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $keyStorage = $this->keyStorageRepository->find($id);

        if (empty($keyStorage)) {
            Flash::error('Key Storage not found');

            return redirect(route('keyStorages.index'));
        }

        $this->keyStorageRepository->delete($id);

        Flash::success('Key Storage deleted successfully.');

        return redirect(route('keyStorages.index'));
    }
}
