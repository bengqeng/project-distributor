<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\MasterImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MasterImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterimage= MasterImage::all();
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
            'images' => 'required|image|mimes:jpeg,png,jpg|max:300',
            // 'images' => 'required_if:category,product|image|mimes:png|max:300',
        ]);


        // $image = New MasterImage;

        // $filenameWithExt = $request->file('category');
        // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // $extension = $request->file('category')->getClientOriginalExtension();
        // $filenameSimpan = $filename.'_'.time().'.'.$extension;

        // $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        // }

        // $image->category;
        // $image->url_path = '/storage/'.$path;
        // $image->save();

        // return back()
        //     ->with('success','You have successfully upload image.');


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
    public function destroy(MasterImage $masterimage)
    {
        MasterImage::destroy($masterimage->id);
        return redirect('admin/uploadimage')->with('status', 'Data Berhasil dihapus');
    }
}
