<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">

  <title>Notes</title>
</head>

<body class="d-body">
  <div class="d-wrap">
    @if (session('message'))
      {{ session('message') }}
    @endif
    @if (isset($message))
      {{ $message }}
    @endif
    {{-- エラーメッセージ --}}
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    {{-- ヘッダー --}}
    <header id="dheader">
      <div class="d-header">
        <h1 class="d-header-name">Laravel-Memo</h1>
        {{-- 検索窓 --}}
        <form id="search-form" method="GET" action="{{ route('pages.search') }}">
          <div class="d-header-search">
            @csrf
            <!--$wordの値がセットされていれば、$wordの値を、セットされていなければ値は空を返します。-->
            <input class="d-header-search-form" id="search-input" type="search" name="search" placeholder="キーワードを入力"
              value="{{ isset($keyword) ? $keyword : '' }}">
            <br>
            <button class="d-header-search-btn" type="submit">検索</button>
          </div>
        </form>
        <div class="d-header-btnbox">
          {{-- ログアウトボタン --}}
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <input class="d-header-btn" type="submit" value="ログアウト">
          </form>
          {{-- ゴミ箱 --}}
          <form action="{{ route('pages.trashe') }}" method="POST">
            @csrf
            <button class="d-header-btn" type="submit">（ゴミ箱へ）</button>
          </form>
        </div>
      </div>
    </header>
    {{-- メニューエリア --}}
    <div class="d-container">
      {{-- エリアー左 --}}
      <div class="d-main d-container-left">
        <div class="d-container-left-btnbox">
          {{-- カテゴリー新規作成ボタン --}}
          <form class="d-container-left-bottan" action="{{ route('notes.show') }}" method="get">
            @csrf
            <button class="d-container-left-btn" type="submit">カテゴリー詳細</button>
          </form>
          {{-- ページを新規作成ボタン --}}
          <form class="d-container-left-bottan" action="{{ route('pages.create') }}" method="get">
            @csrf
            <button class="d-container-left-btn" type="submit">ページ追加</button>
          </form>
        </div>
        {{-- ノートブック１ --}}
        @foreach ($notes as $note)
          <div class="ml-3 mb-2">
            <h2 class="font-bold text-lg">{{ $note->note_title }}</h2>
            <div class="page">
              @foreach ($note->pages as $page)
                <div class="page-box">
                  <a class="page-title"
                    href="{{ route('pages.show', ['id' => $page->id, 'search' => isset($keyword) ? $keyword : '']) }}">{{ $page->page_title }}</a>
                  {{-- ページ削除ボタン --}}
                  <form action="{{ route('pages.delete', ['id' => $page->id]) }}" method="post">
                    @csrf
                    <button class="page-delete-btn" type="submit">-（削除）</button>
                  </form>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach

      </div>
      {{-- テキストエリア-右 --}}
      <div class="d-main d-container-right">
        @isset($contents->id)
          <form method="POST" action="{{ route('pages.update', $contents->id) }}" id="update_form">
            @csrf
            @method('patch')
            <button type="submit" class="d-container-right-btn">更新</button>
          </form>
        @endisset
        <input class="" type="text" name="page_title" id="title" value="$contents->page_title">
        <br>
        <textarea class="d-container-right-textarea" name="content" placeholder="Please input text content." form="update_form">
@isset($contents->id)
{{ $contents->page_content }}
@endisset
</textarea>
      </div>
    </div>
  </div>
</body>

</html>
