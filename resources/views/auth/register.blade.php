@extends('layouts.auth')

@section('content')
<div class="col-lg-6">
    <div class="p-5">
        @php($config = \App\Models\Config::where('id', 1)->first())

        @if(date('Y-m-d H:i:s') >= $config->close_register ." " .$config->close_register_time)
        
        <div class="text-center mb-4">
            <h1 class="h4 text-gray-900">Sorry, Registration was closed!</h1>
        </div>
        <div class="text-center">
            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
        </div>

        @elseif(date('Y-m-d') < $config->open_register)

        <div class="text-center mb-4">
            <h1 class="h4 text-gray-900">Sorry, registration is not open yet!</h1>
            <h5>You can register at : {{longdate_indo($config->open_register)}}</h5>
        </div>

        @else

        <div class="text-center mb-4">
            <h1 class="h4 text-gray-900">Create an Account!</h1>
            <h6>Before : {{longdate_indo($config->close_register) ." | " .$config->close_register_time}} WIB</h6>
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
                    <input id="password-confirm" type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
        
        @endif
    </div>
</div>
@endsection
