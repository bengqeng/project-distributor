<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\IsUserRegisterHold;
use App\Rules\UuidMustExist;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users   = User::AllPendingRegistration()->getUserArea()->paginate(25);

        return view('admin.users.approval',
            [
                'users'=> $users
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'uuid' => $id
        ];

        $validator = Validator::make($data,[
            'uuid' => [
                'required', new UuidMustExist()
            ]
        ]);

        if ($validator->fails()) {
            flash('<b>'. $validator->errors()->first() .'</b>')->warning();
            return redirect()->route('index.admin');
        }

        $user = User::where('uuid', $id)
            ->DetailUser()
            ->first()
            ->toArray();

        return view('admin.users.detail', ['user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    public function approve(Request $request)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        $validator = Validator::make($request->all(), [
            'uuid' => [
                'required',
                new UuidMustExist(),
                new IsUserRegisterHold(),
            ]
        ]);

        if ($validator->fails()) {
            flash('User gagal disetujui.</br><b>'. $validator->errors()->first() .'</b>')->warning();
            return response()->json('', 200);
        }

        $approveUser = User::where('uuid', $request->uuid)->first();
        $approveUser->update(['status_register' => 'approved']);

        flash('User '. $approveUser->full_name .' berhasil di setujui.')->success();

        return response()->json('', 200);
    }

    public function reject(Request $request)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        $validator = Validator::make($request->all(), [
            'uuid' => [
                'required',
                new UuidMustExist(),
                new IsUserRegisterHold(),
            ]
        ]);

        if ($validator->fails()) {
            flash('User gagal mereject.</br><b>'. $validator->errors()->first() .'</b>')->warning();
            return response()->json('', 200);
        }

        $approveUser = User::where('uuid', $request->uuid)->first();
        $approveUser->update(['status_register' => 'rejected']);

        flash('User '. $approveUser->full_name .' berhasil di reject.')->success();

        return response()->json('', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $userUuid)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        $request->merge(['userUuid' => $request->route('user')]);

        $validator = Validator::make($request->all(), [
            'userUuid' => [
                'required',
                new UuidMustExist(),
                new IsUserRegisterHold(),
            ]
        ]);

        if ($validator->fails()) {
            flash('User gagal dihapus.</br><b>'. $validator->errors()->first() .'</b>')->warning();
            return response()->json('', 200);
        }

        $deletedUser = User::where('uuid', $userUuid)
            ->firstOrFail();

        $deletedUser->delete();
        flash('User '. $deletedUser->full_name .' berhasil dihapus.')->success();

        return response()->json('', 200);
    }
}
