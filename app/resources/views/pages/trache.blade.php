<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>Trashed Page</title>
</head>

<body>
    @if (session('message'))
        {{ session('message') }}
    @endif
    <h2>Trashed Page</h2>
    @foreach ($pages as $page)
        <p>{{ $page->page_title }}</p>
        {{-- 復元ボタン --}}
        <form action="{{ route('pages.restore', ['id' => $page->id]) }}" method="post">
            @csrf
            @method('PUT')
            <button class="" type="submit">復元</button>
        </form>
        {{-- 完全削除ボタン --}}
        <form action="{{ route('pages.forceDelete', ['id' => $page->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="" type="submit">完全削除</button>
        </form>
    @endforeach
    <a href="/">メモ一覧ページはこちら</a>
</body>

</html>
