<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\User;
use App\Rules\UuidMustExist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRejectedController extends Controller
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

        $query= User::RejectedUsers();

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

        $users = $query->getUserArea();
        $users = $query->paginate(10);
        $users->withpath('rejected');
        $users->appends($request->all());

        return view('admin.users.rejected', [
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $data = [
            'uuid' => $uuid
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

        $user = User::where('uuid', $uuid)
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
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('admin/users/all')->with('status', 'Data Berhasil dihapus');
    }
}
