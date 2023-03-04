<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Create Note</title>
</head>
<body>
  <form method="POST" action="{{ route('notes.store', ['user_id'=>$user]) }}">
  @csrf
    <label for="title">Category</label><br>
    <input type="text" name="note_title" id="title" class="form-control" required>
    <br>
    <br>
    <button type="submit"  class="btn btn-primary">作成</button>
  </form>
  <a href="{{ route('notes.index') }}">メモ一覧ページはこちら</a>
</body>
</html>