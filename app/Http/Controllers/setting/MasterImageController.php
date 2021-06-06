<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\MasterImage;
use Illuminate\Http\Request;


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
            'images' => 'required|image|mimes:jpeg,png,jpg|max:300',
        ]);

        $imageName = $request->category . '-' . time() . '.' .
        $request->images->extension();

        $url_path = $request->file('images')->move('master_image', $imageName);
        MasterImage::create([
            'category' => $request->input('category'),
            'url_path' =>$url_path,
            'images' => $request->file('images')
        ]);
        return back()
            ->with('success','You have successfully upload image.');

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
    public function destroy(MasterImage $upload)
    {
        MasterImage::destroy($upload->id);
        return redirect('admin/upload')->with('status', 'Data Berhasil dihapus');
    }
}
