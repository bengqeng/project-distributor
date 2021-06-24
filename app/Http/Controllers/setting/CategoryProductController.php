<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Rules\ProductCategoryMustExist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.product_category_index', [
            'productCategories' => CategoryProduct::paginate(10)
        ]);
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
        $validator = Validator::make($request->all(), [
                'category_name'     => ['required'],
                'thumbnail_image'   => ['required', 'mimes:jpeg,png,jpg', 'max:300']
            ],
            [
                'category_name.required' => 'Tolong pastikan anda mengisi nama Kategori',
                'thumbnail_image.mimes'  => 'Pastikan file yang di upload memiliki ekstensi: JPEG, PNG, JPG dan berkapasitas 300kb',
                'thumbnail_image.max'    => 'Pastikan file yang di upload memiliki ekstensi: JPEG, PNG, JPG dan berkapasitas 300kb'
            ]);

        if ($validator->fails()) {
            flash('Gagal menyimpan Kategori.</br><b>'. $validator->errors()->first() .'</b>')->error();
            return redirect()->back();
        }
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
    public function destroy(Request $request, $categoryId)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        $request->merge(['productCategory' => $request->route('product_category')]);

        $validator = Validator::make($request->all(), [
            'productCategory' => [
                'required', new ProductCategoryMustExist()
            ]
        ]);

        if ($validator->fails()) {
            flash('Kategori produk gagal dihapus.</br><b>'. $validator->errors()->first() .'</b>')->warning();
            return response()->json('success', 200);
        }

        CategoryProduct::where('id', $categoryId)->delete();

        flash('Kategori Berhasil dihapus')->success();
        return response()->json('success', 200);
    }
}
