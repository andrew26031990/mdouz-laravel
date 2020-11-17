<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserModelRequest;
use App\Http\Requests\UpdateUserModelRequest;
use App\Repositories\UserModelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserModelController extends AppBaseController
{
    /** @var  UserModelRepository */
    private $userModelRepository;

    public function __construct(UserModelRepository $userModelRepo)
    {
        $this->userModelRepository = $userModelRepo;
    }

    /**
     * Display a listing of the UserModel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user = $this->userModelRepository->all();

        return view('user_models.index')
            ->with('user', $user);
    }

    /**
     * Show the form for creating a new UserModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_models.create');
    }

    /**
     * Store a newly created UserModel in storage.
     *
     * @param CreateUserModelRequest $request
     *
     * @return Response
     */
    public function store(CreateUserModelRequest $request)
    {
        $input = $request->all();

        $userModel = $this->userModelRepository->create($input);

        Flash::success('User Model saved successfully.');

        return redirect(route('user.index'));
    }

    /**
     * Display the specified UserModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userModel = $this->userModelRepository->find($id);

        if (empty($userModel)) {
            Flash::error('User Model not found');

            return redirect(route('user.index'));
        }

        return view('user_models.show')->with('userModel', $userModel);
    }

    /**
     * Show the form for editing the specified UserModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userModel = $this->userModelRepository->find($id);

        if (empty($userModel)) {
            Flash::error('User Model not found');

            return redirect(route('user.index'));
        }

        return view('user_models.edit')->with('userModel', $userModel);
    }

    /**
     * Update the specified UserModel in storage.
     *
     * @param int $id
     * @param UpdateUserModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserModelRequest $request)
    {
        $userModel = $this->userModelRepository->find($id);

        if (empty($userModel)) {
            Flash::error('User Model not found');

            return redirect(route('user.index'));
        }

        $userModel = $this->userModelRepository->update($request->all(), $id);

        Flash::success('User Model updated successfully.');

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified UserModel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userModel = $this->userModelRepository->find($id);

        if (empty($userModel)) {
            Flash::error('User Model not found');

            return redirect(route('user.index'));
        }

        $this->userModelRepository->delete($id);

        Flash::success('User Model deleted successfully.');

        return redirect(route('user.index'));
    }
}
