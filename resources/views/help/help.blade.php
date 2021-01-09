@extends('master')
@section('title','Hướng dẫn - Trợ giúp')
@section('icon','help_outline')
@section('content')
<div id="main-body" class="main-body">
   <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div class="header"><h2>HƯỚNG DẪN</h2></div>
         <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
            <div class="panel panel-primary">
               <div class="panel-heading" role="tab" id="headingOne_1">
               <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1" class="">APP NVGN</a>
               </h4>
               </div>
               <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                  <div class="panel-body">
                     <b>APP NVGN</b> (Nhân viên giao nhận) là APP do J&T Express Việt Nam phát triển dành riêng cho nhân viên sử dụng, cung cấp giao diện và chức năng khác nhau và đang được phát triển liên tục.<br>
                     Tải APP NVGN <a href="https://dongit.net/newapp" target="_blank" title="">TẠI ĐÂY</a>. Sau khi tải về và tiến hành cài đặt, Update lên phiên bản mới nhất. Nhân viên đăng nhập vào tài khoản được nhân sự cung cấp.
                     <b>Chú ý: </b> Đăng nhập sai quá 5 lần sẽ bị khóa, cần liên hệ Quản lý để lấy lại tài khoản.
                  </div>
               </div>
            </div>
            <div class="panel panel-primary">
               <div class="panel-heading" role="tab" id="headingTwo_1">
                  <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false" aria-controls="collapseTwo_1">Lưu ý khi sử dụng APP VNGN</a>
                  </h4>
               </div>
               <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1" aria-expanded="false">
                  <div class="panel-body">
                     Khi sử dụng APP NVGN các bạn cần chú ý như sau :<br>
                     - Thường xuyên cập nhật dữ liệu tỉnh thành.<br>
                     - Thường xuyên làm mới dữ liệu ở mục đợi kiện phát và đợi lấy kiện.<br>
                     - Khi phát được đơn nào thì lập tực ký nhận đơn đó.<br>
                  </div>
               </div>
            </div>
            <div class="panel panel-primary">
               <div class="panel-heading" role="tab" id="headingThree_1">
                  <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseThree_1" aria-expanded="false" aria-controls="collapseThree_1">Sử dụng OA</a>
                  </h4>
               </div>
               <div id="collapseThree_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1" aria-expanded="false">
                  <div class="panel-body">
                     <a href="https://oa.jtexpress.vn/" target="_blank" title=""><b>OA</b></a> là phần mềm quản lý nhân viên, chức năng hay được sử dụng nhất là đăng ký nghỉ phép và đăng ký cấp email.<br>
                     <b>Nghỉ Phép</b>
                     <ul>
                        <li>Menu > Quy trình > Nhân sự > Nghỉ phép</li>
                        <li>+ Thêm mới</li>
                     </ul>
                     Tại giao diện thêm mới điền Ca, ngày nghỉ, loại phép , người thay thế và lý do.<br><br>

                     <b>Đăng ký Email</b>
                     <ul>
                        <li>Menu > Quy trình > Nhân sự > Đơn cấp email</li>
                        <li>+ Thêm mới</li>
                     </ul>
                     Tại giao diện thêm mới Người sử dụng, mã nhân viên, loại mail, mail group, lý do.<br>
                     Nếu bạn không thuộc mail group nào thì chọn Email cá nhân.<br>
                     Nếu bạn thuộc mail group nào thì điền tên mail group.
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div class="header"><h2>THÔNG BÁO</h2></div>
         <div class="panel-group" id="accordion_2" role="tablist" aria-multiselectable="true">
            <div class="panel panel-primary">
               <div class="panel-heading" role="tab" id="headingOne_2">
               <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_2" class="">Thông tin COD và PP_PM sẽ không hiển thị trên vận đơn</a>
               </h4>
               </div>
               <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2" aria-expanded="true" style="">
                  <div class="panel-body">
                     Ngày 24/12/2019, CEO đã thông qua quyết định bỏ hiển thị COD và PP_PM trên vận đơn J&T sẽ áp dụng vào ngày 1/1/2020.<br>
                     Như vậy vận đơn J&T sẽ được lược bỏ thông tin COD và PP_PM, NVGN (nhân viên giao nhận) sẽ phải nhìn vào thông tin trên APP NVGN để thu tiền, khi phát được đơn nào phải ký nhận luôn trên hệ thống.<br>
                     Quyết định này sẽ rút ngắn quá trình xử lý đơn, sửa đơn COD của các bộ phận liên quan, giảm khả năng nhầm tiền COD và PP_PM của nhân viên, cải thiện hiệu quả làm việc.
                  </div>
               </div>
            </div>
            <div class="panel panel-primary">
               <div class="panel-heading" role="tab" id="headingTwo_2">
                  <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseTwo_2" aria-expanded="false" aria-controls="collapseTwo_2">Quy định nhận lương tháng 12 và thưởng tết Canh Tý năm 2020</a>
                  </h4>
               </div>
               <div id="collapseTwo_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1" aria-expanded="false">
                  <div class="panel-body">
                     Đang cập nhật
                  </div>
               </div>
            </div>
            {{-- <div class="panel panel-primary">
               <div class="panel-heading" role="tab" id="headingThree_2">
                  <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseThree_2" aria-expanded="false" aria-controls="collapseThree_2">
                     Collapsible Group Item #3
                  </a>
                  </h4>
               </div>
               <div id="collapseThree_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1" aria-expanded="false">
                  <div class="panel-body">
                     Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                     non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                     eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                     single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                     helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                     Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                     raw denim aesthetic synth nesciunt you probably haven't heard of them
                     accusamus labore sustainable VHS.
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
   </div>

@endsection('content')