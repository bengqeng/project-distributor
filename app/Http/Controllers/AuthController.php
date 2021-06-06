<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Provinsi;
use Illuminate\Support\Str;
use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.auth_login');
    }

    public function register()
    {
        $data   = [
            'provinsi' => Provinsi::get()
        ];

        return view('auth.auth_register')->with($data);
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
    public function store(RegisterPostRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyRegister(RegisterPostRequest $request)
    {
        $user = new User();

        $user->uuid             = Str::uuid();
        $user->full_name        = $request->full_name;
        $user->email            = $request->email;
        $user->username         = $user->generateUsername($request->model);
        $user->password         = Hash::make($request->password);
        $user->phone_number     = $request->phone_number;
        $user->status_register  = "hold";
        $user->birthday         = $request->birthday;
        $user->birth_place      = $request->birth_place;
        $user->gender           = $request->gender;
        $user->address          = $request->address;
        $user->province_id      = $request->provinsi;
        $user->city_id          = $request->city;
        $user->kecamatan_id     = $request->kecamatan;
        $user->kelurahan_id     = $request->kelurahan;
        $user->referral_id      = $user->generateReferal(5);;
        $user->banned           = false;

        $user->save();
        return back()->with('status', 'Registrasi Berhasil');
    }

    public function verifyLogin(LoginPostRequest $request)
    {
        $validated  = $request->validated();
        $smart_user = $validated['smart_user_login'];
        $password   = $validated['password'];

        $userLoggin  = User::where('banned', "=", false)
                                ->where('status_register', "=", "approved")
                                ->where(function($q) use ($smart_user) {
                                    $q->Where('username', $smart_user)
                                    ->orwhere('email', $smart_user);
                                })
                            ->get();

        if ($userLoggin->count() == 0){
            return redirect()->route('login')->with('smart_user_login', 'Email or Account id not found');
        }

        if(Hash::check($password, $userLoggin->first()->password)){
            Auth::loginUsingId($userLoggin->first()->id);
            return redirect()->route('index.admin');
        }

        return redirect()->route('login')->with('smart_user_login', 'Password is invalid');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
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
;
