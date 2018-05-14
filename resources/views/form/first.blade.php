@extends('layouts.form')

@section('form')
    <div>
        <div>1 step of 2</div>
        <p>Customer info</p>

        {!! Form::model($customer, ['route' => 'first.store']) !!}
            {!! Form::textGroup('first_name', null, ['id' => 'first_name', 'required']) !!}
            {!! Form::textGroup('last_name', null, ['id' => 'last_name', 'required']) !!}
            {!! Form::emailGroup('email', null, ['id' => 'email', 'required']) !!}
            {!! Form::textGroup('phone', null, ['id' => 'phone', 'required']) !!}
            {!! Form::textareaGroup('bio', null, ['id' => 'bio']) !!}
            {!! Form::submit('Next', ['class' => 'btn btn-block btn-default']) !!}
        {!! Form::close() !!}

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </div>
@endsection
