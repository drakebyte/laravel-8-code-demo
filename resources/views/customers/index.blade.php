@extends('layouts.app')

@section('title')
    Customers
@endsection

@section('content')

{{--    @can('create', App\Customer::class)--}}
        <a class="btn btn-warning btn-block" href="{{ route('customers.create') }}">Create new customer</a>
{{--    @endcan--}}

    <hr/>

    @foreach($customers as $customer)
        <div class="row">
            <div class="col-1">
                {{ $customer->id }}
            </div>
            <div class="col-1">
                <img width="100" src="{{ asset('storage/' . $customer->image) }}" alt="" class="img-thumbnail">
            </div>
            <div class="col-3">
                @can('view', $customer)
                    <a href="{{ route('customers.show', ['customer' => $customer]) }}">
                        {{ $customer->name }}
                    </a>
                @endcan

                @cannot('view', $customer)
                    {{ $customer->name }}
                @endcannot
            </div>
            <div class="col-3">{{ $customer->company->name }}</div>
            <div class="col-1">{{ $customer->active }}</div>
            <div class="col-3 text-right">
                <a class="btn btn-success" href="{{ route('customers.show', ['customer' => $customer]) }}">View</a>
                <a class="btn btn-warning" href="{{ route('customers.edit', ['customer' => $customer]) }}">Edit</a>
                @include('customers.delete')
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{ $customers->links() }}
        </div>
    </div>
@endsection