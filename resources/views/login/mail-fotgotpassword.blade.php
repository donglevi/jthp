<!DOCTYPE html>
<html>
<head>
    <title>Quên mật khẩu - J&T Hải Phòng</title>
</head>
<body>
    <b>J&T Hải Phòng nhận được yêu cầu đổi mật khẩu của bạn:</b>
    <p>Họ và tên: <b>{{ $user->name }}</b></p>
    <p>Mã nhân viên: <b>{{ $user->id_nv }}</b></p>
    <p>Vui lòng click vào <a style="font-weight: bold;" target="_blank" href="{{ route('resetPassword', $user->reset_password) }}" title="Đổi lại mật khẩu">{{ route('resetPassword', $user->reset_password) }}</a> để đổi lại mật khẩu của minh</p>
    <p></p>
    <br>
    <small>* Nếu không phải là bạn thì vui lòng bỏ qua email này</small>
   
    <p>Thank you !</p>
</body>
</html>