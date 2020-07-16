<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        return view('todos.index');
    }

    public function create(){
        return view('todos.create');
    }

    public function store(Request $request){

        $todo = new Todo();
        $todo->title = $request->get('title');
        $todo->completed = $request->get('completed', 0);
        $todo->save();

        return redirect()->route('todo.index')->with('message', 'Succesfully Created!');
    }

    public function edit(Todo $todo){
        return view('todos.edit', compact('todo'));
    }

    public function update(Todo $todo, Request $request){

        $todo->title = $request->get('title');
        $todo->completed = $request->get('completed', 0);
        $todo->save();

        return redirect()->route('todo.index')->with('message', 'Succesfully Updated!');
    }

    public function getTodo(){
        $todos = Todo::orderBy('created_at', 'DESC')->get();

        $todos->map(function ($todo) {
            $todo['edit_url'] = route('todo.edit', $todo->id);
            return $todo;
        });

        return response()->json($todos);
    }

    public function createTodo(Request $request){

        $todo = new Todo();
        $todo->title = $request->get('title');
        $todo->save();

        return response()->json("success", 200);
    }

    public function updateTodo(Request $request){

        Todo::where('id', $request->get('id'))
            ->update([
                'title' => $request->get('title'),
                'completed' => $request->get('completed'),
            ]);

        return response()->json("success", 200);
    }

    public function deleteTodo(Request $request){

        Todo::where('id',$request->get('id'))->delete();

        return response()->json("success", 200);
    }
}
