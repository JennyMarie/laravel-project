@extends('layouts.app')

@section('css')

@endsection

@section('content')

    @include('components.validation_message')

    {{ Form::open(['route' => ['employee.update', $employee->id], 'method' => 'put']) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $employee->name, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', $employee->email, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('contact', 'Contact') }}
            {{ Form::number('contact', $employee->contact, ['class' => 'form-control','maxlength'=>'11']) }}
        </div>
        <div class="form-group">
            {{ Form::label('position_id', 'Position') }}
            {{Form::select('position_id', $positions, $employee->position_id,  ['class' => 'form-control'])}}
        </div>

        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@endsection

@section('js')

@endsection