<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Models\MasterImage;
use App\Http\Requests\ArticleRequest;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article=Article::paginate(5);
        return view('admin.web_content.article', compact('article'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = MasterImage::where('category', 'article')->get();
        return view('admin.web_content.create-article', compact('image'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = New Article;
        $article->title = $request->title;
        $article->slug = Str::slug($request->title, '-');
        $article->author = $request->author;
        $article->images_id = $request->images_id;
        $article->body_article = $request->body_article;
        $article->save();
        flash('Article ' . $article->title . ' berhasil ditambahkan!')->success();
        return redirect('admin/webcontent/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('admin.web_content.detail-article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $image = MasterImage::where('category', 'article')->get();
        return view('admin.web_content.edit-article', compact('article','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $slug)
    {
        Article::where('slug',$slug)->update([
            'title' => $request->title,
            'author' => $request->author,
            'images_id' => $request->images_id,
            'body_article' =>$request->body_article,
        ]);
        flash('Article ' . $request->title . ' berhasil diubah!')->success();
        return redirect('admin/webcontent/article');
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
        $request->merge(['id' => $request->route('product')]);
        $deleteProduct = Article::where('id', $id)
            ->firstOrFail();
        flash('Artikel ' . $deleteProduct->title . ' berhasil dihapus.')->error();
        $deleteProduct->delete();
        return response([
            'status'    => 'success',
            'message'   => 'Data Berhasil Di hapus'
        ]);

    }
}
