@extends('layouts.index.index_login')


@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url({{asset('index_login/images/bg-01.jpg')}});">
                <span class="login100-form-title-1">
                    Sign In
                </span>
            </div>

            <form class="login100-form validate-form"  action="{{route('login.post.perticipant')}}" method="post">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="code is required">
                    <span class="label-input100">Code</span>
                    <input class="input100 " type="text" name="code" required autocomplete="code" autofocus placeholder="Enter your 12 digit code" value="{{ old('code') }}">
                    <span class="focus-input100"></span>
                    
                </div>


                @if (session('errorCode'))
                    <div class="text-danger">
                        <strong><i class="fa fa-circle" aria-hidden="true"> </i> {{ session('errorCode') }}</strong><br>
                    </div>
                @endif

                @if (count($errors) > 0)

                    @foreach ($errors->all() as $error)
                        
                        <strong class="text-danger"><i class="fa fa-circle" aria-hidden="true"></i> {{$error}}</strong><br>
                        
                    @endforeach

        
                @endif




                <div class="flex-sb-m w-full p-b-30">



                </div>

                <div class="container-login100-form-btn">
                    
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>


                </div>
            </form>
        </div>
    </div>
</div>
@endsection