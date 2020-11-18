<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityModelRequest;
use App\Http\Requests\UpdateCityModelRequest;
use App\Models\CityTranslate;
use App\Models\RegionTranslate;
use App\Repositories\CityModelRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class CityModelController extends AppBaseController
{
    /** @var  CityModelRepository */
    private $cityModelRepository;
    private $langModelRepository;

    public function __construct(CityModelRepository $cityModelRepo, LangModelRepository $langModelRepo)
    {
        $this->cityModelRepository = $cityModelRepo;
        $this->langModelRepository = $langModelRepo;
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
        $city = DB::table('city')->
            join('region', 'city.region_id', '=', 'region.id')->
            join('region_translate', 'region_translate.region_id', '=', 'region.id')->
            where('region_translate.lang_id', 3)->
            select('region_translate.name as rt_name', 'city.created_at as c_date', 'city.id as c_id')->
            get();
        $regions = DB::table('region')->join('region_translate', 'region_translate.region_id', '=', 'region.id')
            ->where('region_translate.lang_id', 3)->get();
        $cityTranslate = DB::table('city_translate')->get();
        $lang = $this->langModelRepository->all();
        return view('city_models.index')
            ->with('city', $city)->with('lang', $lang)->with('cityTranslate', $cityTranslate)->with('regions', $regions);
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

        $langModel = $this->langModelRepository->all();
        foreach ($langModel as $lang){
            $userData = array('lang_id' => $lang->id, 'city_id' => $cityModel->id, 'name'=>'');
            CityTranslate::create($userData);
        }
        Flash::success('City saved successfully.');

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
        $cityModel = DB::table('city')->
            join('region', 'city.region_id', '=', 'region.id')->
            join('region_translate', 'region_translate.region_id', '=', 'region.id')->
            where('region_translate.lang_id', 3)->where('region_translate.region_id', $id)->
            select('region_translate.name as rt_name', 'city.created_at as c_date')->get();
        $cityTranslate = DB::table('city_translate')->
            join('lang', 'city_translate.lang_id', '=', 'lang.id')->
            where('city_translate.city_id', $id)->
            select('city_translate.name as ct_name', 'lang.name as l_name')->get();
        if (empty($cityModel)) {
            Flash::error('City not found');

            return redirect(route('city.index'));
        }

        return view('city_models.show')->with('cityModel', $cityModel)->with('cityTranslate', $cityTranslate);
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
        $cityTranslate = DB::table('city_translate')->
            join('lang', 'city_translate.lang_id', '=', 'lang.id')->
            where('city_translate.city_id', $id)->
            select('city_translate.name as ct_name', 'lang.name as l_name', 'lang.url as l_url', 'lang.id as l_id')->get();
        $regions = DB::table('region')->
            join('region_translate', 'region_translate.region_id', '=', 'region.id')->
            where('region_translate.lang_id', 3)->
            select('region.id as r_id', 'region_translate.name as rt_name')->
            get();
        if (empty($cityModel)) {
            Flash::error('City not found');

            return redirect(route('city.index'));
        }

        return view('city_models.edit')->with('cityModel', $cityModel)->with('regions', $regions)->with('cityTranslate', $cityTranslate);
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

        DB::table('city')->where('city.id', $request->city_id)->update(array('region_id' => $request->region_id));
        foreach ($request->except('_token', 'created_at', 'region_id', '_method') as $key => $part) {
            DB::table('city_translate')->where('city_translate.lang_id', $key)->where('city_translate.city_id', $request->city_id)->update(array('name' => $part));
        }
        //$cityModel = $this->cityModelRepository->update($request->all(), $id);

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

        DB::table('city_translate')->where('city_id', $id)->delete();
        $this->cityModelRepository->delete($id);

        Flash::success('City Model deleted successfully.');

        return redirect(route('city.index'));
    }
}
