<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PageController extends Controller
{
  public function create()
  {
    // データベースからノートの情報を取得して代入
    $notes = Note::all();

    // ダッシュボードを表示
    return view('pages.create', compact('notes'));
  }
  public function store(Request $request)
  {
    $user_id = Auth::user()->id;
    Page::create([
      "page_title" => $request->page_title,
      "page_content" => $request->page_content,
      "note_id" => $request->note_id,
      "user_id" => $user_id
    ]);
    return redirect('/dashboard')->with('message', 'カテゴリーを登録しました');
  }
  public function show($id)
  {
    // データベースからノートの情報を取得して代入
    $notes = Note::all();

    // データベースからページの情報を取得して代入
    $contents = Page::find($id);

    // ダッシュボードを表示
    return view('dashboard', compact('notes', 'contents'));
  }
  public function update(Request $request, $contents_id)
  {
    $contents = Page::find($contents_id);
    $contents->page_content = $request->content;
    $contents->save();
    return back()->with('message', 'メモを編集しました');

    //return view('dashboard', compact('notes', 'contents'))->with('message', 'カテゴリーを編集しました');
  }
  public function delete($id)
  {
    $page = Page::findOrFail($id);
    $page->delete();
    return redirect('/dashboard')->with('message', 'ページを削除しました');
  }
}
