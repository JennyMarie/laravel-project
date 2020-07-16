@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/todo.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')

    @include('components.success_message')
    <div id="todos" class=" todo" v-cloak>
        <h1 class="todo-header">todos</h1>
        <input type="text" v-model="newTodo" v-on:keyup.enter="createTodo">
        <ul>
            <template v-for="todo in todos">
                <todo-item 
                :key="todo.id" 
                :todo="todo" 
                @del-todo="deleteTodo"
                ></todo-item>
            </template>
        </ul>
    </div>

@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var get_todo_route = "{{ route('api.get.todo') }}"
    var create_todo_route = "{{ route('api.create.todo') }}"
    var update_todo_route = "{{ route('api.update.todo') }}"
    var delete_todo_route = "{{ route('api.delete.todo') }}"
</script>
<script src="{{ asset('js/todo.js') }}"></script>

@endsection