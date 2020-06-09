@extends('layouts.app')

@section('content')
<form action="/todos/{{$todo->id}}" method="post">
{{csrf_field()}}
  <div>
    <label for="name">name</label>
    <input type="text" name="name" value="{{$todo->name}}">
    @if($errors->has('name'))
      <p class="error" style="color:red;">{{$errors->first('name')}}</p>
    @endif
  </div>
  <div>
    <label for="content">content</label>
    <textarea name="content"  cols="30" rows="10">{{$todo->content}}</textarea>
    @if($errors->has('content'))
      <p class="error" style="color:red;">{{$errors->first('content')}}</p>
    @endif
  </div>
  <input type="hidden" name="user_id" value="{{$todo->user_id}}">
  <input type="submit" value="update">
  <input type="hidden" name="_method" value="patch">
  <a href="/todos">戻る</a>
</form>
@endsection