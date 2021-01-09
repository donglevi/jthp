@extends('master')
@section('title','Import Excel - Thư viện cầu hỏi')
@section('content')

<div id="content" class="content">
	<div class="card">
		<div class="card-header">
            <h2><i class="material-icons">move_to_inbox</i> Import Excel - Thư viện câu hỏi</h2>
            <small>Thêm thư viện câu hỏi hàng loạt</small>
            <p></p>
			<i class="small">
				<p>File nhập bắt buộc là file <span class="col-pink">EXCEL: .xlsx, .xls</span>, kiểm tra chính xác trước khi thêm.  File mẫu <a class="icon col-cyan" href="{{ url('/') }}/import/demo-questionlibrary.xlsx"><i class="material-icons">arrow_downward</i><span class="icon-name">Tải xuống</span></a></p>
			</i>
		</div>
		<div class="body">
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
	</div>
</div>

@endsection('content')

