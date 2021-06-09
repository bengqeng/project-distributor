<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\MasterImage;
use App\Http\Requests\AdminRequest;



class MasterImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterimage= MasterImage::paginate(5);
        return view('admin.uploadimage', ['masterimage'=>$masterimage]);
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
    public function store(AdminRequest $request)
    {


      $images = new MasterImage;
      $images->category = $request->category;
      $images->master_images = $request->file('master_images');
      $images->url_path = $images->url_path($request->category,$request->master_images);
      $images->title = $images->title($request->category);
      $images->save();
      return back()->with('status', 'Upload Image Berhasil!');


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
    public function update( $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterImage $upload)
    {
        MasterImage::destroy($upload->id);
        return redirect('admin/upload')->with('status', 'Data Berhasil dihapus');
    }
}
