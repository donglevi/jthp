@extends('login.master')
@section('title','Đăng nhập')
@section('content')
<form id="sign_in" action="{{ route('login') }}" method="POST" role="form">
    <h3 class="page-name text-center mb-4">ĐĂNG NHẬP</h3>
    <div class="input-group mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" name="user_login" minlength="6" maxlength="6" placeholder="Mã nhân viên 6 chữ số" id="user_login" class="pl-1 form-control shadow-none" value="{{old('user_login')}}" size="20" autocapitalize="off" required autofocus>
        </div>
        @if($errors->has('user_login'))
        <em style="color:red">{{$errors->first('user_login')}}</em>
        @endif
    </div>
    <div class="input-group mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" class="pl-1 form-control shadow-none" name="user_password" placeholder="Mật khẩu" value="" required>
            <a class="show-pass align-middle" href="#" title="Ẩn/Hiện mật khẩu"><i class="fa fa fa-eye"></i></a>
        </div>
        @if($errors->has('user_password'))
        <em style="color:red">{{$errors->first('user_password')}}</em>
        @endif
    </div>
    <div class="form-group form-check type-radio mb-2">
        <input class="form-check-input" type="checkbox" name="remember" id="remember">
        <label class="form-check-label h6" for="remember">Nhớ đăng nhập</label>
    </div>
    <div class="form-group text-center d-block mb-2">
        <button class="btn btn-danger" type="submit">Đăng nhập</button>
    </div>
    <a class="forgotpassword float-right" href="/forgotpassword">Quên mật khẩu ?</a>
    {{-- <a href="register">Đăng ký!</a> --}}
    {!! csrf_field() !!}
</form>
@endsection('content')