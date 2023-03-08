<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', '/dashboard');
/*Route::middleware(['auth:sanctum', 'verified'])->group(function () {
  Route::redirect('/dashboard', '/notes/index')->name('dashboard');
  Route::resource('/notes', NoteController::class);
  Route::resource('/pages', PageController::class);
});*/
/*Route::get('/', function () {
  return view('welcome');
});*/

Auth::routes();
Route::redirect('/dashboard', '/notes/index')->name('dashboard');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::redirect('/', '/dashboard')->name('dashboard');
// メモ一覧画面を表示する
Route::get('notes/index', [NoteController::class, 'index'])->name('notes.index')->middleware('auth');

// カテゴリー作成画面を表示する
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create')->middleware('auth');

// カテゴリーを保存する
Route::post('/notes/{user_id}/index', [NoteController::class, 'store'])->name('notes.store');

// カテゴリー詳細画面を表示する
Route::get('/notes', [NoteController::class, 'show'])->name('notes.show');

// カテゴリー編集画面を表示する
Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');

// カテゴリーを更新する
Route::patch('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');

// カテゴリーを削除する
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');

// ページ作成画面を表示する
Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create')->middleware('auth');

// 作成ページを保存する
Route::post('/pages/create', [PageController::class, 'store'])->name('pages.store')->middleware('auth');

// ページ詳細画面を表示する
Route::get('/pages/{id}', [PageController::class, 'show'])->name('pages.show');

// ページを更新する
Route::patch('/pages/update/{id}', [PageController::class, 'update'])->name('pages.update');

// ページを削除する
Route::post('/pages/delete/{id}', [PageController::class, 'delete'])->name('pages.delete');

// 検索する
Route::get('/pages', [PageController::class, 'serach'])->name('pages.search');

// 倫理削除したページの一覧画面を表示する
Route::post('/pages/trashe', [PageController::class, 'trashe'])->name('pages.trashe');
// 倫理削除したページを復元
Route::put('/pages/{id}/restore', [PageController::class, 'restore'])->name('pages.restore');
// 倫理削除したページを完全削除
Route::delete('/pages/{id}/force-delete', [PageController::class, 'forceDelete'])->name('pages.forceDelete');
