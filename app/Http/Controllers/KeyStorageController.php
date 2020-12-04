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
                foreach ($request['Fields']  as $key => $part){
                    DB::table('key_storage_item_translate')->updateOrInsert(['key_storage_item_id' => $keyStorage->id, 'lang_id'=>$key],['value' => $part['value'], 'comment' => $part['comment']]);
                }
            }else{
                Flash::error('Не задано ключевое слово');
                return redirect(route('keyStorages.create'));
            }
        }catch (\Exception $ex){
            Flash::error('Ошибка сохранения: '.$ex->getMessage());
            return redirect(route('keyStorages.create'));
        }

        Flash::success('Key Storage saved successfully.');

        return redirect(route('keyStorages.index'));
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
        $lang = $this->langModelRepository->all();
        $keyStorage = $this->keyStorageRepository->find($id);

        if (empty($keyStorage)) {
            Flash::error('Key Storage not found');

            return redirect(route('keyStorages.index'));
        }

        return view('key_storages.fields_edit')->with('keyStorage', $keyStorage)->with('language', $lang);
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

        $keyStorage = $this->keyStorageRepository->update($request->all(), $id);

        Flash::success('Key Storage updated successfully.');

        return redirect(route('keyStorages.index'));
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
