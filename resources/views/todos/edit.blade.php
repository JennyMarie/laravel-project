@extends('layouts.app')

@section('css')
<style>

</style>

@endsection

@section('content')
    
    @include('components.validation_message')

    {{ Form::open(['route' => ['todo.update', $todo->id], 'method' => 'put']) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $todo->title, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label class="mt-checkbox mt-checkbox-outline">
                {{ Form::checkbox('completed', 1, $todo->completed) }}
                <span></span>
                Completed
            </label>
        </div>

        <a class="btn btn-outline-dark" href="{{route('todo.index')}}" role="button">Back</a>
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@endsection

@section('js')


@endsection