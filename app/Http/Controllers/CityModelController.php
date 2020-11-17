<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityModelRequest;
use App\Http\Requests\UpdateCityModelRequest;
use App\Repositories\CityModelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CityModelController extends AppBaseController
{
    /** @var  CityModelRepository */
    private $cityModelRepository;

    public function __construct(CityModelRepository $cityModelRepo)
    {
        $this->cityModelRepository = $cityModelRepo;
    }

    /**
     * Display a listing of the CityModel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $city = $this->cityModelRepository->all();

        return view('city_models.index')
            ->with('city', $city);
    }

    /**
     * Show the form for creating a new CityModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('city_models.create');
    }

    /**
     * Store a newly created CityModel in storage.
     *
     * @param CreateCityModelRequest $request
     *
     * @return Response
     */
    public function store(CreateCityModelRequest $request)
    {
        $input = $request->all();

        $cityModel = $this->cityModelRepository->create($input);

        Flash::success('City Model saved successfully.');

        return redirect(route('city.index'));
    }

    /**
     * Display the specified CityModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cityModel = $this->cityModelRepository->find($id);

        if (empty($cityModel)) {
            Flash::error('City Model not found');

            return redirect(route('city.index'));
        }

        return view('city_models.show')->with('cityModel', $cityModel);
    }

    /**
     * Show the form for editing the specified CityModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cityModel = $this->cityModelRepository->find($id);

        if (empty($cityModel)) {
            Flash::error('City Model not found');

            return redirect(route('city.index'));
        }

        return view('city_models.edit')->with('cityModel', $cityModel);
    }

    /**
     * Update the specified CityModel in storage.
     *
     * @param int $id
     * @param UpdateCityModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCityModelRequest $request)
    {
        $cityModel = $this->cityModelRepository->find($id);

        if (empty($cityModel)) {
            Flash::error('City Model not found');

            return redirect(route('city.index'));
        }

        $cityModel = $this->cityModelRepository->update($request->all(), $id);

        Flash::success('City Model updated successfully.');

        return redirect(route('city.index'));
    }

    /**
     * Remove the specified CityModel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cityModel = $this->cityModelRepository->find($id);

        if (empty($cityModel)) {
            Flash::error('City Model not found');

            return redirect(route('city.index'));
        }

        $this->cityModelRepository->delete($id);

        Flash::success('City Model deleted successfully.');

        return redirect(route('city.index'));
    }
}
