@extends('layouts.app')

@section('content')
<form action="/todos/{{$todo->id}}" method="post">
{{csrf_field()}}
  <div>
    <label for="name">name</label>
    <input type="text" name="name" value="{{$todo->name}}">
  </div>
  <div>
    <label for="content">content</label>
    <textarea name="content"  cols="30" rows="10">{{$todo->content}}</textarea>
  </div>
  <div>
    <input type="number" name="user_id" value="{{$todo->user_id}}">
  </div>
  <input type="submit" value="update">
  <input type="hidden" name="_method" value="patch">
  <a href="/todos">戻る</a>
</form>
@endsection