<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class MypageController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $articles = Article::find($user->articles);
        // dd($articles);

        return view('mypage', compact('articles'));
    }
}
