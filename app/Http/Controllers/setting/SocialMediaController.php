<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterImage;
use App\Models\SocialMedia as ModelsSocialMedia;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social= ModelsSocialMedia::all();
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
        ModelsSocialMedia::create($request->all());
        flash('Sosial Media' . $request->title . ' berhasil ditambahkan')->success();
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
        $social   = ModelsSocialMedia::find($id);
        // dd($cat_image);
        return view('admin.web_content.edit-social', compact('social'));
    }

    public function enableView(Request $request, ModelsSocialMedia $socialMedia)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        $socialMedia->show = $request->show == "true" ? true: false;

        if($socialMedia->save()){
            return response()->json([
                'status'    => 'success',
                'message'   => 'Berhasil Update Data'], 200);
        }
        else{
            return response()->json([
                'status'    => 'error',
                'message'   => 'Gagal Update Data'], 200);
        }
    }

    public function updateUrl(Request $request, ModelsSocialMedia $socialMedia)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');
        $validator = Validator::make($request->all(),
            ['url' => 'url'],
            ['url.url' => 'Field harus berupa Url']
        );

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'message'   => $validator->errors()->first()], 200);
        }

        $socialMedia->url = $request->url;

        if($socialMedia->save()){
            return response()->json([
                'status'    => 'success',
                'message'   => 'Berhasil Update Data'], 200);
        }
        else{
            return response()->json([
                'status'    => 'error',
                'message'   => 'Gagal Update Data'], 200);
        }
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
        $deleteProduct = ModelsSocialMedia::where('id', $id)
            ->firstOrFail();

        flash('Social Media ' . $deleteProduct->title . ' berhasil dihapus!')->error();
        $deleteProduct->delete();

        return response([
            'status'    => 'success',
            'message'   => 'Data Berhasil Di hapus'
        ]);
    }
}
