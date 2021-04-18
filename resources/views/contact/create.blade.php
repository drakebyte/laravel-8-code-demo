@extends('layouts.app')

@section('title')
    Contact Us
@endsection

@section('content')
    <p>Company name</p>
    <p>123-123-1234</p>

    @if(!session()->has('contact-success'))
        <form action="{{ route('contact.store') }}" method="POST">

            <div class="input-group mb-3 has-validation">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                </div>
                <input type="text" class="form-control @if ($errors->first('name')) is-invalid @endif"
                       placeholder="Insert name here..." aria-label="Name" aria-describedby="basic-addon1" name="name"
                       value="{{ old('name') }}">
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            </div>

            <div class="input-group mb-3 has-validation">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">E-mail</span>
                </div>
                <input type="text" class="form-control @if ($errors->first('email')) is-invalid @endif"
                       placeholder="Insert email here..." aria-label="Email" aria-describedby="basic-addon1"
                       name="email"
                       value="{{ old('email') }}">
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            </div>

            <div class="input-group mb-3 has-validation">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Message</span>
                </div>
                <textarea name="message" class="form-control @if ($errors->first('message')) is-invalid @endif"
                          id="exampleFormControlTextarea1" rows="3"
                          placeholder="Insert message...">{{ old('message') }}</textarea>
                <div class="invalid-feedback">{{ $errors->first('message') }}</div>
            </div>

            @csrf

            <button type="submit" class="btn btn-success">Send --></button>

        </form>
    @endif
@endsection