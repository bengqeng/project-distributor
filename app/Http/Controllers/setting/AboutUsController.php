<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MasterImage;
use App\Http\Requests\WebContentRequest;
class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        $image = MasterImage::where('category', 'about_us')->get();
        return view('admin.web_content.about_us' ,compact('about','image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat_image  = MasterImage::where('category', 'about_us')->get();
        $about   = About::find($id);
        // dd($cat_image);
        return view('admin.web_content.edit-about', compact('about', 'cat_image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_image  = MasterImage::where('category', 'about_us')->get();
        $about   = About::find($id);
        // dd($cat_image);
        return view('admin.web_content.edit-about', compact('about', 'cat_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebContentRequest $request, $id)
    {

        About::where('id', $id)->update([
            'description' => $request->description,
            'images_id' => $request->images_id,
        ]);
        flash('About ' . $request->title . ' berhasil diubah!')->success();
        return redirect('admin/webcontent/about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');
        $request->merge(['id' => $request->route('about')]);
        $deleteProduct = About::where('id', $id)
            ->firstOrFail();
        flash('Product ' . $deleteProduct->title . ' berhasil dihapus.')->success();
        $deleteProduct->delete();
        return response([
            'status'    => 'success',
            'message'   => 'Data Berhasil Di hapus'
        ]);
    }
}
