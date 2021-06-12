<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\IsUserApproved;
use App\Rules\UuidMustExist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user   = User::NotAdmin()
            ->ApprovedUsers()
            ->GetUserArea()
            ->UsersNotBanned()
            ->paginate(25);

        return view('admin.users.active', ['users'=>$user]);
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

    public function banActiveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'confirmation' =>[
                'required',
            ],
            'uuid' => [
                'required', new UuidMustExist(), new IsUserApproved()
            ]
        ]);

        if ($validator->fails()) {
            flash('<b>'. $validator->errors()->first() .'</b>')->warning();
            return redirect()->back();
        }

        $banUser = User::where('uuid', $request->uuid)->first();

        $banUser->first()->syncRoles('Admin');
        $banUser->update(['banned' => true]);

        flash('User '. $banUser->full_name .' berhasil di ban.')->success();
        return response()->json('', 200);
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
