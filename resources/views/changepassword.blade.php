@if (Auth::user()->first_login == 1)
<div class="modal-backdrop fade"></div>
<div class="modal fade" tabindex="-1" role="dialog" style="display: block;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">MẬT KHẨU QUÁ YẾU</h3>
                <h4 class="text-center"">Vui lòng đổi mật khẩu</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('changepassword') }}" method="POST" role="form">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="new_password" placeholder="Mật khẩu mới" value="{{old('new_password')}}" required>
                            <a class="show-pass" href="#" title="Ẩn/Hiện"><i class="material-icons">visibility</i></a>
                        </div>
                        @if($errors->has('new_password'))
                        <em style="color:red">{{$errors->first('new_password')}}</em>
                        @endif
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu mới" value="{{old('confirm_password')}}" required>
                            <a class="show-pass" href="#" title="Ẩn/Hiện"><i class="material-icons">visibility</i></a>
                        </div>
                        @if($errors->has('confirm_password'))
                        <em style="color:red">{{$errors->first('confirm_password')}}</em>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Đổi mật khẩu</button>
                        </div>
                    </div>
                    {!! csrf_field() !!}
                </form>
            </div>
        </div>
    </div>
</div>
@endif