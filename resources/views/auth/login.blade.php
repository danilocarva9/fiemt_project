@extends('layouts.app_outside')

@section('content')


<form method="POST" class="form-signin" action="{{ route('login') }}">
  @csrf
  <img class="mb-4" src="{{ asset('img/logo-fiemt.png') }}" alt="" width="50%">
  <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name', 'Laravel') }}</h1>

  <label for="inputEmail" class="sr-only">{{ __('E-Mail Address') }}</label>
  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('common.email_address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror

  <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>
  <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('common.password') }}" required autocomplete="current-password">
    @error('password')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror


  <button class="btn btn-lg btn-primary btn-block" type="submit"> {{ __('common.login') }} </button>
  <br/>
    <a href="{{ url('register') }}">{{ __('common.not_registered_yet') }}</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>

@endsection
