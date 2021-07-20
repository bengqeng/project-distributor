<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
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
    public function index(Request $request)
    {
        $fullName       = "";
        $accountType    = "";
        $kodeArea       = "";
        $query   = User::userRoleMustMember()->BannedUsers()->GetUserArea();

        if($request->has('full_name') && !empty($request->all()['full_name'])){
            $fullName   = $request->all()['full_name'];
            $query      = $query->where('full_name', 'like', '%'.$request->full_name.'%');
        }

        if($request->has('account_type') && !empty($request->all()['account_type'])){
            $accountType = $request->all()['account_type'];
            $query       = $query->where('account_type', $request->account_type);
        }

        if($request->has('kode_area') && !empty($request->all()['kode_area'])){
            $kodeArea    = $request->all()['kode_area'];
            $query       = $query->where('province_id', $request->kode_area);
        }

        $users = $query->paginate(10);
        $users->withpath('diblokir');
        $users->appends($request->all());

        return view('admin.users.banned', [
            'users'         => $users,
            'provinsis'     => Provinsi::all()->toArray(),
            'fullName'      => $fullName,
            'accountType'   => $accountType,
            'kodeArea'      => $kodeArea
        ]);
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

        flash('User '. htmlentities($banUser->full_name) .' berhasil menghilangkan status ban.')->success();
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
