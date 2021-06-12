<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\UuidMustExist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::paginate();
        return view('admin.users.all', ['user'=>$user]);
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
