<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table("todos")->insert([
        [
          "name" => "todo1",
          "content" => "content1",
          "user_id" => "1",
          "created_at" => now(),
          "updated_at" => now()
        ],
        [
          "name" => "todo2",
          "content" => "content2",
          "user_id" => "1",
          "created_at" => now(),
          "updated_at" => now()
        ],
        [
          "name" => "todo3",
          "content" => "content3",
          "user_id" => "1",
          "created_at" => now(),
          "updated_at" => now()
        ],
      ]);
    }
}
