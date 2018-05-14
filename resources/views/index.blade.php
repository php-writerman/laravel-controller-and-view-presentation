@extends('layouts.base')

@section('content')
    <div class="text-center">
        <h1>Customer registration</h1>
    </div>
    <div class="row">

    <div class="col-md-6">
         Fill information about customer and partner:  <a href="{{ route('first') }}">{{ ($current) ? 'Continue' : 'Go' }}</a>
    </div>

    @if($customers)
        <div class="col-md-6">
            <div>Already registered:</div>
                <ul class="list-group">
                    <li class="list-group-item disabled">
                        Customer | Partner
                    </li>
                    @foreach($customers as $customer)
                        <li class="list-group-item"> {{ $customer->first_name }} {{ $customer->last_name }}
                            {{ ($customer->partner) ? '| ' . $customer->partner->first_name : '' }}</li>
                    @endforeach
                </ul>
        </div>
    @endif
    </div>
@endsection
