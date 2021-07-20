<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersRegionController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$query = "";
		$fullName = "";
		$accountType = "";
		$statusRegister = "";
		$rejected = 0;
		$agent = 0;
		$distributor = 0;
		$pending = 0;
		$members = [];

		if ($request->has('kode_area') && !empty($request->all()['kode_area'])) {
			$query = $request->all()['kode_area'];

			$beforerejected = User::RejectedUsers()
				->where('province_id', $query);

			$beforeagent = User::userIsMember()->userRoleMustMember()->ApprovedUsers()->UsersNotBanned()->where('province_id', $query)
				->where('account_type', User::AGENT);

			$beforedistributor = User::userIsMember()->userRoleMustMember()->ApprovedUsers()->UsersNotBanned()->where('province_id', $query)
				->where('account_type', User::DISTRIBUTOR);

			$beforemembers = User::userIsMember()->where('province_id', $query)->GetUserArea()->UsersNotBanned();

			$beforePending = User::userIsMember()->exceptAdmin()->NewRegister()->where('province_id', $query);

			if ($request->has('full_name') && !empty($request->all()['full_name'])) {
				$fullName = $request->all()['full_name'];

				$beforerejected = $beforerejected->where('full_name', 'like', '%' . $request->full_name . '%');
				$beforeagent = $beforeagent->where('full_name', 'like', '%' . $request->full_name . '%');
				$beforedistributor = $beforedistributor->where('full_name', 'like', '%' . $request->full_name . '%');
				$beforemembers = $beforemembers->where('full_name', 'like', '%' . $request->full_name . '%');
				$beforePending = $beforePending->where('full_name', 'like', '%' . $request->full_name . '%');
			}

			if ($request->has('account_type') && !empty($request->all()['account_type'])) {
				$accountType = $request->all()['account_type'];

				$beforerejected = $beforerejected->where('account_type', $request->account_type);
				$beforeagent = $beforeagent->where('account_type', $request->account_type);
				$beforedistributor = $beforedistributor->where('account_type', $request->account_type);
				$beforemembers = $beforemembers->where('account_type', $request->account_type);
				$beforePending = $beforePending->where('account_type', $request->account_type);
			}

			if ($request->has('status_register') && !empty($request->all()['status_register'])) {
				$statusRegister = $request->all()['status_register'];

				$beforerejected = $beforerejected->where('status_register', $request->status_register);
				$beforeagent = $beforeagent->where('status_register', $request->status_register);
				$beforedistributor = $beforedistributor->where('status_register', $request->status_register);
				$beforemembers = $beforemembers->where('status_register', $request->status_register);
				$beforePending = $beforePending->where('status_register', $request->status_register);
			}

			$rejected = $beforerejected->count();
			$distributor = $beforedistributor->count();
			$agent = $beforeagent->count();
			$members = $beforemembers->paginate(10);
			$pending = $beforePending->count();
		}

		return view('admin.users.by_region', [
			'provinsis' => Provinsi::all()->toArray(),
			'rejected' => $rejected,
			'agent' => $agent,
			'distributor' => $distributor,
			'total' => $agent + $distributor,
			'kode_area' => $query,
			'members' => $members,
			'fullName' => $fullName,
			'accountType' => $accountType,
			'statusRegister' => $statusRegister,
			'pending' => $pending,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	public function homepageUserByRegion(Request $request) {
		abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

		$userBefore = User::userIsMember()->userRoleMustMember()->ApprovedUsers()->UsersNotBanned()
			->select(DB::raw('count(*) as user_count, province_id'))
			->groupBy('province_id')
			->orderBy('user_count', 'desc')
			->limit(8)
			->pluck('province_id')
			->toArray();

		if (count($userBefore) <= 8) {
			$userBeforeLimit = Provinsi::whereNotIn('id_prov', $userBefore)->limit(8 - count($userBefore))->pluck('id_prov')->toArray();
			$userAfter = array_merge($userBefore, $userBeforeLimit);
		}

		$eachRegion = [];
		foreach ($userAfter as $key => $provinsi) {
			$provinsi = Provinsi::where('id_prov', $provinsi)->first();

			$eachRegion[$key]['nama_provinsi'] = $provinsi;
			$eachRegion[$key]['agent'] = User::userIsMember()->userRoleMustMember()->ApprovedUsers()->UsersNotBanned()->where('province_id', $provinsi->id_prov)
				->where('account_type', User::AGENT)
				->get()
				->count();
			$eachRegion[$key]['distributor'] = User::userIsMember()->userRoleMustMember()->ApprovedUsers()->UsersNotBanned()->where('province_id', $provinsi->id_prov)
				->where('account_type', User::DISTRIBUTOR)
				->get()
				->count();
			$eachRegion[$key]['total_member'] = $eachRegion[$key]['agent'] + $eachRegion[$key]['distributor'];
		}

		return view('admin.layout.dashboard_user_by_region', ['user_region' => $eachRegion]);
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
	public function show($id) {
		//
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
	public function update(Request $request, $id) {
		//
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
