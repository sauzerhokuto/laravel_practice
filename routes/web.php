<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// 記事一覧
Route::get('/', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
// 記事登録ページ
Route::get('/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
// 記事作成
Route::post('/register', [App\Http\Controllers\ArticleController::class, 'register'])->name('article.register');
// 記事更新ページ
Route::get('/edit', [App\Http\Controllers\ArticleController::class, 'edit'])->name('article.edit');
// 記事更新
Route::get('/update', [App\Http\Controllers\ArticleController::class, 'update'])->name('article.update');
// 記事削除
Route::get('/delete', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('article.destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
