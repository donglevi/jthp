@extends('master-simple')
@section('title','Thông tin bảng lương')
@section('icon','extension')
@section('content')
<div id="main-body" class="main-body">
   @include('nhanvien.head')
   <div class="row clearfix">
      <div class="card">
         <div class="body">
            <div>
               <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation"><a href="{{ route('profile') }}#home">Thông tin</a></li>
                  <li role="presentation" class="active"><a href="{{ route('bangluong') }}">Bảng lương</a></li>
                  <li role="presentation"><a href="{{ route('profile') }}#profile_settings">Thay đổi thông tin</a></li>
                  <li role="presentation"><a href="{{ route('profile') }}#change_password_settings">Thay đổi Mật khẩu</a></li>
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="home">
                     <b>CHÚ Ý: </b>
                     <div class="small">Mọi thông tin lương của mỗi nhân viên trong công ty đều được bảo mật, yêu cầu toàn bộ nhân viên không tiêt lộ lương của mình</div>
                     <div class="small">Nhân viên kiểm tra thông tin lương, nếu có thắc mặc vui lòng liên hệ <b>Phòng nhân sự</b> hotline <a href="tel:02257301088"><b>0225.730.1088</b></a> phím lẻ số <b>3</b></div>
                     <br>
                     <form action="" method="get" accept-charset="utf-8">
                        <div class="list-inline m-b-20">
                           <li>THÁNG:</li>
                           <li>
                              <div class="form-line" style="width:auto">
                                 <select name="month" class="form-control">
                                    <option value="">--CHỌN--</option>}
                                    @foreach ($month as $item)
                                    <option value="{{ $item->month }}" @if ($item->month == $getmonth)
                                       selected
                                    @endif>{{ $item->month }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </li>
                           <li>
                              <button type="submit" class="btn btn-primary waves-effect">OK</button>
                           </li>
                        </div>
                     </form>

                     @if ($getmonth)
                     <div class="table-nhanvien m-b-20">
                        <table class="table table-striped nowrap nhanvien">
                           <tbody>
                              <tr>
                                 <td class="headcol">Tháng</td>
                                 <td>{{ $getmonth }}</td>
                              </tr>
                              @foreach ($salary_col as $k => $value)
                              @php $col = $value->salary_col; @endphp
                                 <tr>
                                    <td class="headcol">{{ $value->salary_value }}</td>
                                    @for ($i = 0; $i <= 20 ; $i++)
                                       @isset ($salaries[$i])
                                       <td>
                                          @if (is_numeric($salaries[$i]->$col)) {{
                                             number_format($salaries[$i]->$col, 1) }}
                                          @elseif($salaries[$i]->$col == null)
                                             {!! 0.0 !!}
                                          @else
                                             {{ $salaries[$i]->$col }}
                                          @endif
                                       </td>
                                       @else @break('condition') @endisset
                                    @endfor
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     @endif
                     <b>GHI CHÚ: </b>
                     <div class="small">(*) : Thử việc</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@if ($getmonth)
<div class="modal-backdrop fade"></div>
<div class="modal fade" tabindex="-1" role="dialog" style="display: block;">
   <div class="modal-dialog" role="document">
      <div class="modal-content modal-col-red">
         <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">CHÚ Ý</h4>
         </div>
         <div class="modal-body">
            <p>Mọi thông tin lương của mỗi nhân viên trong công ty đều được bảo mật, yêu cầu toàn bộ nhân viên không tiết lộ lương của mình.</p>
            <p>Nhân viên kiểm tra thông tin lương, nếu có thắc mặc vui lòng liên hệ <b>Phòng nhân sự</b> hotline <a href="tel:02257301088"><b style="color:#fff">0225.730.1088</b></a> phím lẻ số <b>3</b></p>
            XIN CẢM ƠN !
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">ĐỒNG Ý</button>
         </div>
      </div>
   </div>
</div>
@endif
@endsection('content')