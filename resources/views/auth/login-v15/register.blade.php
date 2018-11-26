@extends('auth.login-v15.layouts')

@section('form')
<div class="wrap-login100">
      <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
              <span class="label-input100">Username</span>
              <input class="input100" type="text" name="username" value="{{ old('username') }}" placeholder="Enter username">
              <span class="focus-input100"></span>
              @if ($errors->has('username'))
              <span class="input-error" role="alert">
                  {{ $errors->first('username') }}
              </span> 
              @endif
          </div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
            <span class="label-input100">E-mail</span>
            <input class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Enter email">
            <span class="focus-input100"></span>
            @if ($errors->has('email'))
            <span class="input-error" role="alert">
                {{ $errors->first('email') }}
            </span> 
            @endif
        </div>
  
          <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
              <span class="label-input100">Password</span>
              <input class="input100" type="password" name="password" placeholder="Enter password">
              <span class="focus-input100"></span> 
              @if ($errors->has('password'))
              <span class="input-error" role="alert">
                  {{ $errors->first('password') }}
              </span> 
              @endif
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate="Password Confirmation is required">
            <span class="label-input100">Confirm Password</span>
            <input class="input100" type="password" name="password_confirmation" placeholder="Enter password">
            <span class="focus-input100"></span> 
        </div>

        <div class="wrap-input100 validate-input m-b-18" data-validate="Password Confirmation is required">
            <span class="label-input100">Jabatan</span>
            <select name="role_id" id="role_id" class="input100">
                @foreach ($userRoles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <span class="focus-input100"></span> 
        </div>
  
          <div class="flex-sb-m w-full p-b-30">
              <div class="contact100-form-checkbox">
                  <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked': '' }}>
                  <label class="label-checkbox100" for="ckb1">
                      Remember me
                  </label>
              </div>
  
              <div>
                  <a href="{{ route('login') }}" class="txt1">
                      Login
                  </a>
                  <a href="{{ route('password.request') }}" class="txt1">
                      Forgot Password?
                  </a>
              </div>
          </div>
  
          <div class="container-login100-form-btn">
              <button class="login100-form-btn">{{ __(ucfirst(Request::segment(1))) }}</button>
          </div>
      </form>
@endsection