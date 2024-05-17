@extends('layout')
@section('content')
<!--Main-->
<div class="login-form" style="height: unset !important; margin-top: -105px!important;">
    <div class="main" style="padding-top: 180px; padding-bottom: 15px; margin-bottom: 0;">

        @if(Session::has('thongbao'))
            <div class="alert alert-success" role="alert">
                {{Session::get('thongbao')}}
            </div>
        @endif

        <form action="{{route('register')}}" method="POST" class="form" style="width: 400px;" id="form-1">
        @csrf

            <h3 class="heading">Register account</h3>
            <div class="dont-have-account">
                Do you have an account? <a class="account-register" href="{{ URL::to('login')}}">Log in</a>
            </div>

            <div class="spacer"></div>

           <style>
            .form-group{ margin-bottom: 0; }
           </style>


            <div class="form-group">
                <label class="control-label text-left">Full Name</label>
                <div>
                   <input type="text" name="name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Email</label>
                <div>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Password</label>
                <div>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Address</label>
                <div>
                    <input type="text" name="address" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Phone</label>
                <div>
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Birthday</label>
                <div>
                    <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" required />
                </div>
            </div>

            <button type="submit" value="Create" class="form-submit" name="register_submit">Register</button>

        </form>
    </div>
</div>
@endsection
