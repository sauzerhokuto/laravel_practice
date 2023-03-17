@extends('layouts.app')

@section('title', '記事投稿サイト')

@section('content')
<div class="admin-list-body">
  <h1>記事一覧</h1>
  <div class="row">
    {{-- <form action="{{ route('articles.create') }}" method="get"> --}}
      <p class="register-button">
        <button>新規登録</button>
      </p>
    {{-- </form> --}}
  </div>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">タイトル</th>
        <th scope="col">記事</th>
      </tr>
    </thead>

    {{-- @foreach($articles as $article)
    <tr>
      <td>{{ $article->admin_name }}</td>
      <td> --}}
        {{-- 編集ボタン --}}
        {{-- <a href="{{ route('article.edit',['article'=>$article->id]) }}">編集</a> --}}

        {{-- 削除ボタン --}}
        {{-- <a href="#" onclick="return confirm('本当に削除しますか？') ? document.getElementById('destroy->{{$article->id}}').submit() : false;">削除</a>
        <form method="post" id="destroy->{{$article->id}}" name="destroy" action="{{ route('article.destroy', ['article'=>$article->id]) }}">
          @csrf
          {{ method_field('DELETE') }}
          <input type="hidden" name="id" value="{{$article->id}}">
        </form>
      </td>
    </tr> --}}
  </table>
</div>
@endsection
