<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ mix('css/note.css') }}">
  <title>Notes</title>
</head>

<body class="n-body">
  <div class="n-wrap">
    @if (session('message'))
      {{ session('message') }}
    @endif
    <h2 class="card-header">Category List</h2>
    <div class="n-box">
      <table class="table">
        <thead>
          <tr>
            <th class="n-show-category">Category</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($notes as $note)
            <tr>
              <td>{{ $note->note_title }}</td>
              <td>
                <form action="{{ route('notes.edit', ['id' => $note->id]) }}" method="get">
                  <input type="submit" value="編集" />
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <form action="{{ route('notes.create') }}" method="get">
        <button type="submit" name="create">カテゴリー追加</button>
      </form>
      <a href="{{ route('notes.index') }}">メモ一覧ページはこちら</a>
    </div>
  </div>
</body>

</html>
