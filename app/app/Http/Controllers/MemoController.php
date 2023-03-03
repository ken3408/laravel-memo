<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
  public function index()
  {
    $memos = Memo::orderBy('created_at', 'desc')->get();
    return view('memos.index', compact('memos'));
  }
  public function create()
  {
    return view('memos.create');
  }
  public function store(Request $request)
  {
    $memo = new Memo;
    $memo->title = $request->title;
    $memo->content = $request->content;
    $memo->save();

    return redirect()->route('memos.index')->with('message', '新しいメモを登録しました');
  }
  public function edit($id)
  {
    $memo = Memo::find($id);

    return view('memos.edit', compact('memo'));
  }
  public function update(Request $request, $id)
  {
    $memo = Memo::find($id);
    $memo->title = $request->title;
    $memo->content = $request->content;
    $memo->save();

    return redirect()->route('memos.index')->with('message', '新しいメモを編集しました');
  }
}
