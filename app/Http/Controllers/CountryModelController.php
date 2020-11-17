<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountryModelRequest;
use App\Http\Requests\UpdateCountryModelRequest;
use App\Models\CountryTranslate;
use App\Repositories\CountryModelRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class CountryModelController extends AppBaseController
{
    /** @var  CountryModelRepository */
    private $countryModelRepository;
    private $langModelRepository;

    public function __construct(CountryModelRepository $countryModelRepo, LangModelRepository $langModelRepo)
    {
        $this->countryModelRepository = $countryModelRepo;
        $this->langModelRepository = $langModelRepo;
    }

    /**
     * Display a listing of the CountryModel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $country = DB::table('country')->get();
        $countryTranslate = DB::table('country_translate')->get();
        $lang = $this->langModelRepository->all();
        return view('country_models.index')
            ->with('country', $country)->with('lang', $lang)->with('countryTranslate', $countryTranslate);
    }

    /**
     * Show the form for creating a new CountryModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('country_models.create');
    }

    /**
     * Store a newly created CountryModel in storage.
     *
     * @param CreateCountryModelRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryModelRequest $request)
    {
        $input = $request->all();

        $countryModel = $this->countryModelRepository->create($input);
        $langModel = $this->langModelRepository->all();
        foreach ($langModel as $lang){
            $userData = array('lang_id' => $lang->id, 'country_id' => $countryModel->id, 'name'=>'');
            CountryTranslate::create($userData);
        }
        Flash::success('Country saved successfully.');
        //return view('country_models.edit')->with('countryModel', $countryModel);
        return redirect(route('country.index'));
    }

    /**
     * Display the specified CountryModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $countryModel = $this->countryModelRepository->find($id);
        $countryTranslate = DB::table('country_translate')->
            join('lang', 'country_translate.lang_id', '=', 'lang.id')->
            where('country_translate.country_id', $id)->
            select('country_translate.name as ct_name', 'lang.name as l_name')->get();
        if (empty($countryModel)) {
            Flash::error('Country not found');

            return redirect(route('country.index'));
        }

        return view('country_models.show')->with('countryModel', $countryModel)->with('countryTranslate', $countryTranslate);
    }

    /**
     * Show the form for editing the specified CountryModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $countryModel = $this->countryModelRepository->find($id);
        $countryTranslate = DB::table('country_translate')->
            join('lang', 'country_translate.lang_id', '=', 'lang.id')->
            where('country_translate.country_id', $id)->
            select('country_translate.name as ct_name', 'lang.name as l_name', 'lang.url as l_url', 'lang.id as l_id')->get();
        if (empty($countryModel)) {
            Flash::error('Country not found');

            return redirect(route('country.index'));
        }

        return view('country_models.edit')->with('countryModel', $countryModel)->with('countryTranslate', $countryTranslate);
    }

    /**
     * Update the specified CountryModel in storage.
     *
     * @param int $id
     * @param UpdateCountryModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountryModelRequest $request)
    {
        $countryModel = $this->countryModelRepository->find($id);

        if (empty($countryModel)) {
            Flash::error('Country not found');

            return redirect(route('country.index'));
        }

        foreach ($request->except('_token', 'created_at', 'country_id', '_method') as $key => $part) {
            DB::table('country_translate')->where('country_translate.lang_id', $key)->where('country_translate.country_id', $request->country_id)->update(array('name' => $part));
        }
        //$countryModel = $this->countryModelRepository->update($request->all(), $id);

        Flash::success('Country Model updated successfully.');

        return redirect(route('country.index'));
    }

    /**
     * Remove the specified CountryModel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $countryModel = $this->countryModelRepository->find($id);

        if (empty($countryModel)) {
            Flash::error('Country not found');

            return redirect(route('country.index'));
        }
        $res=DB::table('country_translate')->where('country_id', $id)->delete();

        $this->countryModelRepository->delete($id);



        Flash::success('Country deleted successfully.');

        return redirect(route('country.index'));
    }
}
