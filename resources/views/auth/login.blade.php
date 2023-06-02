@extends('layouts.front-end.app')

@section('style')
    <style>
        body {
            padding-top: 80px
        }
    </style>
@endsection

@section('navbar')
    @include('layouts.front-end.partials.navbar')
@endsection

@section('title', 'Login | Pulp Dental Clinic')

@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-primary">{{ __('Login') }}</h1>
                <img src="{{ asset('images/undraw_login_re_4vu2.svg') }}" alt="" class="img-fluid mb-3" width="450">
                <p class="col-lg-10 lead text-primary">
                    Please log in to schedule or manage your dental appointments with our expert team of dentists.
                </p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @elseif(session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                @endif
                <form class="p-4 p-md-5 border shadow rounded-3 bg-light" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">{{ __('Username') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Login') }}</button>

                    <hr class="my-4">

                    @if (Route::has('password.request'))
                        <small class="text-muted">
                            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        </small>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.front-end.partials.footer')
@endsection
