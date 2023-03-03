<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Create Note</title>
</head>
<body>
  <form method="POST" action="{{ route('notes.update', $note->id) }}">
  @csrf
  @method('patch')
    <label for="title">Title</label><br>
    <input type="text" name="note_title" id="title" class="form-control" value="{{$note->note_title}}" required>
    <br>
    <button type="submit"  class="btn btn-primary">更新</button>
  </form>
  <a href="{{ route('notes.index') }}">カテゴリーページはこちら</a>
</body>
</html>