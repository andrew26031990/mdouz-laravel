<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSocialModelRequest;
use App\Http\Requests\UpdateSocialModelRequest;
use App\Repositories\SocialModelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SocialModelController extends AppBaseController
{
    /** @var  SocialModelRepository */
    private $socialModelRepository;

    public function __construct(SocialModelRepository $socialModelRepo)
    {
        $this->socialModelRepository = $socialModelRepo;
    }

    /**
     * Display a listing of the SocialModel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $social = $this->socialModelRepository->all();

        return view('social_models.index')
            ->with('social', $social);
    }

    /**
     * Show the form for creating a new SocialModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('social_models.create');
    }

    /**
     * Store a newly created SocialModel in storage.
     *
     * @param CreateSocialModelRequest $request
     *
     * @return Response
     */
    public function store(CreateSocialModelRequest $request)
    {
        $input = $request->all();

        $socialModel = $this->socialModelRepository->create($input);

        Flash::success('Social Model saved successfully.');

        return redirect(route('social.index'));
    }

    /**
     * Display the specified SocialModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $socialModel = $this->socialModelRepository->find($id);

        if (empty($socialModel)) {
            Flash::error('Social Model not found');

            return redirect(route('social.index'));
        }

        return view('social_models.show')->with('socialModel', $socialModel);
    }

    /**
     * Show the form for editing the specified SocialModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $socialModel = $this->socialModelRepository->find($id);

        if (empty($socialModel)) {
            Flash::error('Social Model not found');

            return redirect(route('social.index'));
        }

        return view('social_models.edit')->with('socialModel', $socialModel);
    }

    /**
     * Update the specified SocialModel in storage.
     *
     * @param int $id
     * @param UpdateSocialModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSocialModelRequest $request)
    {
        $socialModel = $this->socialModelRepository->find($id);

        if (empty($socialModel)) {
            Flash::error('Social Model not found');

            return redirect(route('social.index'));
        }

        $socialModel = $this->socialModelRepository->update($request->all(), $id);

        Flash::success('Social Model updated successfully.');

        return redirect(route('social.index'));
    }

    /**
     * Remove the specified SocialModel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $socialModel = $this->socialModelRepository->find($id);

        if (empty($socialModel)) {
            Flash::error('Social Model not found');

            return redirect(route('social.index'));
        }

        $this->socialModelRepository->delete($id);

        Flash::success('Social Model deleted successfully.');

        return redirect(route('social.index'));
    }
}
