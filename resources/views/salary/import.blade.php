@extends('master')
@section('title','Import Excel')
@section('icon','move_to_inbox')
@section('content')
<div id="main-body" class="main-body">
    <small>Thêm bảng lương hàng loạt</small>
	<i class="small">
		<p>File nhập bắt buộc là file <span class="col-pink">EXCEL: .xlsx, .xls</span>, kiểm tra chính xác trước khi thêm.  File mẫu <a class="icon col-cyan" href="{{ url('/') }}/import/demo-salary.xlsx"><i class="material-icons">arrow_downward</i><span class="icon-name">Tải xuống</span></a></p>
	</i>

	<form action="" method="POST" role="form" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xs-12">
		        <div class="form-group">
				@php
					$m = date('m');
					$y = date('Y');
					$now = $m.'/'.$y;
					if($m == 1){
						$before = '12/'.($y-1);
						$before2 = '11/'.($y-1);
					}else{
						if($m <= 10){
							$before = '0'.($m-1).'/'.$y;
							if($m == 02){
								$before2 = '12/'.($y-1);
							}else{
								$before2 = '0'.($m-2).'/'.$y;
							}
							
						}else{
							$before = ($m-1).'/'.$y;
							if($m == 11){
								$before2 = '0'.($m-2).'/'.$y;
							}else{
								$before2 = ($m-2).'/'.$y;
							}
						}
					}
					if($m == 12){
						$after = '01/'.($y+1);
					}else{
						if($m < 9){
							$after = '0'.($m+1).'/'.$y;
						}else{
							$after = ($m+1).'/'.$y;
						}
						
					}
				@endphp
		        	<label class="form-label">Tháng</label>
		            <div class="form-line">
                   		<select class="form-control show-tick" name="month">
                   			<option value="{{ $before2 }}">{{ $before2 }}</option>
                   			<option value="{{ $before }}" selected>{{ $before }}</option>
							<option value="{{ $now }}">{{ $now }}</option>
							<option value="{{ $after }}">{{ $after }}</option>
                        </select>
                        @if($errors->has('month'))
                            <em style="color:red">{{$errors->first('month')}}</em>
                        @endif
		            </div>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-6">
				<input class="btn btn-block btn-lg waves-effect bg-grey" type="file" id="upload" name="upload" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" required>
                @if($errors->has('upload'))
                    <em style="color:red">{{$errors->first('upload')}}</em>
                @endif
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn bg-cyan btn-block btn-lg waves-effect">TẢI LÊN</button>
			</div>
		</div>
		{!! csrf_field() !!}
	</form>

</div>

@endsection('content')

