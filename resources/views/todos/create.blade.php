@extends('layouts.app')

@section('content')
<form action="/todos" method="post">
{{csrf_field()}}
  <div>
    <label for="name">name</label>
    <input type="text" name="name">
    @if($errors->has('name'))
      <p class="error" style="color:red;">{{$errors->first('name')}}</p>
    @endif
  </div>
  <div>
    <label for="content">content</label>
    <textarea name="content"  cols="30" rows="10"></textarea>
    @if($errors->has('content'))
    <p class="error" style="color:red">{{$errors->first('content')}}</p>
    @endif
  
  </div>
  <input type="submit" value="submit">
  <a href="/todos">戻る</a>
</form>
@endsection