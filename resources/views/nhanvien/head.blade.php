<div class="m-b-20">
   <p>Họ và tên: <b>{{ Auth::User()->name }}</b></p>
   <p>Mã NV: <b>{{ Auth::User()->id_nv }}</b></p>
   <p>Email: <b>@if (Auth::User()->email)
      {{ Auth::User()->email }}
   @else
      <a class="add-email" href="{{ route('profile') }}#profile_settings">Vui lòng thêm EMAIL</a>
   @endif</b></p>
</div>