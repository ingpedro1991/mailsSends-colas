<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRegisterRequest;
use App\Http\Requests\UpdateUserRegisterRequest;
use App\Repositories\UserRegisterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Flash;
use Response;

class UserRegisterController extends AppBaseController
{
    /** @var  UserRegisterRepository */
    private $userRegisterRepository;

    public function __construct(UserRegisterRepository $userRegisterRepo)
    {
        $this->userRegisterRepository = $userRegisterRepo;
    }

    /**
     * Display a listing of the UserRegister.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userRegisters = $this->userRegisterRepository->paginate(10);

        foreach($userRegisters as $key => $usersReg){
            $edad = Carbon::parse($usersReg->fecha_nacimiento)->age;
            $usersReg['edad'] = $edad;
        }

        return view('user_registers.index')
            ->with('userRegisters', $userRegisters);
    }

    /**
     * Show the form for creating a new UserRegister.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_registers.create');
    }

    /**
     * Store a newly created UserRegister in storage.
     *
     * @param CreateUserRegisterRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRegisterRequest $request)
    {
        $input = $request->all();

        $userRegister = $this->userRegisterRepository->create($input);

        Flash::success('User Register saved successfully.');

        return redirect(route('userRegisters.index'));
    }

    /**
     * Display the specified UserRegister.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userRegister = $this->userRegisterRepository->find($id);

        if (empty($userRegister)) {
            Flash::error('User Register not found');

            return redirect(route('userRegisters.index'));
        }

        return view('user_registers.show')->with('userRegister', $userRegister);
    }

    /**
     * Show the form for editing the specified UserRegister.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userRegister = $this->userRegisterRepository->find($id);

        if (empty($userRegister)) {
            Flash::error('User Register not found');

            return redirect(route('userRegisters.index'));
        }

        return view('user_registers.edit')->with('userRegister', $userRegister);
    }

    /**
     * Update the specified UserRegister in storage.
     *
     * @param int $id
     * @param UpdateUserRegisterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRegisterRequest $request)
    {
        $userRegister = $this->userRegisterRepository->find($id);
        $input = $request->all();

        if (empty($userRegister)) {
            Flash::error('User Register not found');

            return redirect(route('userRegisters.index'));
        }

        /* if($input['password'] == ''){
            $input['password'] = $userRegister->password;
        } else {
            $input['password'] = Hash::make($input['password']);
        } */

        $userRegister = $this->userRegisterRepository->update($input , $id);

        Flash::success('User Register updated successfully.');

        return redirect(route('userRegisters.index'));
    }

    /**
     * Remove the specified UserRegister from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userRegister = $this->userRegisterRepository->find($id);

        if (empty($userRegister)) {
            Flash::error('User Register not found');

            return redirect(route('userRegisters.index'));
        }

        $this->userRegisterRepository->delete($id);

        Flash::success('User Register deleted successfully.');

        return redirect(route('userRegisters.index'));
    }
}
