<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
use App\Models\MasterImage;
class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social= Social::all();
        return view('admin.web_content.social_media', compact('social'));
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
        Social::create($request->all());
        flash('Sosial Media' . $request->title . ' berhasil ditambahkan')->error();
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
    public function destroy(Request $request, $id)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');
        $request->merge(['id' => $request->route('social')]);
        $deleteProduct = Social::where('id', $id)
            ->firstOrFail();
        flash('Product ' . $deleteProduct->title . ' berhasil dihapus.')->error();
        $deleteProduct->delete();
        return response([
            'status'    => 'success',
            'message'   => 'Data Berhasil Di hapus'
        ]);
    }
}
