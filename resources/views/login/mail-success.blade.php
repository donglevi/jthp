@extends('login.master')
@section('title','Quên mật khẩu')
@section('content')
<div class="text-center">
    <h3 class="page-name">ĐÃ GỬI EMAIL</h3>
    <div class="text-center mb-3">Gửi yêu cầu thành công !<br> Vui lòng kiểm tra hộp <b>thư đến</b> hoặc <b>thư rác</b>.</div>
    <p><a class="color" href="{{ route('login') }}" >Quay lại</a></p>
</div>
@endsection('content')