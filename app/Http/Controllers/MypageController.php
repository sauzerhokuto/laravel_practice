<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class MypageController extends Controller
{
    public function mypage(Request $request)
    {
        $user = Auth::user();
        // $article = Article::find($user->articles);
        $article = Article::query()->where('user_id', $user->id);
        // dd($articles);

        /* キーワードから検索処理 */
        // $keyword = $request->input('keyword');
        // if (!empty($keyword)) { //$keyword　が空ではない場合、検索処理を実行します
        //     $article->where('title', 'LIKE', "%{$keyword}%")
        //         ->orWhere('body', 'LIKE', "%{$keyword}%");
        // }
        if (!empty($keyword)) { //$keyword　が空ではない場合、検索処理を実行します
            $article->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('body', 'LIKE', "%{$keyword}%");
            })->get();
        }

        $articles = $article->paginate(5);

        return view('mypage', compact('articles', 'user'));
    }
}
