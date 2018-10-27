@extends('layouts.app')

@section('content')
<section class="header_text sub">
    <img class="pageBanner" src="{{ asset('themes/images/pageBanner.png') }}" alt="New products" >
    <h4><span>login</span></h4>
</section>
<section class="main-content"> 
    <div class="row"> 
        <div class="span11">                 
            <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
            <form method="POST" action="{{ route('login') }}" style="margin-left:40%;">
                @csrf
                <div class="control-group">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="form-controls">
                        <input id="email" type="email" class="input-xlarge {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus><br>

                        @if ($errors->has('email'))
                        <span style="color: red;" class="invalid-feedback" role="alert alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="control-group">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="form-controls">
                        <input id="password" type="password" class="input-xlarge{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                        <span style="color: red;"  class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="control-group">
                        <div class="col-md-8 offset-md-4">
                            <div class="form-controls">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label style="display: inline;" class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Sign into your account"></div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
