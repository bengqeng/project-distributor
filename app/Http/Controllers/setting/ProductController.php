<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\MasterImage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product= Product::paginate(10);
        $image = MasterImage::where('category', 'product')->get();
        return view('admin.web_content.product', compact('product','image'));
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
        // dd($request->all());
        Product::create($request->all());
        return back()->with('status', 'Produk Berhasil Ditambahkan!');
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
    public function destroy(Request $request,$id)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');
        $request->merge(['id' => $request->route('product')]);
        $deleteProduct = Product::where('id', $id)
            ->firstOrFail();
        flash('Product ' . $deleteProduct->title . ' berhasil dihapus.')->error();
        $deleteProduct->delete();
        return response([
            'status'    => 'success',
            'message'   => 'Data Berhasil Di hapus'
        ]);
    }
}
