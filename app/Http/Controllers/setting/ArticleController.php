<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Http\Requests\AdminRequest;
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
        return view('admin.web_content.create-article');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = New Article;
        $article->title = $request->title;
        $article->slug = Str::slug($request->title, '-');
        $article->author = $request->author;
        $article->body_article = $request->body_article;
        // dd($article);
        $article->save();
        return redirect('admin/webcontent/article')->with('status', 'Article Berhasil Dibuat!');
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
        // dd($article);
        return view('admin.web_content.article-edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Article $request, $slug)
    {
        Article::where('slug',$slug)->update([
            'title' => $request->title,
            'author' => $request->author,
            'body_article' =>$request->body_article,
        ]);
        return redirect('admin/webcontent/article')->with('status', 'Article Berhasil Diubah!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        return view('admin.web_content.article')->with('status', 'Article Berhasil Dihapus!');
    }
}
