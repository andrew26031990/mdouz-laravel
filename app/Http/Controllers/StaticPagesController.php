<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaticPagesRequest;
use App\Http\Requests\UpdateStaticPagesRequest;
use App\Repositories\LangModelRepository;
use App\Repositories\StaticPagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class StaticPagesController extends AppBaseController
{
    /** @var  StaticPagesRepository */
    private $staticPagesRepository;
    private $langModelRepository;

    public function __construct(StaticPagesRepository $staticPagesRepo, LangModelRepository $langModelRepo)
    {
        $this->staticPagesRepository = $staticPagesRepo;
        $this->langModelRepository = $langModelRepo;
    }

    /**
     * Display a listing of the StaticPages.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $staticPages = $this->staticPagesRepository->all();
        $lang = $this->langModelRepository->all();
        return view('static_pages.index')
            ->with('staticPages', $staticPages)->with('language', $lang);
    }

    /**
     * Show the form for creating a new StaticPages.
     *
     * @return Response
     */
    public function create()
    {
        $lang = $this->langModelRepository->all();
        $templates = DB::table('templates')->get();
        return view('static_pages.create')->with('language', $lang)->with('templates', $templates);
    }

    public function getTemplateFields(){
        $id = $_GET['id'];
        $template_fields = DB::table('template_fields')->where('template_id', '=', $id)->get();
        $html = '';
        foreach ($template_fields as $template_field){
            $html .= '<div class="col-md-4 name-block">
                            <div class="form-group field-customfield-0-name required">
                                <label class="control-label" for="customfield-0-name">Название поля</label>
                                <input type="text" id="customfield-0-name" class="form-control" name="CustomField[0][name]" maxlength="255" aria-invalid="true" value="'.$template_field->name.'">
                            </div>
                        </div>
                        <div class="col-md-8 text-block">
                            <div class="form-group field-customfield-0-text required">
                                <label class="control-label" for="customfield-0-text">Текст поля на текущем языке</label>
                                <textarea id="customfield-0-text" class="form-control" name="CustomField[0][text]" rows="3"></textarea>

                                <p class="help-block help-block-error"></p>
                            </div>
                        </div>';
        }
        return $html;

    }

    /**
     * Store a newly created StaticPages in storage.
     *
     * @param CreateStaticPagesRequest $request
     *
     * @return Response
     */
    public function store(CreateStaticPagesRequest $request)
    {
        dd($request);
        $input = $request->all();

        $staticPages = $this->staticPagesRepository->create($input);

        Flash::success('Static Pages saved successfully.');

        return redirect(route('staticPages.index'));
    }

    /**
     * Display the specified StaticPages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $staticPages = $this->staticPagesRepository->find($id);

        if (empty($staticPages)) {
            Flash::error('Static Pages not found');

            return redirect(route('staticPages.index'));
        }

        return view('static_pages.show')->with('staticPages', $staticPages);
    }

    /**
     * Show the form for editing the specified StaticPages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $staticPages = $this->staticPagesRepository->find($id);

        if (empty($staticPages)) {
            Flash::error('Static Pages not found');

            return redirect(route('staticPages.index'));
        }

        return view('static_pages.edit')->with('staticPages', $staticPages);
    }

    /**
     * Update the specified StaticPages in storage.
     *
     * @param int $id
     * @param UpdateStaticPagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStaticPagesRequest $request)
    {
        $staticPages = $this->staticPagesRepository->find($id);

        if (empty($staticPages)) {
            Flash::error('Static Pages not found');

            return redirect(route('staticPages.index'));
        }

        $staticPages = $this->staticPagesRepository->update($request->all(), $id);

        Flash::success('Static Pages updated successfully.');

        return redirect(route('staticPages.index'));
    }

    /**
     * Remove the specified StaticPages from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $staticPages = $this->staticPagesRepository->find($id);

        if (empty($staticPages)) {
            Flash::error('Static Pages not found');

            return redirect(route('staticPages.index'));
        }

        $this->staticPagesRepository->delete($id);

        Flash::success('Static Pages deleted successfully.');

        return redirect(route('staticPages.index'));
    }
}
