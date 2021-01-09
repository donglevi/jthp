@extends('master')
@section('title','Import Excel - Quản lý bảng công')
@section('content')

<div id="content" class="content">
	<div class="card">
		<div class="card-header">
            <h2><i class="material-icons">move_to_inbox</i> Import Excel</h2>
            <small>Thêm bảng công hàng loạt</small>
            <p></p>
			<i class="small">
				<p>File nhập bắt buộc là file <span class="col-pink">EXCEL: .xlsx, .xls</span>, kiểm tra chính xác trước khi thêm.  File mẫu <a class="icon col-cyan" href="{{ url('/') }}/import/demo-work.xlsx"><i class="material-icons">arrow_downward</i><span class="icon-name">Tải xuống</span></a></p>
			</i>
		</div>
		<div class="body">
			<form action="" method="POST" role="form" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group form-float" style="height: 65px;">
							<div class="form-line">
								<input type="text" name="month" class="form-control" placeholder="" value="" required>
								<label class="form-label">Tháng</label>
							</div>
							@if($errors->has('month'))
							<em style="color:red">{{$errors->first('month')}}</em>
							@endif
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
	</div>
</div>

@endsection('content')

