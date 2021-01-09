<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title') | JTHP.NET{{-- {{ dev_title() }} --}}</title>
      <meta name="description" content="{{-- {{ dev_description() }} --}}">
      <link rel="icon" type="image/png" href="{{ URL('/') }}/public/favicon.png">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
      <link href="{{ URL('/') }}/public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="{{ URL('/') }}/public/plugins/node-waves/waves.css" rel="stylesheet" />
      <link href="{{ URL('/') }}/public/plugins/animate-css/animate.css" rel="stylesheet" />
      {{-- <link href="{{ URL('/') }}/public/plugins/sweetalert/sweetalert.css" rel="stylesheet" /> --}}
      {{-- <link href="{{ URL('/') }}/public/css/materialize.css" rel="stylesheet" /> --}}
      <link href="{{ URL('/') }}/public/css/themes/all-themes.css" rel="stylesheet" />
      <!-- <link href="{{ URL('/') }}/public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" /> -->
      <link href="{{ URL('/') }}/public/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <link href="{{ URL('/') }}/public/css/style.css" rel="stylesheet">
      <!-- Jquery Core Js -->
      <script src="{{ URL('/') }}/public/plugins/jquery/jquery.min.js"></script>
      <!-- dataTables -->
      <!-- Bootstrap Core Js -->
      <script src="{{ URL('/') }}/public/plugins/bootstrap/js/bootstrap.js"></script>
      <!-- <script src="{{ URL('/') }}/public/plugins/bootstrap-select/js/bootstrap-select.js"></script> -->
      {{-- <script src="{{ URL('/') }}/public/plugins/node-waves/waves.js"></script> --}}
      {{-- <script src="{{ URL('/') }}/public/plugins/morrisjs/morris.js"></script> --}}
      <script src="{{ URL('/') }}/public/js/admin.js"></script>
      <script src="{{ URL('/') }}/public/js/demo.js"></script>
      {{-- <script src="{{ URL('/') }}/public/js/pages/ui/notifications.js"></script> --}}
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
      <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165867589-1"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'UA-165867589-1');
   </script>

   </head>
   <body class="theme-red">

      @include('note')
      <!-- Page Loader -->
      <div class="page-loader-wrapper">
         <div class="loader">
            <div class="preloader">
               <div class="spinner-layer pl-red">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
            </div>
            <p>Please wait...</p>
         </div>
      </div>
      <!-- #END# Page Loader -->
      <!-- Overlay For Sidebars -->
      <div class="overlay"></div>
      <!-- #END# Overlay For Sidebars -->
      <!-- Search Bar -->
      <div class="search-bar">
         <div class="search-icon">
            <i class="material-icons">search</i>
         </div>
         <input type="text" placeholder="START TYPING...">
         <div class="close-search">
            <i class="material-icons">close</i>
         </div>
      </div>
      <!-- #END# Search Bar -->
      <!-- Top Bar -->
      <nav class="navbar">
         <div class="container-fluid">
            <div class="">
               <a href="javascript:void(0);" class="bars"></a>
               <a href="javascript:void(0);" class="pick"></a>
               <a class="navbar-brand" href="{{ URL('/') }}"><img src="{{ URL('/') }}/public/images/jtexpress.png" alt=""></a>
               <ul class="nav navbar-nav navbar-right">
                  <!-- Call Search -->
                  <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                  <!-- #END# Call Search -->
                  <!-- Notifications -->
                  <li class="dropdown">
                     <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count">2</span>
                     </a>
                     <ul class="dropdown-menu notifications">
                        <li class="header">THÔNG BÁO</li>
                        <li class="body">
                           <ul class="menu">

                              <li>
                                 <a href="{{ route('help') }}">
                                    <div class="icon-circle bg-light-green">
                                       <i class="material-icons">cached</i>
                                    </div>
                                    <div class="menu-info">
                                       <h4>Quy định nhận lương tháng 12 và thưởng tết</h4>
                                       <p>
                                          <i class="material-icons">access_time</i>
                                       @php
                                          $seconds_ago = (time() - strtotime('2019-12-24 01:00:00'));
                                          if ($seconds_ago >= 31536000) {
                                              echo intval($seconds_ago / 31536000) . " năm trước";
                                          } elseif ($seconds_ago >= 2419200) {
                                              echo intval($seconds_ago / 2419200) . " tháng trước";
                                          } elseif ($seconds_ago >= 86400) {
                                              echo intval($seconds_ago / 86400) . " ngày trước";
                                          } elseif ($seconds_ago >= 3600) {
                                              echo intval($seconds_ago / 3600) . " giờ trước";
                                          } elseif ($seconds_ago >= 60) {
                                              echo intval($seconds_ago / 60) . " phút trước";
                                          } else {
                                              echo "1 phút trước";
                                          }
                                       @endphp
                                       </p>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="{{ route('help') }}">
                                    <div class="icon-circle bg-purple">
                                       <i class="material-icons">settings</i>
                                    </div>
                                    <div class="menu-info">
                                       <h4>Thông tin COD và PP_PM sẽ không hiển thị trên vận đơn</h4>
                                       <p>
                                          <i class="material-icons">access_time</i>
                                          @php
                                             $seconds_ago = (time() - strtotime('2019-12-23 01:00:00'));
                                             if ($seconds_ago >= 31536000) {
                                                 echo intval($seconds_ago / 31536000) . " năm trước";
                                             } elseif ($seconds_ago >= 2419200) {
                                                 echo intval($seconds_ago / 2419200) . " tháng trước";
                                             } elseif ($seconds_ago >= 86400) {
                                                 echo intval($seconds_ago / 86400) . " ngày trước";
                                             } elseif ($seconds_ago >= 3600) {
                                                 echo intval($seconds_ago / 3600) . " giờ trước";
                                             } elseif ($seconds_ago >= 60) {
                                                 echo intval($seconds_ago / 60) . " phút trước";
                                             } else {
                                                 echo "1 phút trước";
                                             }
                                          @endphp
                                       </p>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="footer">
                           <a href="{{ route('help') }}">Xem tất cả</a>
                        </li>
                     </ul>
                  </li>
                  <!-- #END# Notifications -->
                  <!-- Tasks -->
                  <!-- #END# Tasks -->
                  <li class="dropdown user-info">
                     <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <div class="image">
                           <img src="{{ URL('/') }}/public/images/user.png" width="48" height="48" alt="User" />
                        </div>
                        <div class="info-container user-helper-dropdown">
                           <div class="name">{{ Auth::user()->name }}</div>
                           <div class="email">{{ Auth::user()->email }}</div>
                           <i class="material-icons">keyboard_arrow_down</i>
                        </div>
                     </a>
                     <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('profile') }}"><i class="material-icons">assignment_ind</i>Chỉnh sửa thông tin</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="material-icons">input</i>Đăng xuất</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- #Top Bar -->
      <section>
         <!-- Left Sidebar -->
         <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            @include('menu')
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
               <div class="copyright">Designed by<a target="_blank" href="https://dongit.net" rel="dofolow">ĐÔNG LEVI'S</a></div>
               <div class="mobile text-center hide">
                  <a target="_blank" href="https://dongit.net" rel="dofolow">
                     <img src="{{ URL('/') }}/public/images/favicon.png" alt="ĐÔNG LEVI'S" title="Designed by ĐÔNG LEVI'S">
                  </a>
               </div>
            </div>
            <!-- #Footer -->
         </aside>
         <!-- #END# Left Sidebar -->
      </section>
      <section id="content" class="content">
         <div class="container-fluid">
            <div class="main-content">
               <div class="title-page">
                  <h3><i class="material-icons">@yield('icon')</i> @yield('title')</h2>
               </div>
               @yield('content')
            </div>
         </div>
      </section>
      @include('changepassword')
   </body>
</html>