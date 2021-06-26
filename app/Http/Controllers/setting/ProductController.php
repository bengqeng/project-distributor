<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\MasterImage;
use App\Models\CategoryProduct;
use App\Rules\CategoryMustProductExist;

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

        return view('admin.product.product_index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product            = Product::paginate(10);
        $listImage          = MasterImage::where('category', 'product')->get();
        $categoryProduct    = CategoryProduct::all();

        return view('admin.product.create-product', compact('product','listImage', 'categoryProduct'));
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
            'title'         => 'required|max:150|min:4',
            'description'   => 'required',
            'images_id.*'   => 'required',
            'category_id'   => ['required', new CategoryMustProductExist()],
        ]);

        Product::create($request->all());
        flash('Product ' . $request->title . ' berhasil ditambahkan')->success();

        return redirect(route('product.index'));
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
    public function edit($slug)
    {
        $listImage          = MasterImage::listImageForProduct()->get();
        $product            = Product::where('slug', $slug)->first();
        $categoryProduct    = CategoryProduct::all();

        return view('admin.product.edit-product', compact('product', 'listImage','categoryProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $request->validate([
            'title'       => 'required|max:150|min:4',
            'description' => 'required',
            'images_1'    => 'required',
            'images_2'    => 'required',
            'images_3'    => 'required',
            'images_4'    => 'required',
            'category_id' => 'required',
        ]);

        Product::where('slug', $slug)->update([
            'title'         => $request->title,
            'description'   => $request->description,
            'images_1'      => $request->images_1,
            'images_2'      => $request->images_2,
            'images_3'      => $request->images_3,
            'images_4'      => $request->images_4,
            'ingredients'   => $request->ingredients,
            'howtouse'      => $request->howtouse,
            'tabdesc'       => $request->tabdesc,
            'category_id'   => $request->category_id,
        ]);

        flash('Product ' . $request->title . ' berhasil diubah!')->success();

        return redirect(route('product.index'));
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

