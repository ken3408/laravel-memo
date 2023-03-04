<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Create Page</title>
</head>
<body>
  <h2>Create Page</h2>
  <form method="POST" action="{{ route('pages.store') }}">
    @csrf
    <label for="title">Title</label><br>
    <input type="text" name="page_title" id="title" class="form-control" required>
    <br>
    <label for="title">Content</label><br>
    <textarea class="w-full h-full p-3 resize-none outline-none" name="page_content" placeholder="Please input text content."></textarea>
    <br>
    <label for="title">Category</label><br>
    <select name="note_id">
      @foreach ($notes as $note)
      <option value="{{ $note->id }}">{{ $note->note_title }}</option>
      @endforeach
    </select>
    <br>
    <br>
    <button type="submit"  class="btn btn-primary">作成</button>
  </form>
  <a href="/">メモ一覧ページはこちら</a>
</body>
</html>