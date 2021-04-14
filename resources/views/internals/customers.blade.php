@extends('layout')

@section('title')
    Customers
@endsection

@section('content')
    <form action="customers" method="POST">
        @csrf

        <div class="input-group mb-3 has-validation">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Name</span>
            </div>
            <input type="text" class="form-control @if ($errors->first('name')) is-invalid @endif"
                   placeholder="Insert name here..." aria-label="Name" aria-describedby="basic-addon1" name="name"
                   value="{{ old('name') }}">
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Add customer</button>

        @csrf
    </form>

    <hr />

    <ul>
        @foreach ( $customers_array as $customer )
            <li>{{ $customer->name }}</li>
        @endforeach
    </ul>
@endsection