@extends('layout')

@section('title')
    Details for {{ $customer->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <p><strong>Name </strong>{{ $customer->name }}</p>
            <p><strong>Email </strong>{{ $customer->email }}</p>
            <p><strong>Status </strong>{{ $customer->active }}</p>
            <p><strong>Company </strong>{{ $customer->company->name }}</p>
            <a class="btn btn-warning" href="/customers/{{ $customer->id }}/edit">Edit</a>
            @include('customers.delete')
        </div>
    </div>
@endsection