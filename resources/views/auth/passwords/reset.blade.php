@extends('layouts.auth')

@section('content')
<div class="col-lg-6">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-2">Confirm Your Password?</h1>
            <p class="mb-4">Please confirm your password before continuing.</p>
        </div> 
        <form class="user" method="POST" action="{{ route('password.update') }}">

            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
            <button type="submit" class="btn btn-primary btn-user btn-block" onClick="this.form.submit(); this.disabled=true; this.innerText ='Processing Reset...'; ">
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
