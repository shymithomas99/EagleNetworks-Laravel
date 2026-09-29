@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center  py-5">
        <div class="col-md-8 py-2">

            <!-- Logo -->
            <div class="login-logo">
                <img src="{{ asset('backend_assets/eaglenetworks-logo.png') }}" alt="Eagle Networks Logo">
            </div>

            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn loginbtn">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .login-logo {
        text-align: center;
        margin-bottom: 25px;
    }

    .login-logo img {
        max-width: 250px;
        height: auto;
    }

    .card-header {
        text-align: center;
        font-weight: 400;
        font-size: 30px;
        color: blanchedalmond !important;
        background-color: #e54520 !important;
        font-family: 'AvenirBook' !important;
        border-color: #1d1639;
    }

    .loginbtn {
        background-color: #ff4e25 !important;
        text-align: center;
        color: blanchedalmond !important;
    }

    .forgetpassword {
        top: 93%;
        left: 41%;
        position: absolute;
    }
</style>