<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKeyStorageRequest;
use App\Http\Requests\UpdateKeyStorageRequest;
use App\Repositories\KeyStorageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KeyStorageController extends AppBaseController
{
    /** @var  KeyStorageRepository */
    private $keyStorageRepository;

    public function __construct(KeyStorageRepository $keyStorageRepo)
    {
        $this->keyStorageRepository = $keyStorageRepo;
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
        return view('key_storages.create');
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

        $keyStorage = $this->keyStorageRepository->create($input);

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
     * @return Response
     */
    public function edit($id)
    {
        $keyStorage = $this->keyStorageRepository->find($id);

        if (empty($keyStorage)) {
            Flash::error('Key Storage not found');

            return redirect(route('keyStorages.index'));
        }

        return view('key_storages.edit')->with('keyStorage', $keyStorage);
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
