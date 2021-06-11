<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
    }

    public function index()
    {
        $logUser = Activity::where('subject_type', "App\Models\User")
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        dd($this->designLogActivity($logUser));

        $carousel   = Carousel::all()->pluck('id'); //test contoh
        $product    = Product::select('id'); //test contoh

        return view('admin.index',
            ['carousel' => $carousel,
            'product' => $product
        ]);
    }

    public function logActivityUser(Request $request)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        $logUser = Activity::where('subject_type', "App\Models\User")
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('admin.layout.log_activity_user', ['log_user' => $logUser]);
    }

    public function webcontent()
    {
        return view('admin.webcontent');
    }
    public function profile()
    {
        return view('admin.profile');
    }

    public function usersAll()
    {
        return view('admin.users.all');
    }

    public function userApproval()
    {
        return view('admin.users.approval');
    }

    public function userDeleted()
    {
        return view('admin.users.deleted');
    }

    public function graphic()
    {
        return view('admin.graphic');
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

    private function designLogActivity($data)
    {

        foreach ($data as $key => $value) {
            dd($value);
        }

        return $data;
    }
}
