@extends('layouts.app')

@section('content')
<a href="/todos/create">新規作成</a>

<!-- 認証済みのユーザーを表示 -->
<!-- {{ $user }} -->

@foreach($todos as $todo)
  @if($todo->user_id == $user->id)
    <ul>
      <li><a href='todos/{{$todo->id}}'>{{ $todo->name}}</a>
      </li>
      <li>{{ $todo->content}}</li>
      <li>{{ $todo->user_id}}</li>
      <a href="/todos/{{$todo->id}}/edit">編集</a>
      <form action="/todos/{{$todo->id}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="delete">
        <input type="submit" value="削除">
      </form>
      <hr>
    </ul>
  @endif
@endforeach


@endsection