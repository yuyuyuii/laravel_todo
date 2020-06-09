<ul>
  <li>{{$todo->name}}</li>
  <li>{{$todo->content}}</li>
  <a href="/todos/{{$todo->id}}/edit">編集</a>
  <form action="/todos/{{$todo->id}}" method="post">
  {{csrf_field()}}
    <input type="submit" value="削除">
    <input type="hidden" name="_method" value="delete">
  </form>
  <a href="/todos">一覧</a>
</ul>