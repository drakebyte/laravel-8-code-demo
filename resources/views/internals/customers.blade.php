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

        <div class="form-group mb-3 has-validation">
            <select name="active" class="form-control @if ($errors->first('active')) is-invalid @endif" aria-label="Default select example">
                <option selected="" disabled>Select customer status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            <div class="invalid-feedback">{{ $errors->first('active') }}</div>
        </div>

        <div class="form-group mb-3 has-validation">
            <select name="company_id" class="form-control @if ($errors->first('company_id')) is-invalid @endif"
                    aria-label="Default select example">
                <option selected="" disabled>Select company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">{{ $errors->first('company_id') }}</div>
        </div>

        <button type="submit" class="btn btn-success">Add customer</button>

    </form>

    <hr />

    <div class="row">
        @foreach($companies as $company)
            <div class="col-6">
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true"><h4>{{ $company->name  }}</h4></li>
                @foreach($company->customers as $customer)
                    <li class="list-group-item">{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span></li>
                @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection