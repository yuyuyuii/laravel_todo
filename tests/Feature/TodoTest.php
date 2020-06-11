<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Todo;

class TodoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

//todoリストが新規登録されているかテスト
    public function test_todo_insert()
    {
      //新規登録出来るか
      $todo = new Todo;
      $todo->name = "name";
      $todo->content = "content";
      $todo->user_id = 1;
      $todo->save();
      // 登録したデータを検索
      $testTodo = Todo::where("name", "name")->first();
      // 検索したデータがnullでないかチェック
      $this->assertNotNull($testTodo);
      // テストデータを削除
      $todo->where("name", "name")->delete();
    }

    public function testTodoDelete()
    {
      //新規登録出来るか
      $todo = new Todo;
      $todo->name = "test";
      $todo->content = "content";
      $todo->user_id = 1;
      $todo->save();
      $todo->where("name", "test")->delete();
      $delete_todo = Todo::where("name", "test")->first();
      $this->assertNull($delete_todo);
    }

    public function testTodoEdit()
    {
      //新規登録出来るか
      $todo = new Todo;
      $todo->name = "test";
      $todo->content = "content";
      $todo->user_id = 1;
      $todo->save();
      //編集するデータを取得し、書き換え
      $editTodo = Todo::where("name", "test")->first();
      $editTodo->name = "edittest";
      $editTodo->content = "content";
      $editTodo->user_id = 1;
      $editTodo->save();
      // 編集したデータが存在するか
      $editedTodo = Todo::where("name", "edittest")->first();
      $this->assertNotNull($editedTodo);
      Todo::where("name", "edittest")->delete();
    }
}
