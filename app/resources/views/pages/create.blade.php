<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>Create Page</title>
  <link rel="stylesheet" href="{{ mix('css/page-create.css') }}">
</head>

<body class="create">
  <div class="create-wrap">
    <h2 class="create-h2">Create Page</h2>
    <form method="POST" action="{{ route('pages.store') }}">
      @csrf
      <label class="create-title" for="title">Title</label><br>
      <input class="create-textarea create-title-area" type="text" name="page_title" id="title"
        class="form-control" required>
      <br>
      <label class="create-title" for="title">Content</label><br>
      <textarea class="create-textarea create-content-area" name="page_content" placeholder="Please input text content."></textarea>
      <br>
      <label class="create-title" for="title">Category</label><br>
      <select class="create-select" name="note_id">
        @foreach ($notes as $note)
          <option value="{{ $note->id }}">{{ $note->note_title }}</option>
        @endforeach
      </select>
      <br>
      <br>
      <button type="submit" class="create-btn">作成</button>
    </form>
    <a href="/">メモ一覧ページはこちら</a>
  </div>
</body>

</html>
