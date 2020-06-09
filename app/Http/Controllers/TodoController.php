<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo; # Todoモデルと紐付くので追記する
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      $user = Auth::user();
      $todos = Todo::all();
      // $todos = User::has('todo')->get();
      return view('todos/index', compact("todos", "user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('todos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(TodoRequest $request)
    {
      $todo = new Todo;
      $todo->name = $request->name;
      $todo->content = $request->content;
      $todo->user_id = $request->user()->id;
      $todo->save();
      return redirect('/todos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $todo = Todo::find($id);
      return view("todos/show", compact("todo"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $todo = Todo::find($id);
      return view('todos/edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
      $todo = Todo::find($id);
      $todo->name = $request->name;
      $todo->content = $request->content;
      $todo->user_id = $request->user_id;
      $todo->save();
      return redirect ('todos/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $todo = Todo::find($id);
      $todo->delete();
      return redirect("todos");
    }
}
