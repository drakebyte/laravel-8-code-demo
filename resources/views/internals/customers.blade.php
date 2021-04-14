@extends('layout')

@section('title')
    Customers
@endsection

@section('content')

<ul>
    @foreach ( $customers_array as $customer )
        <li>{{ $customer }}</li>
    @endforeach
</ul>
@endsection