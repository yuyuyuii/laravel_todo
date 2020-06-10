<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Todo;
use App\Http\Controllers\Controller;

class ApiTodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $todos = Todo::all();
      // $todos = Todo::where('user_id', 3)->get();
      return $todos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $todo = new Todo;
      $todo->name = $request->name;
      $todo->content = $request->content;
      $todo->user_id = $request->user_id;
      $todo->save();
      return redirect('api/todos');
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
        return $todo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $todo = Todo::find($id);
      $todo->name = $request->name;
      $todo->content = $request->content;
      $todo->user_id = $request->user_id;
      $todo->save();
      return redirect('api/todos/'.$id);
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
      return redirect('api/todos');
    }
}
