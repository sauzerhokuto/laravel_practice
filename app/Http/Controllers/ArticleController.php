<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Http\Requests\Article\StoreArticleRequest;


class ArticleController extends Controller
{
    //記事の一覧(index)
    public function index()
    {
        // $articles = Article::all();

        return view('article.index');
    }

    // //記事の作成画面(create)
    public function create()
    {
        return view('article.register');
    }

    //記事の作成(store)
    public function register(StoreArticleRequest $request)
    {

        $article = new Article;

        $article->fill([
            'title' => $request->name,
            'body' => $request->body,
        ])->save();

        return redirect()->route('articles.index')
            ->with('staus', '投稿が完了しました。');

        // $article = Article::create([
        //     'title' => $data['title'],
        //     'body' => $data['body'],
        // ]);
    }

    // //記事の編集画面(show)
    // public function show()
    // {

    //     全ての記事を取得

    //     return view();
    // }

    // //記事の編集(edit)
    // public function edit()
    // {

    //     全ての記事を取得

    //     return view();
    // }

    // //記事の更新(update)
    // public function update()
    // {

    //     全ての記事を取得

    //     return view();
    // }

    // //記事の削除(destroy)
    // public function destroy()
    // {

    //     全ての記事を取得

    //     return view();
    // }
}
