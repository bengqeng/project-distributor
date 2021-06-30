<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberPostEditPasswordRequest;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\User;
use App\Rules\AccountMustRegisterAsMember;
use App\Rules\BirthDay;
use App\Rules\EmailEditMustNotRegistered;
use App\Rules\UuidMustExist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$nearbymembers = User::MemberNearBy()
            ->userRoleMustMember()
            ->paginate(6);

		return view('member.near_by_member', ['nearbymembers' => $nearbymembers]);
	}

	public function profile() {
		return view('member.profile');

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//

	}

	public function nearByMember() {
        $nearbymembers = User::MemberNearBy()
            ->userRoleMustMember()
            ->paginate(6);

		return view('member.near_by_member', ['nearbymembers' => $nearbymembers]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $uuid) {
        $request->merge(['uuid' => $request->route('uuid')]);

        $validator = Validator::make($request->all(), [
            'uuid' => [
                'required', new UuidMustExist(), new AccountMustRegisterAsMember()
            ]
        ]);

        if ($validator->fails()) {
            flash('Error </br><b>'. $validator->errors()->first() .'</b>')->error();
            return redirect()->route('member.index');
        }

        $user = User::where('uuid', $uuid)->DetailUser()->first();

        $provinsis   = Provinsi::get();
        $kabupatens  = Kabupaten::where('id_prov', $user->province_id)->get();
        $kecamatans  = Kecamatan::where('id_kab', $user->city_id)->get();
        $kelurahans  = Kelurahan::where('id_kec', $user->kecamatan_id)->get();

		return view('member.profile', [
            'user' => $user,
            'provinsis' => $provinsis,
            'kabupatens' => $kabupatens,
            'kecamatans' => $kecamatans,
            'kelurahans' => $kelurahans
        ]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request) {
        $request->merge(['uuid' => $request->route('uuid')]);
        $request->validate([
            'uuid'                  => ['required', new UuidMustExist(), new AccountMustRegisterAsMember()],
            'address'               => 'required',
            'city'                  => 'required',
            'provinsi'              => 'required',
            'kecamatan'             => 'required',
            'kelurahan'             => 'required',
            'full_name'             => 'required|max:255',
            'birth_place'           => 'required',
            'phone_number'          => 'required',
            'birthday'              => ['required', 'date', new BirthDay()],
            'email'                 => [new EmailEditMustNotRegistered($request->route('uuid')), 'required'],
            'gender'                => ['required', 'in:laki-laki,perempuan'],
        ]);

        $user = [
            "full_name"        => $request->full_name,
            "email"            => $request->email,
            "phone_number"     => $request->phone_number,
            "birthday"         => $request->birthday,
            "birth_place"      => $request->birth_place,
            "gender"           => $request->gender,
            "address"          => $request->address,
            "province_id"      => $request->provinsi,
            "city_id"          => $request->city,
            "kecamatan_id"     => $request->kecamatan,
            "kelurahan_id"     => $request->kelurahan
        ];

        User::where('uuid', $request->route('uuid'))
            ->update($user);

        flash('Success edit user profile')->success();
        return redirect()->back();
	}

    public function showeEditPassword(Request $request, $uuid)
    {
        $request->merge(['uuid' => $request->route('uuid')]);

        $validator = Validator::make($request->all(), [
            'uuid' => [
                'required', new UuidMustExist(), new AccountMustRegisterAsMember()
            ]
        ]);

        if ($validator->fails()) {
            flash('Error </br><b>'. $validator->errors()->first() .'</b>')->error();
            return redirect()->route('member.index');
        }

        $user = User::where('uuid', $uuid)->DetailUser()->first();
        return view('member.edit_password', compact('user'));
    }

    public function storeEditPassword(MemberPostEditPasswordRequest $request, User $user)
    {
        $user::where('uuid', $request->validated()["uuid"])->update(['password' => Hash::make($request->validated()["new_password"])]);

        flash('Success mengganti password')->success();
        return redirect()->route('member.show', $request->validated()["uuid"]);
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
