@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-marginless">
        <div class="column is-8">
            <div class="card">
                <div class="card-header"><p class="card-header-title">{{ __('Login') }}</p></div>

                <div class="card-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field">
                          <label class="label">{{__('E-Mail Address') }}</label>
                          <div class="control">
                            <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>
                        
                          <div class="field">
                          <label class="label">{{__('Password') }}</label>
                          <div class="control">
                            <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="email" autofocus>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>
 

                        <div class="field">
                            <div class="control">
                                <div class="form-check">
                                    <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="button is-link" href="{{ route('password.request') }}">
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
