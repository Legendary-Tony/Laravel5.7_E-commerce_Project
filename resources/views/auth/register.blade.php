@extends('layouts.app')

@section('content')
<section class="header_text sub">
    <img class="pageBanner" src="{{ asset('themes/images/pageBanner.png') }}" alt="New products" >
    <h4><span>Regsiter</span></h4>
</section> 
<section class="main-content">              
    <div class="row"> 
        <div class="span12">                 
            <h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
            <form method="POST" action="{{ route('register') }}" class="form-stacked" style="margin-left:40%;">
                @csrf
                <fieldset>

                    <div class="control-group">
                        <label for="name" class="control-label">{{ __('Name') }}</label>
                        <div class="controls">
                            <input id="name" type="text" class="input-xlarge form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email address:</label>
                        <div class="controls">
                            <input id="email" type="email" class="input-xlarge form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Password:</label>
                        <div class="controls">
                            <input id="password" type="password" class="input-xlarge form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Confirm Password:</label>
                            <div class="controls">
                                <input id="password-confirm" type="password" class="input-xlarge form-control" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>                                                      
                    <div class="control-group">
                        <p>Now that we know who you are. I'm not a mistake!</p>
                        <p>In a comic, you know how you can tell who the 
                        arch-villain's going to be?</p>
                    </div>
                    
                    <div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create your account"></div>
                </fieldset>
            </form>                 
        </div>
    </div>
</section>  
@endsection
