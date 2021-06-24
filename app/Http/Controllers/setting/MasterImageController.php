<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\MasterImage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMasterImageRequest;


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
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'master_images' => 'required|image|mimes:jpeg,png,jpg|max:300',
        ]);

        $images = new MasterImage;

        $images->title          = $images->title($request->title);
        $images->category       = $request->category;
        $images->url_path       = $images->url_path($request->category, $request->master_images);
        $images->master_images  = $request->file('master_images');

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
    public function destroy(Request $request, $id)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        $request->merge(['id' => $request->route('admin.upload')]);

        $del = MasterImage::where('id', $id)
            ->firstOrFail();

        flash('Carousel ' . $del->title . ' berhasil dihapus.')->error();

        $del->delete();

        return response([
            'status'    => 'success',
            'message'   => 'Data Berhasil Di hapus'
        ]);
    }
}
