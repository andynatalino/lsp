@extends('layouts.users.app')
@section('pageTitle', 'Login')

@section('content')
<div class="grid">
  <div class="row cells12">
    <div class="cell12">
      <div class="login-form padding20 block-shadow" style="position:fixed;">
        <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <h1 class="text-light">Login</h1>
          <hr class="thin">
          <br />
          <div class="input-control text full-size" data-role="input">
            <label for="user_login">Email</label>
            <input type="text" name="email" id="email">
            @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <button class="button helper-button clear"><span class="mif-cross"></span></button>
          </div>
          <br />
          <br />
          <div class="input-control password full-size" data-role="input">
            <label for="user_password">Password</label>
            <input type="password" name="password" id="password">
            @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <button class="button helper-button reveal"><span class="mif-shareable"></span></button>
          </div>
          <br />
          <br />
          <div class="form-actions">
            <button type="submit" class="button danger">Login</button>
            <a href="{{ route('register') }}"><button type="button" class="button success">Register</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
