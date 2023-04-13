@extends('layouts.app')

@section('title', '記事投稿サイト')

<!-- フラッシュメッセージ -->
  @if (session('status'))
    <div class="alert alert-success" role="alert">
      <strong>{{ session('status') }}</strong>
    </div>
  @endif

@section('content')
  <div class="admin-list-body">

    <h1>記事一覧</h1>
      @auth

      {{-- 検索機能 --}}
      <div>
        <form action="{{ route('articles.index') }}" method="GET">
        @csrf
          <input type="text" name="keyword">
          <input type="submit" value="検索">
        </form>
      </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">タイトル</th>
              <th scope="col">記事</th>
            </tr>
          </thead>

          <tbody>
            @foreach($articles as $article)
              <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->body }}</td>
                @if(Auth::id() === $article->user_id)
                  <td>
                    <a href="{{ route('article.edit',['id' => $article->id]) }}" style="margin-right: 10px;">編集</a>
                    <a onclick="return confirm('削除してよろしいですか？')" href={{ route('article.destroy',['id' => $article->id]) }}>削除</a>
                  </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      @endauth
  </div>
@endsection
