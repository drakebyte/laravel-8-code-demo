@extends('layout')

@section('title')
    Add Customers
@endsection

@section('content')
    <form action="{{ route('customers.store') }}" method="POST">
        @include('customers.form')
    </form>
@endsection