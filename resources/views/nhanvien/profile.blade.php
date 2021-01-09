@extends('master-simple')
@section('title','Trang cá nhân')
@section('icon','account_box')
@section('content')
<div id="main-body" class="main-body">
   @include('nhanvien.head')
   <div class="row clearfix">
      <div class="card">
         <div class="body">
            <div>
               <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin</a></li>
                  <li role="presentation"><a href="{{ route('bangluong') }}" >Bảng lương</a></li>
                  <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Thay đổi thông tin</a></li>
                  <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Thay đổi Mật khẩu</a></li>
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="home">
                     <div class="panel panel-default panel-post">
                        <div class="panel-heading">
                           <div class="media">
                              <div class="media-left">
                                 <a href="#">
                                    <img src="{{ asset('/') }}public/images/user-defauld.png" alt="User">
                                 </a>
                              </div>
                              <div class="media-body">
                                 <h4 class="media-heading">
                                 <a href="#">{{ Auth::User()->name }}</a>
                                 </h4>
                                 {{ Auth::User()->email }}
                              </div>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="post">
                              <div class="post-heading">
                                 <h4>Mô tả</h4>
                                 <p>{{ Auth::User()->description }}</p>
                              </div>
                              <div class="post-content">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                     <form class="form-horizontal" action="" method="POST" role="form">
                        <div class="form-group">
                           <label for="NameSurname" class="col-sm-2 control-label">Họ tên</label>
                           <div class="col-sm-10">
                              <div class="form-line  m-b-20">
                                 <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ Auth::User()->name }}" required="">
                              </div>
                           </div>
                           @if($errors->has('name'))
                           <em style="color:red">{{$errors->first('name')}}</em>
                           @endif
                        </div>
                        <div class="form-group">
                           <label for="Email" class="col-sm-2 control-label">Email</label>
                           <div class="col-sm-10">
                              <div class="form-line m-b-20">
                                 <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ Auth::User()->email }}" required="">
                                 <div class="help-info">Email giúp bạn lấy lại mật khẩu</div>
                              </div>
                           </div>
                           @if($errors->has('email'))
                           <em style="color:red">{{$errors->first('email')}}</em>
                           @endif
                        </div>
                        <div class="form-group">
                           <label for="description" class="col-sm-2 control-label">Mô tả</label>
                           <div class="col-sm-10">
                              <div class="form-line m-b-20">
                                 <textarea class="form-control" id="description" name="description" rows="3" placeholder="">{{ Auth::User()->description }}</textarea>
                              </div>
                           </div>
                           @if($errors->has('description'))
                           <em style="color:red">{{$errors->first('description')}}</em>
                           @endif
                        </div>
                        <div class="form-group m-t-20">
                           <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Hoàn tất</button>
                           </div>
                        </div>
                        {!! csrf_field() !!}
                     </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                     <form class="form-horizontal" action="" method="POST" role="form">
                        <div class="form-group">
                           <label for="password" class="col-sm-3 control-label">Mật khẩu</label>
                           <div class="col-sm-9">
                              <div class="form-line m-b-20">
                                 <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu hiện tại" required="">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="newpassword" class="col-sm-3 control-label">Mật khẩu mới</label>
                           <div class="col-sm-9">
                              <div class="form-line m-b-20">
                                 <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="" required="">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="newpasswordconfirm" class="col-sm-3 control-label">Nhập lại mật khẩu mới</label>
                           <div class="col-sm-9 m-b-20">
                              <div class="form-line">
                                 <input type="password" class="form-control" id="NewPasswordConfirm" name="newpasswordconfirm" placeholder="" required="">
                              </div>
                           </div>
                        </div>
                        <div class="form-group m-t-20">
                           <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" class="btn btn-danger">Hoàn tất</button>
                           </div>
                        </div>
                        {!! csrf_field() !!}
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   if(window.location.hash){
      $('.nav-tabs>li').removeClass('active');
      $('[href="'+window.location.hash+'"]').closest('li').addClass('active');
      $('.tab-pane').removeClass('in active');
      $(window.location.hash).addClass('in active');
   }
   $('.add-email').on('click', function (e) {
      e.preventDefault();
      $('.nav-tabs>li').removeClass('active');
      $('[href="#profile_settings"]').closest('li').addClass('active');
      $('.tab-pane').removeClass('in active');
      $('#profile_settings').addClass('in active');
   });
</script>
@endsection('content')
