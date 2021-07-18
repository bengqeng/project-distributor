<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Mail\notification\UsersApprovalNotification;
use App\Mail\notification\UsersRejectedNotification;
use App\Models\Provinsi;
use App\Models\User;
use App\Rules\IsUserRegisterHold;
use App\Rules\UuidMustExist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserApprovalController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$fullName = "";
		$accountType = "";
		$kodeArea = "";

		$query = User::AllPendingRegistration()->getUserArea();

		if ($request->has('full_name') && !empty($request->all()['full_name'])) {
			$fullName = $request->all()['full_name'];
			$query = $query->where('full_name', 'like', '%' . $request->full_name . '%');
		}

		if ($request->has('account_type') && !empty($request->all()['account_type'])) {
			$accountType = $request->all()['account_type'];
			$query = $query->where('account_type', $request->account_type);
		}

		if ($request->has('kode_area') && !empty($request->all()['kode_area'])) {
			$kodeArea = $request->all()['kode_area'];
			$query = $query->where('province_id', $request->kode_area);
		}

		$users = $query->paginate(10);
		$users->withpath('approval');
		$users->appends($request->all());

		return view('admin.users.approval',
			[
				'users' => $users,
				'provinsis' => Provinsi::all()->toArray(),
				'fullName' => $fullName,
				'accountType' => $accountType,
				'kodeArea' => $kodeArea,
			]
		);
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($uuid) {
		$data = [
			'uuid' => $uuid,
		];

		$validator = Validator::make($data, [
			'uuid' => [
				'required', new UuidMustExist(),
			],
		]);

		if ($validator->fails()) {
			flash('<b>' . $validator->errors()->first() . '</b>')->warning();
			return redirect()->route('index.admin');
		}

		$user = User::where('uuid', $uuid)
			->DetailUser()
			->first()
			->toArray();

		return view('admin.users.detail', ['user' => $user]);
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
		//
	}

	public function approve(Request $request) {
		abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

		$validator = Validator::make($request->all(), [
			'uuid' => [
				'required',
				new UuidMustExist(),
				new IsUserRegisterHold(),
			],
		]);

		if ($validator->fails()) {
			flash('User gagal disetujui.</br><b>' . $validator->errors()->first() . '</b>')->warning();
			return response()->json('', 200);
		}

		$approveUser = User::where('uuid', $request->uuid)->first();

		if ($approveUser->account_type == "Agent") {
			$approveUser->syncRoles('Agent');
		} elseif ($approveUser->account_type == "Distributor") {
			$approveUser->syncRoles('Distributor');
		} else {
			flash('Gagal memberikan role kepada user.</br><b>' . $approveUser->full_name . '</b>')->error();
			return response()->json('', 200);
		}

		$approveUser->update(['status_register' => 'approved']);
		Mail::send(new UsersApprovalNotification($request->uuid));

		flash('User ' . $approveUser->full_name . ' berhasil di setujui.')->success();

		return response()->json('', 200);
	}

	public function reject(Request $request) {
		abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

		$validator = Validator::make($request->all(), [
			'uuid' => [
				'required',
				new UuidMustExist(),
				new IsUserRegisterHold(),
			],
		]);

		if ($validator->fails()) {
			flash('User gagal mereject.</br><b>' . $validator->errors()->first() . '</b>')->warning();
			return response()->json('', 200);
		}

		$approveUser = User::where('uuid', $request->uuid)->first();
		$approveUser->update(['status_register' => 'rejected']);
        Mail::send(new UsersRejectedNotification($request->uuid));
		flash('User ' . $approveUser->full_name . ' berhasil di reject.')->success();

		return response()->json('', 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $userUuid) {
		abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

		$request->merge(['userUuid' => $request->route('user')]);

		$validator = Validator::make($request->all(), [
			'userUuid' => [
				'required',
				new UuidMustExist(),
				new IsUserRegisterHold(),
			],
		]);

		if ($validator->fails()) {
			flash('User gagal dihapus.</br><b>' . $validator->errors()->first() . '</b>')->warning();
			return response()->json('', 200);
		}

		$deletedUser = User::where('uuid', $userUuid)
			->firstOrFail();

		$deletedUser->delete();
		flash('User ' . $deletedUser->full_name . ' berhasil dihapus.')->success();

		return response()->json('', 200);
	}
}
