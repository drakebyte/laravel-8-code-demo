@extends('layouts.app')

@section('title')
    Details for {{ $customer->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-6">
            <p><strong>Name </strong>{{ $customer->name }}</p>
            <p><strong>Email </strong>{{ $customer->email }}</p>
            <p><strong>Status </strong>{{ $customer->active }}</p>
            <p><strong>Company </strong>{{ $customer->company->name }}</p>
            @can('create', App\Customer::class)
                <a class="btn btn-warning" href="{{ route('customers.edit', ['customer' => $customer]) }}">Edit</a>
                @include('customers.delete')
            @endcan
        </div>

        @if($customer->image)
            <div class="col-6">
                <img src="{{ asset('storage/' . $customer->image) }}" alt="" width="300" class="img-thumbnail">
            </div>
        @endif
    </div>
@endsection