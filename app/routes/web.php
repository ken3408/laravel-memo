<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\NoteController;
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

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// メモ一覧画面を表示する
Route::get('notes/index', [NoteController::class, 'index'])->name('notes.index')->middleware('auth');

// カテゴリー作成画面を表示する
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create')->middleware('auth');

// カテゴリーを保存する
Route::post('/notes/{user_id}/index', [NoteController::class, 'store'])->name('notes.store');

// カテゴリー詳細画面を表示する
//Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');

// カテゴリー編集画面を表示する
Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');

// カテゴリーを更新する
Route::patch('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');

// カテゴリーを削除する
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');
