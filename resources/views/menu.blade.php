<div class="menu">
   <ul class="list">
      <li class="header">MENU</li>
      @if(auth()->user()->level == 1)
      <li>
         <a href="{{ route('dashboard') }}">
            <i class="material-icons">home</i>
            <span>Trang chủ</span>
         </a>
      </li>
      <li>
         <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">person_outline</i>
            <span>Người dùng</span>
         </a>
         <ul class="ml-menu">
            <li><a href="{{ route('user') }}"><i class="material-icons">person_outline</i><span>Tất cả người dùng</span></a></li>
            <li><a href="{{ route('user.import') }}" ><i class="material-icons">move_to_inbox</i><span>Import Excel</span></a></li>
         </ul>
      </li>
      <li>
         <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">extension</i>
            <span>Bảng lương</span>
         </a>
         <ul class="ml-menu">
            <li><a href="{{ route('salary') }}"><i class="material-icons">extension</i><span>Tất cả bảng lương</span></a></li>
            <li><a href="{{ route('salary.add') }}" ><i class="material-icons">note_add</i><span>Thêm</span></a></li>
            <li><a href="{{ route('salary.import') }}" ><i class="material-icons">move_to_inbox</i><span>Import Excel</span></a></li>
            <li><a href="{{ route('salarycol') }}"><i class="material-icons">view_list</i><span>Tiêu đề cột</span></a></li>
         </ul>
      </li>
      <li>
         <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">settings</i>
            <span>Cài đặt</span>
         </a>
         <ul class="ml-menu">
            <li><a href="{{ url('/settings') }}"><i class="material-icons">settings_applications</i><span>Cài đặt Website</span></a></li>
            <li><a href="{{ url('/settings/permission') }}" ><i class="material-icons">verified_user</i><span>Phân quyền</span></a></li>
         </ul>
      </li>
      @endif
      <li>
         <a href="{{ route('profile') }}"><i class="material-icons">person</i><span>Trang cá nhân</span></a>
      </li>
      <li>
         <a href="{{ url('/khieu-nai') }}"><i class="material-icons">rotate_90_degrees_ccw</i><span>Khiếu nại - góp ý</span></a>
      </li>
      <li>
         <a href="{{ route('help') }}"><i class="material-icons">help_outline</i><span>Hướng dẫn</span></a>
      </li>
      <!--         <li>
         <a href="{{ url('/exam') }}">
            <i class="material-icons">school</i>
            <span>Kiểm tra online</span>
         </a>
      </li>
      <li>
         <a href="{{ url('/send-mail') }}">
            <i class="material-icons">email</i>
            <span>Gửi Email</span>
         </a>
      </li>-->
   </ul>
</div>