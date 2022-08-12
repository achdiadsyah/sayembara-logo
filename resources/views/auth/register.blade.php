@extends('layouts.auth')

@section('content')
<div class="col-lg-6">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
        </div>
        <form class="user" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Your Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                </div>
            </div>
            <button class="btn btn-primary btn-user btn-block" type="submit" onClick="this.form.submit(); this.disabled=true; this.innerText ='Registering Data...'; ">
                Register Account
            </button>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
        <div class="text-center">
            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
        </div>
    </div>
</div>
@endsection
