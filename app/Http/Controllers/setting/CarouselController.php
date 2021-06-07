<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\MasterImage;
use Illuminate\Http\Request;
use App\Http\Requests\NewCarouselRequest;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel= Carousel::paginate(10);
        $image = MasterImage::where('category','carousel')->get();
        return view('admin.web_content.carousel', ['carousel'=>$carousel,'image'=>$image]);
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
    public function store(NewCarouselRequest $request)
    {
        $new_carousel = new Carousel;

        $new_carousel->title = $request->title;
        $new_carousel->description = $request->description;
        $new_carousel->images_id = $request->images;
        $new_carousel->save();
        return back()->with('status', 'Carousel Berhasil Ditambahkan!');

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
        echo $id;
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
    public function destroy(Carousel $carousel)
    {
        Carousel::destroy($carousel->id);
        return redirect('admin/webcontent/carousel')->with('status', 'Data Berhasil dihapus');
    }
}
