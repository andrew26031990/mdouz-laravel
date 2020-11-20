<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaticPagesRequest;
use App\Http\Requests\UpdateStaticPagesRequest;
use App\Models\CustomField;
use App\Repositories\CustomFieldRepository;
use App\Repositories\CustomFieldTranslateRepository;
use App\Repositories\LangModelRepository;
use App\Repositories\PageTranslateRepository;
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
    private $pageTranslateRepository;
    private $customFieldRepository;
    private $customFieldTranslateRepository;

    public function __construct(StaticPagesRepository $staticPagesRepo,
                                LangModelRepository $langModelRepo,
                                PageTranslateRepository $pageTranslateRepo,
                                CustomFieldRepository $customFieldRepo,
                                CustomFieldTranslateRepository $customFieldTranslateRepo)
    {
        $this->staticPagesRepository = $staticPagesRepo;
        $this->langModelRepository = $langModelRepo;
        $this->pageTranslateRepository = $pageTranslateRepo;
        $this->customFieldRepository = $customFieldRepo;
        $this->customFieldTranslateRepository = $customFieldTranslateRepo;
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
        $pageTranslate = DB::table('page_translate')->
            join('lang', 'page_translate.lang_id', '=', 'lang.id')->
            select('page_translate.title as pt_title', 'page_translate.page_id as pt_page_id', 'page_translate.lang_id as pt_lang_id')->get();
        $lang = $this->langModelRepository->all();
        return view('static_pages.index')
            ->with('staticPages', $staticPages)->with('language', $lang)->with('pageTranslate', $pageTranslate);
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
        $i=0;
        foreach ($template_fields as $template_field){
            $html .= '<div class="col-md-4 name-block">
                            <div class="form-group field-customfield-0-name">
                                <label class="control-label" for="customfield-0-name">Название поля</label>
                                <input type="text" id="customfield-0-name" class="form-control" name="CustomField['.$i.']['.$template_field->name.']" maxlength="255" aria-invalid="true" value="'.$template_field->name.'" disabled>
                            </div>
                        </div>
                        <div class="col-md-8 text-block">
                            <div class="form-group field-customfield-0-text required">
                                <label class="control-label" for="customfield-0-text">Текст поля на текущем языке</label>
                                <textarea class="form-control" name="CustomField['.$i.']['.$template_field->name.']" rows="3"></textarea>

                                <p class="help-block help-block-error"></p>
                            </div>
                        </div>';
            $i++;
        }
        return $html;

    }

    public function translitUrl()
    {
        $value = $_GET['value'];
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
        );

        $value = mb_strtolower($value);
        $value = strtr($value, $converter);
        $value = mb_ereg_replace('[^-0-9a-z]', '-', $value);
        $value = mb_ereg_replace('[-]+', '-', $value);
        $value = trim($value, '-');

        return $value;
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
        $input = $request->all();
        $recordToPages = $this->staticPagesRepository->create(array('template_id'=>$request->template_id, 'status' => $request->status));
        $recordToPagesTranslate = $this->pageTranslateRepository->create(
            array('page_id'=>$recordToPages->id, 'lang_id' => $request->lang,
                'slug'=>$request->link, 'title'=>$request->title, 'text'=>$request->text));

        for($k=0;$k<count($input['CustomField']);$k++){
            foreach ($input['CustomField'][$k] as $key => $part) {
                if($part !== null){
                    $recordToCustomField = $this->customFieldRepository->create(array('page_id'=>$recordToPages->id, 'name' => $part));
                    $this->customFieldTranslateRepository->create(array('custom_field_id'=>$recordToCustomField->id, 'lang_id' => $request->lang, 'text'=>$key));
                }
            }
        }

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

        $lang = $this->langModelRepository->all();
        $templateStatus = DB::table('templates')->
            join('page', 'page.template_id', '=', 'templates.id')->
            where('page.id', $id)->
            select('templates.name as t_name', 'page.status as p_status')->get();
        $customFieldTranslate = DB::table('custom_field_translate')->
            join('custom_field', 'custom_field_translate.custom_field_id', '=', 'custom_field.id')->
            where('custom_field.page_id', $id)->get();
        $titleTextSlug = DB::table('page_translate')->
            where('page_translate.page_id', $id)->
            select('page_translate.lang_id as pt_lang_id', 'page_translate.slug as pt_slug', 'page_translate.title as pt_title', 'page_translate.text as pt_text')->get();

        return view('static_pages.show')->with('staticPages', $staticPages)->
            with('language', $lang)->with('templateStatus', $templateStatus)->with('customFieldTranslate', $customFieldTranslate)->
            with('titleTextSlug', $titleTextSlug);
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

        $lang = $this->langModelRepository->all();
        $templates = DB::table('templates')->get();
        $page = DB::table('page')->where('page.id', $id)->
            select('page.status as pg_status', 'page.id as pg_id')->get();

        $templateStatus = DB::table('templates')->
            join('page', 'page.template_id', '=', 'templates.id')->
            where('page.id', $id)->
            select('templates.name as t_name', 'page.status as p_status', 'templates.id as t_id')->get();

        $customFieldTranslate = DB::table('custom_field_translate')->
            join('custom_field', 'custom_field_translate.custom_field_id', '=', 'custom_field.id')->
            where('custom_field.page_id', $id)->get();

        $titleTextSlug = DB::table('page_translate')->
            where('page_translate.page_id', $id)->
            select('page_translate.lang_id as pt_lang_id', 'page_translate.slug as pt_slug', 'page_translate.title as pt_title', 'page_translate.text as pt_text')->get();


        return view('static_pages.edit')->with('staticPages', $staticPages)->
        with('language', $lang)->with('templateStatus', $templateStatus)->with('customFieldTranslate', $customFieldTranslate)->
        with('titleTextSlug', $titleTextSlug)->with('templates', $templates)->with('page', $page);
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

        $updatePages = DB::table('page')->where('id', $id)->update(['status' => $request->status]);
        $updatePagesTranslate = DB::table('page_translate')->where('page_id', $id)->where('lang_id', $request->lang)->
            update(['slug' => $request->link, 'title' => $request->title, 'text' => $request->text]);

        $getCustomFieldId = DB::table('custom_field')->where('page_id', $id)->get();
        dd($request['CustomField']);

        for($k=0;$k<count($getCustomFieldId);$k++){
            foreach ($input['CustomField'][$k] as $key => $part) {
                if($part !== null){
                    $recordToCustomField = $this->customFieldRepository->create(array('page_id'=>$recordToPages->id, 'name' => $part));
                    $this->customFieldTranslateRepository->create(array('custom_field_id'=>$recordToCustomField->id, 'lang_id' => $request->lang, 'text'=>$key));
                }
            }
        }


        //$staticPages = $this->staticPagesRepository->update($request->all(), $id);

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

        try{
            //Получение idшников из custom_fields по id
            $ids = DB::table('custom_field')->where('page_id', '=', $id)->get('id');

            //Удаление записей из custom_fields_translate по найденным idшникам
            for($k=0;$k<count($ids);$k++){
                foreach ($ids[$k] as $key => $part) {
                    DB::table('custom_field_translate')->where('custom_field_id', '=', $part)->delete();
                }
            }

            //Удаление записи из custom_fields
            DB::table('custom_field')->where('page_id', '=', $id)->delete();

            //Удаление записи из page_translate
            DB::table('page_translate')->where('page_id', '=', $id)->delete();

            //Удаление записи из page
            DB::table('page')->where('id', '=', $id)->delete();

            Flash::success('Page deleted successfully.');
            return redirect(route('staticPages.index'));
        }catch (\Exception $ex){
            Flash::error('Unable to delete your page. '.$ex->getMessage());
            return redirect(route('staticPages.index'));
        }
    }
}
