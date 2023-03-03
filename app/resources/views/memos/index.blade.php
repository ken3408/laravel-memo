<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memos</title>
</head>
<body>
  @if (session('message'))
    {{ session('message') }}
  @endif
  <div class="card-header">Memo List</div>
    <table class="table">
      <thead>
          <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Content</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($memos as $memo)
              <tr>
                @if($memo->deleted_at == null)
                  <td>{{ $memo->id }}</td>
                  <td>{{ $memo->title }}</td>
                  <td>{{ $memo->content }}</td>
                  <td><a href="{{ route('memos.edit', ['id'=>$memo->id]) }}">編集</a></td>
                @endif
              </tr>
          @endforeach
      </tbody>
    </table>
    <form action="{{ route('memos.create') }}" method="get">
      <button type="submit" name="create">メモ追加</button>
    </form>
  </div>
</body>
</html>