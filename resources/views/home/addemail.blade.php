@extends('master')
@section('title','Nhập bản dự liệu cần gửi - EMAIL MAKETTING')
@section('content')

<div id="content" class="content">
	<div class="card">
		<div class="card-header">
			<h2>Thêm bản ghi</h2>
		</div>
		<div class="body">
			<i class="small">
				<p>File nhập bắt buộc là file <span class="col-pink">EXCEL: .xlsx, .xls</span>, kiểm tra chính xác trước khi thêm.</p>
				<p>File mẫu nhập <a class="icon col-cyan" href="{{ url('/') }}/demo/demo.xlsx"><i class="material-icons">arrow_downward</i><span class="icon-name">Tải xuống</span></a></p>
			</i>
			<hr>
			<form action="{{ url('/send-mail/add') }}" method="POST" role="form" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="form-group">
				    <div class="form-line">
				        <input class="form-control" type="text" name="name" placeholder="Tên bản ghi" required>
				    </div>
				</div>
				<div class="form-group">
				    <div class="form-line">
				    	<textarea rows="4" class="form-control no-resize" name="description" placeholder="Mô tả"></textarea>
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
