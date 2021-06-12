<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\AccountMustBanned;
use App\Rules\UuidMustExist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserBannedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user   = User::NotAdmin()
            ->BannedUsers()
            ->GetUserArea()
            ->paginate(25);

        return view('admin.users.banned', ['users'=> $user]);
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

    public function openBanned(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'confirmation' => [
                'required'
            ],
            'uuid' => [
                'required', new UuidMustExist(), new AccountMustBanned()
            ]
        ]);

        if ($validator->fails()) {
            flash('<b>'. $validator->errors()->first() .'</b>')->error();
            return redirect()->back();
        }

        $banUser = User::where('uuid', $request->uuid)->first();
        $banUser->banned = false;
        $banUser->save();

        flash('User '. $banUser->full_name .' berhasil menghilangkan status ban.')->success();
        return redirect()->back();
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
    public function destroy($id)
    {
        //
    }
}
