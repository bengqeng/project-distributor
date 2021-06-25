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
        return view('admin.product.product_category_new');
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
                'thumbnail_image'   => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:300']
            ],
            [
                'category_name.required' => 'Tolong pastikan anda mengisi nama Kategori',
                'thumbnail_image.mimes'  => 'Pastikan file yang di upload adalah gambar memiliki ekstensi: JPEG, PNG, JPG dan berkapasitas 300kb',
                'thumbnail_image.max'    => 'Pastikan file yang di upload adalah gambar memiliki ekstensi: JPEG, PNG, JPG dan berkapasitas 300kb',
                'thumbnail_image.uploaded'  => 'Pastikan file yang di upload adalah gambar memiliki ekstensi: JPEG, PNG, JPG dan berkapasitas 300kb'
            ]);

        if ($validator->fails()) {
            flash('Gagal menyimpan Kategori.</br><b>'. $validator->errors()->first() .'</b>')->error();
            return redirect()->back();
        }

        $newCategory = new CategoryProduct ();

        $newCategory->category_name = $request->category_name;
        $newCategory->thumbnail_url = $newCategory->categoryUrlPath($validator->validated());

        if($newCategory->save()){
            flash('<b>Berhasil menambahkan kategori baru</b>')->success();
            return redirect()->back();
        }

        flash('Gagal menyimpan kategori, silahkan hubungi administrator')->error();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        return view('admin.product.product_category_edit', ['categoryProduct' => CategoryProduct::where('id', $id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
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
    public function update(Request $request, CategoryProduct $product_category)
    {
        $validator = Validator::make($request->all(), [
            'category_name'     => ['required'],
            'thumbnail_image'   => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:300']
        ],
        [
            'category_name.required'    => 'Tolong pastikan anda mengisi nama Kategori',
            'thumbnail_image.mimes'     => 'Pastikan file yang di upload adalah gambar memiliki ekstensi: JPEG, PNG, JPG dan berkapasitas 300kb',
            'thumbnail_image.max'       => 'Pastikan file yang di upload adalah gambar memiliki ekstensi: JPEG, PNG, JPG dan berkapasitas 300kb',
            'thumbnail_image.uploaded'  => 'Pastikan file yang di upload adalah gambar memiliki ekstensi: JPEG, PNG, JPG dan berkapasitas 300kb'
        ]);

        if ($validator->fails()) {
            flash('Gagal edit Kategori.</br><b>'. $validator->errors()->first() .'</b>')->error();
            return redirect()->back();
        }

        $product_category->removeOldimage($product_category->thumbnail_url);

        $product_category->category_name = $request->category_name;
        $product_category->thumbnail_url = $product_category->categoryUrlPath($validator->validated());

        if($product_category->save()){
            flash('Berhasil mengubah <b><i>'. $request->category_name .'</i></b> kategori baru')->success();
            return redirect()->back();
        }

        flash('Gagal menyimpan kategori, silahkan hubungi administrator')->error();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CategoryProduct $product_category)
    {
        abort_if(!$request->ajax(), 403, 'Unauthorized Action.');

        $product_category->removeOldimage($product_category->thumbnail_url);
        $product_category->delete();

        flash('Kategori Berhasil dihapus')->success();
        return response()->json('success', 200);
    }
}
