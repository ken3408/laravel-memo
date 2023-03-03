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
  <div class="card-header">Note List</div>
    <form action="{{ route('logout') }}" method="post">
      @csrf
      <input type="submit" value="ログアウト">
    </form>
    <table class="table">
      <thead>
          <tr>
              <th>ID</th>
              <th>Title</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($notes as $note)
          <tr>
            @if($note->deleted_at == null)
              <td>{{ $note->id }}</td>
              <td>{{ $note->note_title }}</td>
              <td>
                <form action="{{ route('notes.edit', ['id'=>$note->id]) }}" method="post">
                  @csrf
                  @method('patch')
                  <input type="submit" value="編集"/>
                </form>
              </td>
              <td>
                <form action="{{ route('notes.destroy', ['id'=>$note->id]) }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" value="削除"/>
                </form>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
    <form action="{{ route('notes.create') }}" method="get">
      <button type="submit" name="create">カテゴリー追加</button>
    </form>
  </div>
</body>
</html>