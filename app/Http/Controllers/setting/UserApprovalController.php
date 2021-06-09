<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\ApprovalCanBeDeleted;
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
        $users   = User::AllPendingRegistration()->getUserArea()->paginate(10);

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
        //
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
    public function update(Request $request, $id)
    {
        //
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

        $request->validate([
            'userUuid' => [
                'required', 
                new IsUserRegisterHold()
            ]
        ]);
        
        $deletedUser = User::where('uuid', $userUuid)
            ->firstOrFail();
        
        // $deletedUser->delete();
        flash('User '.$deletedUser->full_name.' berhasil dihapus.')->success();

        return response([
            'status'    => 'success',
            'message'   => 'Data Berhasil Di hapus'
        ], 201);
    }
}
