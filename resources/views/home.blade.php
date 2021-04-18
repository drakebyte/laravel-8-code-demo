@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>

                <hr/>

                <div class="card">
                    <div class="card-header">Vue component showcase</div>
                    <div class="card-body">
                        <mybutton
                                text="This text will be shown as the button name but will be override by axios api call"
                                type="submit"></mybutton>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
