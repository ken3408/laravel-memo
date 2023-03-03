<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Create Memo</title>
</head>
<body>
  <form method="POST" action="{{ route('memos.update', $memo->id) }}">
  @csrf
  @method('patch')
    <label for="title">Title</label><br>
    <input type="text" name="title" id="title" class="form-control" value="{{$memo->title}}" required>
    <br>
    <label for="content">Content</label><br>
    <textarea name="content" id="content" class="form-control" required>{{$memo->content}}</textarea>
    <br>
    <button type="submit"  class="btn btn-primary">作成</button>
  </form>
  <a href="{{ route('memos.index') }}">メモ一覧ページはこちら</a>
</body>
</html>