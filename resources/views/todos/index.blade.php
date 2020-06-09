
<a href="/todos/create">新規作成</a>

@foreach($todos as $todo)
  <ul>
    <li><a href='todos/{{$todo->id}}'>{{ $todo->name}}</a>
    </li>
    <li>{{ $todo->content}}</li>
    <a href="/todos/{{$todo->id}}/edit">編集</a>
    <form action="/todos/{{$todo->id}}" method="post">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="delete">
      <input type="submit" value="削除">
    </form>
    <hr>
  </ul>
@endforeach