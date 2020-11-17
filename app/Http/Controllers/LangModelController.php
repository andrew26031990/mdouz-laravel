<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLangModelRequest;
use App\Http\Requests\UpdateLangModelRequest;
use App\Repositories\LangModelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LangModelController extends AppBaseController
{
    /** @var  LangModelRepository */
    private $langModelRepository;

    public function __construct(LangModelRepository $langModelRepo)
    {
        $this->langModelRepository = $langModelRepo;
    }

    /**
     * Display a listing of the LangModel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lang = $this->langModelRepository->all();

        return view('lang_models.index')
            ->with('lang', $lang);
    }

    /**
     * Show the form for creating a new LangModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('lang_models.create');
    }

    /**
     * Store a newly created LangModel in storage.
     *
     * @param CreateLangModelRequest $request
     *
     * @return Response
     */
    public function store(CreateLangModelRequest $request)
    {
        $input = $request->all();

        $langModel = $this->langModelRepository->create($input);

        Flash::success('Lang Model saved successfully.');

        return redirect(route('lang.index'));
    }

    /**
     * Display the specified LangModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $langModel = $this->langModelRepository->find($id);

        if (empty($langModel)) {
            Flash::error('Lang Model not found');

            return redirect(route('lang.index'));
        }

        return view('lang_models.show')->with('langModel', $langModel);
    }

    /**
     * Show the form for editing the specified LangModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $langModel = $this->langModelRepository->find($id);

        if (empty($langModel)) {
            Flash::error('Lang Model not found');

            return redirect(route('lang.index'));
        }

        return view('lang_models.edit')->with('langModel', $langModel);
    }

    /**
     * Update the specified LangModel in storage.
     *
     * @param int $id
     * @param UpdateLangModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLangModelRequest $request)
    {
        $langModel = $this->langModelRepository->find($id);

        if (empty($langModel)) {
            Flash::error('Lang Model not found');

            return redirect(route('lang.index'));
        }

        $langModel = $this->langModelRepository->update($request->all(), $id);

        Flash::success('Lang Model updated successfully.');

        return redirect(route('lang.index'));
    }

    /**
     * Remove the specified LangModel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $langModel = $this->langModelRepository->find($id);

        if (empty($langModel)) {
            Flash::error('Lang Model not found');

            return redirect(route('lang.index'));
        }

        $this->langModelRepository->delete($id);

        Flash::success('Lang Model deleted successfully.');

        return redirect(route('lang.index'));
    }
}
