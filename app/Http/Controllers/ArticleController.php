<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //記事の一覧(index)
    public function index()
    {
        // $articles = Article::all();

        return view('article.index');
    }

    // //記事の作成画面(store)
    // public function store()
    // {


    //     return view();
    // }

    // //記事の作成(create)
    // public function create()
    // {

    //     全ての記事を取得

    //     return view();
    // }

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
