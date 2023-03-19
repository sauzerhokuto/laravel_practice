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
      <table class="table">
        <thead>
          <tr>
            <th scope="col">タイトル</th>
            <th scope="col">記事</th>
          </tr>
        </thead>

        <tbody>
          @if($articles !== null)
          @foreach($articles as $article)
            <tr>
              <td>{{ $article->title }}</td>
              <td>{{ $article->body }}</td>
              <td>
                <a href={{ route('article.edit',['id' => $article->id]) }}>編集</a>
                <a href={{ route('article.destroy',['id' => $article->id]) }}>削除</a>
              </td>
            </tr>
          @endforeach
          @endif
        </tbody>
      </table>
  </div>
@endsection
