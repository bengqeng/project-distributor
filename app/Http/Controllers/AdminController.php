<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Product;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $carousel   = Carousel::all()->pluck('id');
        $product    = Product::select('id');

        return view('admin.index',[
            'carousel' => $carousel,
            'product' => $product,
            'totalActiveUser' => User::userIsMember()->userRoleMustMember()->ApprovedUsers()->UsersNotBanned()->count(),
            'totalDeletedUser' => User::userIsMember()->RejectedUsers()->count()
        ]);
    }

    public function logActivityUser(Request $request)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        $logUser = Activity::where('subject_type', "App\Models\User")
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $logMessage = [];

        if($logUser->count() > 0){
            foreach ($logUser as $key => $value) {
                switch ($value->description) {
                    case 'created':
                        $attribute      = $value->changes['attributes'];
                        $full_name      = $attribute['full_name'];
                        $description    = "User <b>" . htmlentities($full_name) . "</b> telah mendaftar";
                        break;
                    case 'updated':
                        $full_name      = $value->subject->full_name;
                        $new            = $value->changes['attributes'];
                        $old            = $value->changes['old'];

                        if(isset($old['status_register'])){
                            $description    = "Update <b>". $old['status_register']."</b> menjadi <b>".$new['status_register']."</b>";
                        }
                        elseif(isset($old['banned'])){
                            $banMessage     = $new['banned'] == "1" ? "menjadi banned" : " menjadi aktif user";
                            $description    = "Update <b>".$banMessage."</b>";
                        }
                        else{
                            $description    = "";
                        }
                        break;
                    case 'deleted':
                        $attribute      = $value->changes['attributes'];
                        $full_name      = $attribute['full_name'];

                        $description    = "Delete User <b>". $full_name."</b>";
                        break;
                    default:
                        $full_name      = "";
                        $description    = "";
                        break;
                };

                $logMessage[$key] = [
                    "name"          => $full_name,
                    "created_at"    => $value->created_at->diffForHumans(),
                    "type_action"   => ucwords($value->description),
                    "description"   => $description
                ];
            };
        }

        return view('admin.layout.log_activity_user', ['log_user' => $logMessage]);
    }

    public function webcontent()
    {
        return view('admin.webcontent');
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

}
