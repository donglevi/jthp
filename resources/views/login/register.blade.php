@extends('login.master')
@section('title','Đăng ký')
@section('content')
    <form id="sign_in" action="{{url('register')}}" method="POST" role="form">
    	@if (Session::has('register') == 1) {{-- active mail --}}
        <div class="msg">Kích hoạt tài khoản để sử dụng</div>
        @else
        <div class="msg">Đăng ký thành viên mới</div>
        @endif

		@if (Session::has('register') == 1) {{-- active mail --}}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">email</i>
            </span>
            <div class="form-line">
                <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}" required>
            </div>
            @if($errors->has('email'))
                <em style="color:red">{{$errors->first('email')}}</em>
            @endif
        </div>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="material-icons">lock</i>
			</span>
			<div class="form-line">
				<input type="text" class="form-control" name="code" minlength="6" placeholder="Nhập mã kích hoạt" required="" aria-required="true" required>
			</div>
            @if($errors->has('code'))
                <em style="color:red">{{$errors->first('code')}}</em>
            @endif
		</div>
		@else
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>
            <div class="form-line">
                <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name" value="{{old('name')}}" required autofocus>
            </div>
            @if($errors->has('name'))
                <em style="color:red">{{$errors->first('name')}}</em>
            @endif
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">email</i>
            </span>
            <div class="form-line">
                <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}" required autofocus>
            </div>
            @if($errors->has('email'))
                <em style="color:red">{{$errors->first('email')}}</em>
            @endif
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
            </div>
            @if($errors->has('password'))
                <em style="color:red">{{$errors->first('password')}}</em>
            @endif
        </div>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="material-icons">lock</i>
			</span>
			<div class="form-line">
				<input type="password" class="form-control" name="confirmed" minlength="6" placeholder="Nhập lại mật khẩu" required="" aria-required="true" required>
			</div>
            @if($errors->has('confirmed'))
                <em style="color:red">{{$errors->first('confirmed')}}</em>
            @endif
		</div>
		<div class="form-group">
			<input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
			<label for="terms">Bạn đã đọc và đồng ý về các  <a href="#">điều khoản</a>.</label>
		
            @if($errors->has('terms'))
                <em style="color:red;display: block">{{$errors->first('terms')}}</em>
            @endif
        </div>
        <input type="hidden" name="active" value="1">
		@endif



        {!! csrf_field() !!}
        @if (Session::has('register') == 1) {{-- active mail --}}
        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Kích hoạt Email</button>
        @else
		<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Đăng ký</button>
		@endif

		<div class="m-t-25 m-b--5 align-center">
            <a href="{{ URL::to('/') }}/login">Bạn đẵ có tài khoản ?</a>
        </div>
    </form>
@endsection('content')