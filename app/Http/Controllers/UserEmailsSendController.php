<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserEmailsSendRequest;
use App\Http\Requests\UpdateUserEmailsSendRequest;
use App\Repositories\UserEmailsSendRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\TestEmail;
use Mail;
use Flash;
use DB;
use Response;

class UserEmailsSendController extends AppBaseController
{
    /** @var  UserEmailsSendRepository */
    private $userEmailsSendRepository;

    public function __construct(UserEmailsSendRepository $userEmailsSendRepo)
    {
        $this->userEmailsSendRepository = $userEmailsSendRepo;
    }

    /**
     * Display a listing of the UserEmailsSend.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $userEmailsSends = DB::table('users_emails_send')->get();

        foreach($userEmailsSends as $key => $UES){
            $mail = DB::table('jobs')->where('id', $UES->job_id)->first();
            if(empty($mail)){
                $UES->status = 'enviado';
                $updateData = json_decode(json_encode($UES),true);
                $userEmailsSendsUpdate = $this->userEmailsSendRepository->update($updateData, $UES->id);
            }
        }

        $userEmailsSendsList = $this->userEmailsSendRepository->paginate(10);

        return view('user_emails_sends.index')
            ->with('userEmailsSends', $userEmailsSendsList);
    }

    /**
     * Display a listing of the UserEmailsSend for Web.
     *
     * @return Response
     */
    public function indexWeb()
    {

        $userEmailsSends = DB::table('users_emails_send')->get();

        foreach($userEmailsSends as $key => $UES){
            $mail = DB::table('jobs')->where('id', $UES->job_id)->first();
            if(empty($mail)){
                $UES->status = 'enviado';
                $updateData = json_decode(json_encode($UES),true);
                $userEmailsSendsUpdate = $this->userEmailsSendRepository->update($updateData, $UES->id);
            }
        }

        $userEmailsSendsList = DB::table('users_emails_send')->get();

        return response()->json([
            'data' => $userEmailsSendsList,
            'status' => 200
        ]);
    }

    /**
     * Show the form for creating a new UserEmailsSend.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_emails_sends.create');
    }

    /**
     * Store a newly created UserEmailsSend in storage.
     *
     * @param CreateUserEmailsSendRequest $request
     *
     * @return Response
     */
    public function store(CreateUserEmailsSendRequest $request)
    {

        $userLoged = Auth::user();
        $request['user_id'] = $userLoged->id;
        $Msg = array(
            'quienEnvia' => $userLoged->nombre,
            'emailQuienEnvia' => $userLoged->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje
        );

        Mail::to($request->destinatario)->queue(new TestEmail(json_encode($Msg)));

        $id_jobs = DB::getPdo()->lastInsertId();
        $request['job_id'] = $id_jobs;
        $input = $request->all();
        $userEmailsSend = $this->userEmailsSendRepository->create($input);

        Flash::success('Email successfully added to queue.');

        return redirect(route('userEmailsSends.index'));
    }

    /**
     * Display the specified UserEmailsSend.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userEmailsSend = $this->userEmailsSendRepository->find($id);

        if (empty($userEmailsSend)) {
            Flash::error('User Emails Send not found');

            return redirect(route('userEmailsSends.index'));
        }

        return view('user_emails_sends.show')->with('userEmailsSend', $userEmailsSend);
    }

    /**
     * Show the form for editing the specified UserEmailsSend.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userEmailsSend = $this->userEmailsSendRepository->find($id);

        if (empty($userEmailsSend)) {
            Flash::error('User Emails Send not found');

            return redirect(route('userEmailsSends.index'));
        }

        return view('user_emails_sends.edit')->with('userEmailsSend', $userEmailsSend);
    }

    /**
     * Update the specified UserEmailsSend in storage.
     *
     * @param int $id
     * @param UpdateUserEmailsSendRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserEmailsSendRequest $request)
    {
        $userEmailsSend = $this->userEmailsSendRepository->find($id);

        if (empty($userEmailsSend)) {
            Flash::error('User Emails Send not found');

            return redirect(route('userEmailsSends.index'));
        }

        $userEmailsSend = $this->userEmailsSendRepository->update($request->all(), $id);

        Flash::success('User Emails Send updated successfully.');

        return redirect(route('userEmailsSends.index'));
    }

    /**
     * Remove the specified UserEmailsSend from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userEmailsSend = $this->userEmailsSendRepository->find($id);

        if (empty($userEmailsSend)) {
            Flash::error('User Emails Send not found');

            return redirect(route('userEmailsSends.index'));
        }

        $this->userEmailsSendRepository->delete($id);

        Flash::success('User Emails Send deleted successfully.');

        return redirect(route('userEmailsSends.index'));
    }
}
