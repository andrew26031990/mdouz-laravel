<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCurrencyModelRequest;
use App\Http\Requests\UpdateCurrencyModelRequest;
use App\Repositories\CurrencyModelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CurrencyModelController extends AppBaseController
{
    /** @var  CurrencyModelRepository */
    private $currencyModelRepository;

    public function __construct(CurrencyModelRepository $currencyModelRepo)
    {
        $this->currencyModelRepository = $currencyModelRepo;
    }

    /**
     * Display a listing of the CurrencyModel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $currency = $this->currencyModelRepository->all();

        return view('currency_models.index')
            ->with('currency', $currency);
    }

    /**
     * Show the form for creating a new CurrencyModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('currency_models.create');
    }

    /**
     * Store a newly created CurrencyModel in storage.
     *
     * @param CreateCurrencyModelRequest $request
     *
     * @return Response
     */
    public function store(CreateCurrencyModelRequest $request)
    {
        $input = $request->all();

        $currencyModel = $this->currencyModelRepository->create($input);

        Flash::success('Currency Model saved successfully.');

        return redirect(route('currency.index'));
    }

    /**
     * Display the specified CurrencyModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $currencyModel = $this->currencyModelRepository->find($id);

        if (empty($currencyModel)) {
            Flash::error('Currency Model not found');

            return redirect(route('currency.index'));
        }

        return view('currency_models.show')->with('currencyModel', $currencyModel);
    }

    /**
     * Show the form for editing the specified CurrencyModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $currencyModel = $this->currencyModelRepository->find($id);

        if (empty($currencyModel)) {
            Flash::error('Currency Model not found');

            return redirect(route('currency.index'));
        }

        return view('currency_models.edit')->with('currencyModel', $currencyModel);
    }

    /**
     * Update the specified CurrencyModel in storage.
     *
     * @param int $id
     * @param UpdateCurrencyModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCurrencyModelRequest $request)
    {
        $currencyModel = $this->currencyModelRepository->find($id);

        if (empty($currencyModel)) {
            Flash::error('Currency Model not found');

            return redirect(route('currency.index'));
        }

        $currencyModel = $this->currencyModelRepository->update($request->all(), $id);

        Flash::success('Currency Model updated successfully.');

        return redirect(route('currency.index'));
    }

    /**
     * Remove the specified CurrencyModel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $currencyModel = $this->currencyModelRepository->find($id);

        if (empty($currencyModel)) {
            Flash::error('Currency Model not found');

            return redirect(route('currency.index'));
        }

        $this->currencyModelRepository->delete($id);

        Flash::success('Currency Model deleted successfully.');

        return redirect(route('currency.index'));
    }
}
