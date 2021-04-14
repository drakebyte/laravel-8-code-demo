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
            <input type="text" class="form-control @if ($errors->first('name')) is-invalid @endif" placeholder="Insert name here..." aria-label="Name" aria-describedby="basic-addon1" name="name" value="{{ old('name') }}">
            <div class="invalid-feedback">{{ $errors->first('name') }}</div><!-- this will catch the failed validation messages -->
        </div>

        <div class="input-group mb-3 has-validation">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">E-mail</span>
            </div>
            <input type="text" class="form-control @if ($errors->first('email')) is-invalid @endif" placeholder="Insert email here..." aria-label="Name" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}">
            <div class="invalid-feedback">{{ $errors->first('email') }}</div><!-- this will catch the failed validation messages -->
        </div>

        <button type="submit" class="btn btn-primary">Add customer</button>

    </form>

    <hr />

    <ul>
        @foreach ( $customers_array as $customer )
            <li>{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span></li>
        @endforeach
    </ul>
@endsection