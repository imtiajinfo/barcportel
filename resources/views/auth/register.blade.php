@extends('layouts.app')

@section('title' ,'Register')

@section('content')
    <div class="login">
    <!-- Register -->
    <div class="login__block active" id="l-register">
        <div class="login__block__header">
            <i class="zmdi zmdi-account-circle"></i>
            Create an account

            <div class="actions actions--inverse login__block__actions">
                <div class="dropdown">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('login') }}">Already have an account?</a>
                        <a class="dropdown-item" href="#">Forgot password?</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="login__block__body">
            <form method="POST" action="{{ route('register') }}">
            <div class="form-group">
                <input id="name" type="text" class="form-control text-center{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  placeholder="Name" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group form-group--centered">
                <input type="text" class="form-control text-center{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group form-group--centered">
                <input type="password" class="form-control text-center{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group form-group--centered">
                <input type="password" class="form-control text-center" placeholder=" Confirm Password" name="password_confirmation" required>
            </div>


                <button type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-plus"></i></button>
            </form>
        </div>
    </div>
    </div>
@endsection
