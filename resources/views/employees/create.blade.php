@extends('layouts.app')

@section('css')

@endsection

@section('content')

    @include('components.validation_message')

    {{ Form::open(['route' => 'employee.store']) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('contact', 'Contact') }}
            {{ Form::number('contact', null, ['class' => 'form-control','maxlength'=>'11']) }}
        </div>
        <div class="form-group">
            {{ Form::label('position_id', 'Position') }}
            {{Form::select('position_id', $positions, null,  ['class' => 'form-control'])}}
        </div>

        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@endsection

@section('js')

@endsection