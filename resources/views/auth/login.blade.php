@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="login">

        <!-- Login -->
        <div class="login__block active" id="l-login">
            <div class="login__block__header">
                <i class="zmdi zmdi-account-circle"></i>
                Hi there! Please Sign in

                <div class="actions actions--inverse login__block__actions">
                    <div class="dropdown">
                        <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item"  href="{{ route('register') }}">Create an account</a>
                            <a class="dropdown-item" href="#">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="login__block__body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="form-group">
                    <input type="email" class="form-control text-center {{ $errors->has('email') ? ' is-invalid' : ''}}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" class="form-control text-center{{ $errors->has('email') ? ' is-invalid' : ''}}" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                    <button type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>
                </form>
            </div>
        </div>



        <!-- Forgot Password -->
        <div class="login__block" id="l-forget-password">
            <div class="login__block__header">
                <i class="zmdi zmdi-account-circle"></i>
                Forgot Password?

                <div class="actions actions--inverse login__block__actions">
                    <div class="dropdown">
                        <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="#">Already have an account?</a>
                            <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="#">Create an account</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="login__block__body">
                <p class="mb-5">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

                <div class="form-group">
                    <input type="text" class="form-control text-center" placeholder="Email Address">
                </div>

                <a href="index-2.html" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-check"></i></a>
            </div>
        </div>
    </div>
@endsection
