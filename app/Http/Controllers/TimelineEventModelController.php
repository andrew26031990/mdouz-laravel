<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTimelineEventModelRequest;
use App\Http\Requests\UpdateTimelineEventModelRequest;
use App\Repositories\TimelineEventModelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TimelineEventModelController extends AppBaseController
{
    /** @var  TimelineEventModelRepository */
    private $timelineEventModelRepository;

    public function __construct(TimelineEventModelRepository $timelineEventModelRepo)
    {
        $this->timelineEventModelRepository = $timelineEventModelRepo;
    }

    /**
     * Display a listing of the TimelineEventModel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $timelineEvent = $this->timelineEventModelRepository->all();

        return view('timeline_event_models.index')
            ->with('timelineEvent', $timelineEvent);
    }

    /**
     * Show the form for creating a new TimelineEventModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('timeline_event_models.create');
    }

    /**
     * Store a newly created TimelineEventModel in storage.
     *
     * @param CreateTimelineEventModelRequest $request
     *
     * @return Response
     */
    public function store(CreateTimelineEventModelRequest $request)
    {
        $input = $request->all();

        $timelineEventModel = $this->timelineEventModelRepository->create($input);

        Flash::success('Timeline Event Model saved successfully.');

        return redirect(route('timelineEvent.index'));
    }

    /**
     * Display the specified TimelineEventModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $timelineEventModel = $this->timelineEventModelRepository->find($id);

        if (empty($timelineEventModel)) {
            Flash::error('Timeline Event Model not found');

            return redirect(route('timelineEvent.index'));
        }

        return view('timeline_event_models.show')->with('timelineEventModel', $timelineEventModel);
    }

    /**
     * Show the form for editing the specified TimelineEventModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $timelineEventModel = $this->timelineEventModelRepository->find($id);

        if (empty($timelineEventModel)) {
            Flash::error('Timeline Event Model not found');

            return redirect(route('timelineEvent.index'));
        }

        return view('timeline_event_models.edit')->with('timelineEventModel', $timelineEventModel);
    }

    /**
     * Update the specified TimelineEventModel in storage.
     *
     * @param int $id
     * @param UpdateTimelineEventModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTimelineEventModelRequest $request)
    {
        $timelineEventModel = $this->timelineEventModelRepository->find($id);

        if (empty($timelineEventModel)) {
            Flash::error('Timeline Event Model not found');

            return redirect(route('timelineEvent.index'));
        }

        $timelineEventModel = $this->timelineEventModelRepository->update($request->all(), $id);

        Flash::success('Timeline Event Model updated successfully.');

        return redirect(route('timelineEvent.index'));
    }

    /**
     * Remove the specified TimelineEventModel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $timelineEventModel = $this->timelineEventModelRepository->find($id);

        if (empty($timelineEventModel)) {
            Flash::error('Timeline Event Model not found');

            return redirect(route('timelineEvent.index'));
        }

        $this->timelineEventModelRepository->delete($id);

        Flash::success('Timeline Event Model deleted successfully.');

        return redirect(route('timelineEvent.index'));
    }
}
