@extends('layouts.app')

@section('content')
    <div class="wrapper-page">
        <div class="card overflow-hidden account-card mx-3">
            <div class="bg-primary p-4 text-white text-center position-relative">
                <h4 class="font-20 m-b-5">Selamat Datang</h4>
                <p class="text-white-50 mb-4">Silakan login disini</p>
                <a href="{{ url('/') }}" class="logo logo-admin"><img src="{{ asset('assets/images/iconp.png')}}" height="24" alt="logo"></a>
            </div>
            <div class="account-card-content">
                <form class="form-horizontal m-t-30" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="userpassword">Password</label>
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline"><label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"><i class="mdi mdi-lock">Forgot your Password</i></a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="m-t-40 text-center">
            {{--<p>--}}
                {{--Don't have an account ? <a href="{{ route('register') }}" class="font-500 text-primary">Signup now</a>--}}
            {{--</p>--}}
            <p>
                © 2020 Web Information Brebes <span class="d-none d-sm-inline-block"></span>
            </p>
        </div>
    </div>

@endsection