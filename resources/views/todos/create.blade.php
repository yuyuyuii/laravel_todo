<form action="/todos" method="post">
{{csrf_field()}}
  <div>
    <label for="name">name</label>
    <input type="text" name="name">
  </div>
  <div>
    <label for="content">content</label>
    <textarea name="content"  cols="30" rows="10"></textarea>
  </div>
  <div>
    <input type="number" name="user_id">
  </div>
  <input type="submit" value="submit">
  <a href="/todos">戻る</a>
</form>