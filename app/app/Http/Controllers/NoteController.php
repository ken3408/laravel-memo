<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
  public function index()
  {
    $notes = Note::with('pages')->get();
    $contents = Page::all();
    return view('dashboard', compact('notes', 'contents'));
  }
  public function create()
  {
    $user = Auth::user()->id;
    return view('notes.create', compact('user'));
  }
  public function store(Request $request, $user_id)
  {
    $note = new Note;
    $note->note_title = $request->note_title;
    $note->user_id = $user_id;
    $note->save();

    return redirect()->route('notes.show')->with('message', 'カテゴリーを登録しました');
  }
  public function show()
  {
    $notes = Note::orderBy('created_at', 'desc')->get();
    return view('notes.show', compact('notes'));
  }
  public function edit($id)
  {
    $note = Note::find($id);

    return view('notes.edit', compact('note'));
  }
  public function update(Request $request, $id)
  {
    $note = Note::find($id);
    $note->note_title = $request->note_title;
    $note->save();

    return redirect()->route('notes.show')->with('message', 'カテゴリーを編集しました');
  }
}
