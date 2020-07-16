@extends('layouts.app')

@section('css')

@endsection

@section('content')

    @include('components.validation_message')

    {{ Form::open(['route' => 'todo.store']) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label class="mt-checkbox mt-checkbox-outline">
                {{ Form::checkbox('completed', 1, 0) }}
                <span></span>
                Completed
            </label>
        </div>

        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@endsection

@section('js')

@endsection