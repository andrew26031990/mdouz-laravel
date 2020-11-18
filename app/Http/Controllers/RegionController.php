<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegionModelRequest;
use App\Http\Requests\UpdateRegionModelRequest;
use App\Models\CountryTranslate;
use App\Models\RegionTranslate;
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

        $langModel = $this->langModelRepository->all();
        foreach ($langModel as $lang){
            $userData = array('lang_id' => $lang->id, 'region_id' => $regionModel->id, 'name'=>'');
            RegionTranslate::create($userData);
        }

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
        $regionModel = DB::table('region')->
            join('country', 'region.country_id', '=', 'country.id')->
            join('country_translate', 'country.id', '=', 'country_translate.country_id')->
            where('country_translate.lang_id', 3)->where('country_translate.country_id', $id)->
            select('country_translate.name as ct_name', 'region.created_at as r_date')->get();
        $regionTranslate = DB::table('region_translate')->
            join('lang', 'region_translate.lang_id', '=', 'lang.id')->
            where('region_translate.region_id', $id)->
            select('region_translate.name as rt_name', 'lang.name as l_name')->get();
        if (empty($regionModel)) {
            Flash::error('Region Model not found');

            return redirect(route('region.index'));
        }

        return view('region_models.show')->with('regionModel', $regionModel)->with('regionTranslate', $regionTranslate);
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
        $regionTranslate = DB::table('region_translate')->
            join('lang', 'region_translate.lang_id', '=', 'lang.id')->
            where('region_translate.region_id', $id)->
            select('region_translate.name as rt_name', 'lang.name as l_name', 'lang.url as l_url', 'lang.id as l_id')->get();
        $countries = DB::table('country')->
            join('country_translate', 'country_translate.country_id', '=', 'country.id')->
            where('country_translate.lang_id', 3)->
            select('country.id as c_id', 'country_translate.name as ct_name')->
            get();
        if (empty($regionModel)) {
            Flash::error('Region Model not found');

            return redirect(route('region.index'));
        }

        return view('region_models.edit')->with('regionModel', $regionModel)->with('regionTranslate', $regionTranslate)->with('countries', $countries);
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
        DB::table('region')->where('region.id', $request->region_id)->update(array('country_id' => $request->country_id));
        foreach ($request->except('_token', 'created_at', 'region_id', '_method') as $key => $part) {
            DB::table('region_translate')->where('region_translate.lang_id', $key)->where('region_translate.region_id', $request->region_id)->update(array('name' => $part));
        }

        //$regionModel = $this->regionModelRepository->update($request->all(), $id);

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
        DB::table('region_translate')->where('region_id', $id)->delete();
        $this->regionModelRepository->delete($id);


        Flash::success('Region Model deleted successfully.');

        return redirect(route('region.index'));
    }
}
