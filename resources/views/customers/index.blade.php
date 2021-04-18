@extends('layouts.app')

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
                    <li class="list-group-item">{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span>  --  {{ $customer->active }} <img width="100" src="{{ asset('storage/' . $customer->image) }}" alt="" class="img-thumbnail"> <a class="btn btn-success" href="{{ route('customers.show', ['customer' => $customer]) }}">View</a> <a class="btn btn-warning" href="{{ route('customers.edit', ['customer' => $customer]) }}">Edit</a> @include('customers.delete') </li>
                @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection