@extends('login.master')
@section('title','Quên mật khẩu')
@section('content')
<form id="sign_in" action="{{url('forgotpassword')}}" method="POST" role="form">
    <h3 class="page-name text-center">QUÊN MẬT KHẨU</h3>
    <div class="text-center mb-3">Nhập địa chỉ email của bạn mà bạn sử dụng để đăng ký. Chúng tôi sẽ gửi cho bạn một email với tên người dùng của bạn và một liên kết để đặt lại mật khẩu của bạn.</div>
    <div class="input-group mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
            </div>
            <input type="email" class="pl-1 form-control shadow-none" id="email" placeholder="Email" name="email" value="{{old('email')}}" required autofocus autocapitalize="off">
        </div>
        @if($errors->has('email'))
        <em style="color:red">{{$errors->first('email')}}</em>
        @endif
    </div>
    {!! csrf_field() !!}
    <div class="form-group text-center d-block mb-2">
        <button class="btn btn-danger" type="submit">Gửi Email</button>
    </div>
    <a class="forgotpassword float-right" href="{{ URL::to('login') }}">Bạn đã có tài khoản ?</a>
</form>
@endsection('content')