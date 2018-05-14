@extends('layouts.form')

@section('form')
    <div>
        <div>2 step of 2</div>
        <p>Partner info</p>

        {!! Form::open(['route' => 'second.store']) !!}
            {!! Form::textGroup('first_name', null, ['id' => 'first_name', 'required']) !!}
            {!! Form::textGroup('last_name', null, ['id' => 'last_name', 'required']) !!}
            {!! Form::emailGroup('email', null, ['id' => 'email', 'required']) !!}
            {!! Form::textGroup('phone', null, ['id' => 'phone', 'required']) !!}

            {!! link_to_route('first', 'Back', [], ['class' => 'btn btn-block btn-info']) !!}
            {!! Form::submit('Next', ['class' => 'btn btn-block btn-default']) !!}
        {!! Form::close() !!}

    </div>
@endsection
