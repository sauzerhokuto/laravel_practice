<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function destroy($id)
    {
        // Auth::Userだとdeleteメソッドが反映されないのはなぜ？
        $user = User::find($id);
        // dd($user);
        // ユーザーを削除する
        $user->delete();
        return view('layouts.app')
            ->with('status', '削除が完了しました。');

        // ユーザーに関連する記事の削除はUserModelに記述あり。


    }
}
