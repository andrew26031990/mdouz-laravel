<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegionModelRequest;
use App\Http\Requests\UpdateRegionModelRequest;
use App\Repositories\LangModelRepository;
use App\Repositories\RegionModelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class RegionController extends AppBaseController
{
    /** @var  RegionModelRepository */
    private $regionModelRepository;
    private $langModelRepository;

    public function __construct(RegionModelRepository $regionModelRepo, LangModelRepository $langModelRepo)
    {
        $this->regionModelRepository = $regionModelRepo;
        $this->langModelRepository = $langModelRepo;
    }

    /**
     * Display a listing of the RegionModel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $region = DB::table('region')->
            join('country', 'region.country_id', '=', 'country.id')->
            join('country_translate', 'country_translate.country_id', '=', 'country.id')->
            where('country_translate.lang_id', 3)->
            select('country_translate.name as ct_name', 'region.created_at as r_date', 'region.id as r_id')->
            get();
        $countries = DB::table('country')->join('country_translate', 'country_translate.country_id', '=', 'country.id')
            ->where('country_translate.lang_id', 3)->get();
        $regionTranslate = DB::table('region_translate')->get();
        $lang = $this->langModelRepository->all();
        return view('region_models.index')
            ->with('region', $region)->with('lang', $lang)->with('regionTranslate', $regionTranslate)->with('countries', $countries);
    }

    /**
     * Show the form for creating a new RegionModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('region_models.create');
    }

    /**
     * Store a newly created RegionModel in storage.
     *
     * @param CreateRegionModelRequest $request
     *
     * @return Response
     */
    public function store(CreateRegionModelRequest $request)
    {
        $input = $request->all();

        $regionModel = $this->regionModelRepository->create($input);

        Flash::success('Region Model saved successfully.');

        return redirect(route('region.index'));
    }

    /**
     * Display the specified RegionModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $regionModel = $this->regionModelRepository->find($id);

        if (empty($regionModel)) {
            Flash::error('Region Model not found');

            return redirect(route('region.index'));
        }

        return view('region_models.show')->with('regionModel', $regionModel);
    }

    /**
     * Show the form for editing the specified RegionModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $regionModel = $this->regionModelRepository->find($id);

        if (empty($regionModel)) {
            Flash::error('Region Model not found');

            return redirect(route('region.index'));
        }

        return view('region_models.edit')->with('regionModel', $regionModel);
    }

    /**
     * Update the specified RegionModel in storage.
     *
     * @param int $id
     * @param UpdateRegionModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegionModelRequest $request)
    {
        $regionModel = $this->regionModelRepository->find($id);

        if (empty($regionModel)) {
            Flash::error('Region Model not found');

            return redirect(route('region.index'));
        }

        $regionModel = $this->regionModelRepository->update($request->all(), $id);

        Flash::success('Region Model updated successfully.');

        return redirect(route('region.index'));
    }

    /**
     * Remove the specified RegionModel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $regionModel = $this->regionModelRepository->find($id);

        if (empty($regionModel)) {
            Flash::error('Region Model not found');

            return redirect(route('region.index'));
        }

        $this->regionModelRepository->delete($id);

        Flash::success('Region Model deleted successfully.');

        return redirect(route('region.index'));
    }
}
