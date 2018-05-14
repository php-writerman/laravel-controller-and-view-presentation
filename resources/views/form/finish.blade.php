@extends('layouts.base')

@section('content')
    <div class="text-center">
        <h1>Cool</h1>
        <div>
            Thank you for registration
        </div>
        <div>
            Now you can see your info in the list: <a href="{{ route('index') }}">Go</a>
        </div>
    </div>
@endsection
