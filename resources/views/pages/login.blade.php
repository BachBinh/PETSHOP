@extends('layout')
@section('content')
    <!--Main-->
    <div class="login-form">
        <div class="height360">
            <div class="main">

                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                @endif

                <form action="{{route('login')}}" method="POST" class="form" id="form-2">
                   @csrf
                    <h3 class="heading">Log in</h3>


                    <div class="form-group">
                        <label for="Fullname" class="form-label">Enter email</label>
                        <input type="email" name="email" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="form-message"></span>
                    </div>


                    <button type="submit" class="form-submit" value="Login" name="login_submit">Login</button>

                    <div class="dont-have-account">
                        Do not have an account? <a class="account-register" href="{{ URL::to('register')}}">Register now</a>
                    </div>
                    <div class="dont-have-account">
                        Forgot password? <a class="account-register" href="#">Password retrieval</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
