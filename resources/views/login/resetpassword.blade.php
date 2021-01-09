@extends('login.master')
@section('title','Đổi mật khẩu')
@section('content')
    <form id="sign_in" action="{{ url('resetpassword') }}" method="POST" role="form" accept-charset="utf-8">
        <input type="hidden" name="resetpassword" value="{{ $reset_password }}">
        <h2 class="msg">ĐỔI MẬT KHẨU: {{ $user->id_nv }}</h2>
		<h3 class="msg">{{ $user->name }}</h3>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" value="{{old('password')}}" required>
                <a class="show-pass" href="#" title="Ẩn/Hiện"><i class="material-icons">visibility</i></a>
            </div>
            @if($errors->has('user_password'))
                <em style="color:red">{{$errors->first('password')}}</em>
            @endif
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu" value="{{old('confirm_password')}}" required>
                <a class="show-pass" href="#" title="Ẩn/Hiện"><i class="material-icons">visibility</i></a>
            </div>
            @if($errors->has('confirm_password'))
                <em style="color:red">{{$errors->first('confirm_password')}}</em>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button class="btn btn-block bg-pink waves-effect" type="submit">Thay đổi</button>
            </div>
        </div>

        <div class="row m-t-15">
            <div class="col-xs-6">
                {{-- <a href="register">Đăng ký!</a> --}}
            </div>
            <div class="col-xs-6 align-right m-b-0">
                <a href="{{ route('login') }}">Đăng nhập</a>
            </div>
        </div>
        {!! csrf_field() !!}
    </form>
@endsection('content')