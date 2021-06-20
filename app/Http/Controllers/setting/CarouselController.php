<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\MasterImage;
use Illuminate\Http\Request;
use App\Http\Requests\CarouselRequest;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = Carousel::paginate(10);
        $image = MasterImage::where('category', 'carousel')->get();
        return view('admin.web_content.carousel', ['carousel' => $carousel, 'image' => $image]);
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
            'title' => 'required|max:150|min:4',
            'description' => 'required',
            'images_id' => 'required',
        ]);
        Carousel::create($request->all());
        flash('Carousel ' . $request->title . ' berhasil ditambahkan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carousel = Carousel::find($id);

      return response()->json($carousel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_image  = MasterImage::where('category', 'carousel')->get();
        $carousel   = Carousel::find($id);
        // dd($cat_image);
        return view('admin.web_content.edit-carousel', compact('carousel', 'cat_image'));
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

        $request->validate([
            'title' => 'required|max:150|min:4',
            'description' => 'required',

        ]);

        Carousel::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'images_id' => $request->images_id,
        ]);
        flash('About ' . $request->title . ' berhasil diubah!')->success();
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

        $request->merge(['id' => $request->route('carousel')]);

        $deleteCarousel = Carousel::where('id', $id)
            ->firstOrFail();

        flash('Carousel ' . $deleteCarousel->title . ' berhasil dihapus.')->success();

        $deleteCarousel->delete();

        return response([
            'status'    => 'success',
            'message'   => 'Data Berhasil Di hapus'
        ]);
    }
}
