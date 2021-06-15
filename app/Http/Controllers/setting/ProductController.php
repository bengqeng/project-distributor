<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\MasterImage;
use App\Models\CategoryProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product            = Product::paginate(10);
        $categoryImage      = MasterImage::where('category', 'product')->get();
        $categoryProduct    = CategoryProduct::all();

        return view('admin.web_content.product', compact('product','categoryImage', 'categoryProduct'));
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
            'images_id.*' => 'required',

        ]);
        dd($request->all());
        Product::create($request->all());

        flash('Product ' . $request->title . ' berhasil ditambahkan')->success();

        return redirect()->back();
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
        $categoryImage      = MasterImage::listImageForProduct()->get()->pluck('id', 'name');
        $product            = Product::find($id);
        $categoryProduct    = CategoryProduct::all();

        return view('admin.web_content.edit-product', compact('product', 'categoryImage','categoryProduct'));
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
            'images_id.*' => 'required',

        ]);

        Product::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'images_id.*' => $request->images_id,
        ]);

        flash('About ' . $request->title . ' berhasil diubah!')->success();
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
