<?php

namespace App\Http\Controllers;

use App\Models\EventsPhotos;
use App\Http\Requests\CreateEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\EventsRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LangModelRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class EventsController extends AppBaseController
{
    /** @var  EventsRepository */
    private $eventsRepository;
    private $langModelRepository;

    public function __construct(EventsRepository $eventsRepo, LangModelRepository $langModelRepo)
    {
        $this->eventsRepository = $eventsRepo;
        $this->langModelRepository = $langModelRepo;
    }

    /**
     * Display a listing of the Events.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $events = $this->eventsRepository->all();
        $events = DB::table('events')->join('article_category', 'article_category.id', '=', 'events.category_id')->
            select('article_category.name as ac_name', 'events.*')->paginate(10);
        return view('events.index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new Events.
     *
     * @return Response
     */
    public function create()
    {
        $lang = $this->langModelRepository->all();
        $categories = DB::table('article_category')->get();
        return view('events.create')->with('language', $lang)->with('categories', $categories);
    }

    /**
     * Store a newly created Events in storage.
     *
     * @param CreateEventsRequest $request
     *
     * @return Response
     */
    public function store(CreateEventsRequest $request)
    {
        $input = $request->all();
        try{

            $newEvent = $this->eventsRepository->create(array('category_id' => $request->article_category_id, 'date_events' => strtotime($request->date_event),
                'longitude' => $request->longitude, 'latitude' => $request->latitude, 'address' => $request->address, 'created_at' => strtotime('today GMT'), 'updated_at' => strtotime('today GMT')));
            if(isset($input['imageFile'][0]) && $input['imageFile'][0] !== null){
                $this->fileUpload($request, $newEvent->id);
            }

            foreach ($input['EventsTimetable'] as $key => $value){ //lang
                foreach($input['EventsTimetable'][$key] as $key2 => $value2){ //count
                    foreach($input['EventsTimetable'][$key][$key2] as $key3 => $value3) { //field
                        dd($key . ' ' . $key2 . ' ' . $key3. ' ' .$value3);
                    }
                }
            }

            foreach ($input['Fields'] as $key => $value){ //lang
                DB::table('events_translate')->insert(array('lang_id' => $key, 'events_id' => $newEvent->id, 'title' => $value['title'], 'description' => $value['description'], 'slug' => $value['link']));
            }

            Flash::success('Event saved successfully.');

            return redirect(route('events.index'));
        }catch (\Exception $ex){
            Flash::error('Unable to save event'.$ex->getMessage());

            return redirect(route('events.index'));
        }

        /*foreach ($input['EventsTimetable'] as $key => $value){ //lang
            foreach($input['EventsTimetable'][$key] as $key2 => $value2){ //count
                foreach($input['EventsTimetable'][$key][$key2] as $key3 => $value3) { //field
                    dd($key . ' ' . $key2 . ' ' . $key3. ' ' .$value3);
                }
            }
        }*/
        //$events = $this->eventsRepository->create($input);


    }

    public function fileUpload(Request $request, $events_id)
    {
        $baseUrl = '/uploads/events_photos';
        if ($request->hasfile('imageFile')) {
            foreach ($request->file('imageFile') as $file) {
                $name = date('Ymdhis').'_'.$file->getClientOriginalName();
                DB::table('events_photos')->insert(array('events_id' => $events_id, 'path' => $file->getClientOriginalName(), 'base_url' => $baseUrl));
                $file->move(public_path().$baseUrl, $name);
            }
        }
    }

    /**
     * Display the specified Events.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $events = $this->eventsRepository->find($id);

        if (empty($events)) {
            Flash::error('Events not found');

            return redirect(route('events.index'));
        }

        return view('events.show')->with('events', $events);
    }

    /**
     * Show the form for editing the specified Events.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $events = $this->eventsRepository->find($id);

        if (empty($events)) {
            Flash::error('Events not found');

            return redirect(route('events.index'));
        }

        return view('events.edit')->with('events', $events);
    }

    /**
     * Update the specified Events in storage.
     *
     * @param int $id
     * @param UpdateEventsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventsRequest $request)
    {
        $events = $this->eventsRepository->find($id);

        if (empty($events)) {
            Flash::error('Events not found');

            return redirect(route('events.index'));
        }

        $events = $this->eventsRepository->update($request->all(), $id);

        Flash::success('Events updated successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified Events from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $events = $this->eventsRepository->find($id);

        if (empty($events)) {
            Flash::error('Events not found');

            return redirect(route('events.index'));
        }

        $this->eventsRepository->delete($id);

        Flash::success('Events deleted successfully.');

        return redirect(route('events.index'));
    }
}
