@extends('master')
@section('title','Thêm - Tiêu đề cột')
@section('content')

<div id="content" class="content">
	<ol class="breadcrumb">
		<li>
			<a href="javascript:void(0);">
				<i class="material-icons">home</i> Home
			</a>
		</li>
		<li>
			<i class="material-icons">extension</i> Bảng lương
		</li>
		<li class="active">
			<i class="material-icons">view_list</i> Tiêu đề cột
		</li>
		<li>
			<i class="material-icons">note_add</i> Thêm
		</li>
	</ol>
	<div class="card">
		<div class="card-header">
            <h2><i class="material-icons">note_add</i> Thêm</h2>
		</div>
		<div class="body">
			<form action="" method="POST" accept-charset="utf-8">
				<div class="row">
					<div class="col-md-5 col-xs-12">
						<div class="form-group form-float" style="height: 65px;">
							<label class="form-label">Thứ tự cột</label>
						    <div class="form-line ">
						        <input type="text" name="work_col" class="form-control" placeholder="" value="{{old('work_col')}}">
						    </div>
	                        @if($errors->has('work_value'))
	                            <em style="color:red">{{$errors->first('work_value')}}</em>
	                        @endif
						</div>
					</div>
					<div class="col-md-5 col-xs-12">
						<div class="form-group form-float" style="height: 65px;">
							<label class="form-label">Giá trị</label>
						    <div class="form-line ">
						        <input type="text" name="work_value" class="form-control" placeholder="" value="{{old('work_value')}}">
						    </div>
	                        @if($errors->has('work_value'))
	                            <em style="color:red">{{$errors->first('work_value')}}</em>
	                        @endif
						</div>
					</div>
				</div>
				{!! csrf_field() !!}
				<div class="form-group m-t-15">
					<button class="btn btn-primary waves-effect" type="submit">Hoàn tất</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')

