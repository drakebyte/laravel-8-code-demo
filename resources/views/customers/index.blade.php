@extends('layout')

@section('title')
    Customers
@endsection

@section('content')

    <a class="btn btn-warning btn-block" href="{{ route('customers.create') }}">Create new customer</a>

    <hr/>

    <div class="row">
        @foreach($companies as $company)
            <div class="col-12">
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true"><h4>{{ $company->name  }}</h4></li>
                @foreach($company->customers as $customer)
                    <li class="list-group-item">{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span>  --  {{ $customer->active }} <a class="btn btn-success" href="/customers/{{ $customer->id }}">View</a> <a class="btn btn-warning" href="/customers/{{ $customer->id }}/edit">Edit</a></li>
                @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection