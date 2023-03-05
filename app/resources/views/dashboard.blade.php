<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes</title>
</head>
<body class="bg-blue-100">
  @if (session('message'))
  {{ session('message') }}
  @endif
  @if (isset($message))
    {{ $message }}
  @endif
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
  <form class="form-inline" id="search-form" method="GET" action="{{ route('pages.search') }}">
    @csrf
    <!--$wordの値がセットされていれば、$wordの値を、セットされていなければ値は空を返します。-->
    <input class="form-control mr-sm-2" id="search-input" type="search" name="search" placeholder="キーワードを入力" value="{{ isset($keyword) ? $keyword : '' }}">
    <br>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
  </form>
  <div class="flex h-screen">
      {{-- メニューエリア --}}
      <div class="">
          {{-- カテゴリー新規作成ボタン --}}
          <form action="{{ route('notes.show') }}" method="get">
              @csrf
              <button class="" type="submit">+（カテゴリーを新規作成）</button>
          </form>
          {{-- ページを新規作成ボタン --}}
          <form action="{{ route('pages.create') }}" method="get">
              @csrf
              <button class="" type="submit">+（ページを新規作成）</button>
          </form>
          {{-- ノートブック１ --}}
          @foreach ($notes as $note)
          <div class="ml-3 mb-2">
              <h2 class="font-bold text-lg">{{ $note->note_title }}</h2>
              <div class="flex flex-col ml-2">
                @foreach ($note->pages as $page)
                  <a class="truncate" href="{{ route('pages.show', ['id'=>$page->id, 'search'=>$keyword]) }}">{{$page->page_title}}</a>
                  {{-- ページ削除ボタン --}}
                  <form action="{{ route('pages.delete', ['id'=>$page->id]) }}" method="post">
                    @csrf
                    <button class="" type="submit">-（削除）</button>
                  </form>
                @endforeach
              </div>
          </div>
          @endforeach
      </div>
      {{-- テキストエリア --}}
      <div class="bg-white w-full rounded-lg my-5 mr-5 p-3 shadow-lg">
        @isset($contents->id)
        <form method="POST" action="{{ route('pages.update', $contents->id) }}" id="update_form">
          @csrf
          @method('patch')
          <button type="submit"  class="btn btn-primary">更新</button>
          @endisset
        </form>
        <textarea class="w-full h-full p-3 resize-none outline-none" name="content" placeholder="Please input text content." form="update_form">@isset($contents->id){{$contents->page_content}}@endisset</textarea>
      </div>
  </div>
</body>
</html>