<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes</title>
</head>
<body>
  @if (session('message'))
    {{ session('message') }}
  @endif
  <div class="card-header">Category List</div>
    <form action="{{ route('logout') }}" method="post">
      @csrf
      <input type="submit" value="ログアウト">
    </form>
    <table class="table">
      <thead>
          <tr>
              <th>Category</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($notes as $note)
          <tr>
              <td>{{ $note->note_title }}</td>
              <td>
                <form action="{{ route('notes.edit', ['id'=>$note->id]) }}" method="get">
                  <input type="submit" value="編集"/>
                </form>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <form action="{{ route('notes.create') }}" method="get">
      <button type="submit" name="create">カテゴリー追加</button>
    </form>
  </div>
  <a href="{{ route('notes.index') }}">メモ一覧ページはこちら</a>
</body>
</html>