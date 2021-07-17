<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$kodeArea = "";
		$fullName = "";
		$accountType = "";

		$query = User::userIsMember()->userRoleMustMember()->UsersNotBanned()->GetUserArea();

		if ($request->has('full_name') && !empty($request->all()['full_name'])) {
			$fullName = $request->all()['full_name'];
			$query = $query->where('full_name', 'like', '%' . $request->full_name . '%');
		}

		if ($request->has('kode_area') && !empty($request->all()['kode_area'])) {
			$kodeArea = $request->all()['kode_area'];
			$query = $query->where('province_id', $request->kode_area);
		}

		if ($request->has('account_type') && !empty($request->all()['account_type'])) {
			$accountType = $request->all()['account_type'];
			$query = $query->where('account_type', $request->account_type);
		}

		$users = $query->paginate(10);
		$users->appends($request->all());
		$users->withpath('report-show');

		return view('admin.reports.reports', [
			'provinsis' => Provinsi::all()->toArray(),
			'kode_area' => $kodeArea,
			'users' => $users,
			'fullName' => $fullName,
			'accountType' => $accountType,
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
