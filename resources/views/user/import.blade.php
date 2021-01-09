@extends('master')
@section('title','Import Excel')
@section('icon','move_to_inbox')
@section('content')
<div id="main-body" class="main-body">
	<p></p>
	<small>Thêm người dùng hàng loạt</small>
	<br>
	<i class="small">
	<p>File nhập bắt buộc là file <span class="col-pink">EXCEL: .xlsx, .xls</span>, kiểm tra chính xác trước khi thêm.  File mẫu <a class="icon col-cyan" href="{{ url('/') }}/import/demo-user.xlsx"><i class="material-icons">arrow_downward</i><span class="icon-name">Tải xuống</span></a></p>
	</i>
	<form action="" method="POST" role="form" accept-charset="utf-8" enctype="multipart/form-data">
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