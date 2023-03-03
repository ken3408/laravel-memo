<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// メモ一覧画面を表示する
Route::get('memos/index', [MemoController::class, 'index'])->name('memos.index');

// メモ作成画面を表示する
Route::get('/memos/create', [MemoController::class, 'create'])->name('memos.create');

// メモを保存する
Route::post('/memos/index', [MemoController::class, 'store'])->name('memos.store');

// メモ詳細画面を表示する
Route::get('/memos/{memo}', [MemoController::class, 'show'])->name('memos.show');

// メモ編集画面を表示する
Route::get('/memos/{id}/edit', [MemoController::class, 'edit'])->name('memos.edit');

// メモを更新する
Route::patch('/memos/{memo}', [MemoController::class, 'update'])->name('memos.update');

// メモを削除する
Route::delete('/memos/{memo}', [MemoController::class, 'destroy'])->name('memos.destroy');
