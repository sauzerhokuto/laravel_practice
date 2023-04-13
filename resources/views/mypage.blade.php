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
    <div class="d-flex">
        <form id="article-create" action="{{ route('article.create') }}" method="POST" class="d-inline" style="margin-left: 20px; margin-right: 30px;">
            @method('GET')
            @csrf
            <button type="submit" class="dropdown-item">{{ __('translation.Article Create') }}</button>
        </form>

        {{-- 検索機能 --}}
        <div>
            <form action="{{ route('mypage',['id' => $user->id]) }}" method="GET">
            @csrf
                <input type="text" name="keyword">
                <input type="submit" value="検索">
            </form>
        </div>
    </div>
    <!-- 以下はそのままのコード -->


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
                <a href={{ route('article.edit',['id' => $article->id]) }} style="margin-right: 10px;">編集</a>

                <a href="#" onclick="return confirm('本当に削除しますか？') ? document.getElementById('destroy->{{$article->id}}').submit() : false;" class="btn btn-danger btn-sm">削除</a>
                <form method="post" id="destroy->{{$article->id}}" name="destroy" action="{{ route('article.destroy',['id' => $article->id])}}" >
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="id" value="{{$article->id}}" >
                </form>
              </td>
            </tr>
          @endforeach
          @endif
        </tbody>
      </table>

      {{-- {{ $articles->links() }} --}}

  </div>
@endsection
