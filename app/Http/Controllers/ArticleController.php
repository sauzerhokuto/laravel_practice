<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Http\Requests\Article\ArticleRequest;



class ArticleController extends Controller
{
    //記事の一覧(index)
    public function index(Request $request)
    {
        $article = Article::query();
        $user = Auth::user();
        // dd($articles);

        /* キーワードから検索処理 */
        $keyword = $request->input('keyword');
        if (!empty($keyword)) { //$keyword　が空ではない場合、検索処理を実行します
            $article->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        $articles = $article->paginate(5);

        return view('article.index', compact('articles', 'user'));
    }

    // //記事の作成画面(create)
    public function create()
    {
        return view('article.register');
    }

    //記事の作成(register)
    public function register(ArticleRequest $request)
    {
        $user = Auth::user();

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $user->id,
        ]);
        return redirect()->route('articles.index')
            ->with('status', '投稿が完了しました。');
    }

    // //記事の編集画面(show)
    // public function show()
    // {

    //     全ての記事を取得

    //     return view();
    // }

    // //記事の編集(edit)
    public function edit($id)
    {
        $article = Article::find($id);
        return view('article.edit', compact('article'));
    }

    // //記事の更新(update)
    public function update(ArticleRequest $request, $id)
    {
        // articleを定義する
        $article = Article::find($id);
        // articleを更新する
        $article->fill([
            'title' => $request->title,
            'body' => $request->body,
        ])->save();

        return redirect()->back()
            ->with('status', '更新が完了しました。');
    }

    // //記事の削除(destroy)
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->back()
            ->with('status', '削除が完了しました。');
    }
}
