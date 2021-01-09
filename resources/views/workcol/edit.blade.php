@extends('master')
@section('title','Bảng công')
@section('content')

<div id="content" class="content">
	<div class="card">
		<div class="card-header">
            <h2><i class="material-icons">person_outline</i>Bảng công</h2>
            <h3>Sửa người dùng</h3>
		</div>
		<div class="body">
			<form action="" method="POST" accept-charset="utf-8">
				<div class="row">
					<div class="col-md-5 col-xs-12">
						<div class="form-group form-float" style="height: 65px;">
							<label class="form-label">Thứ tự cột</label>
						    <div class="form-line ">
						        <input type="text" name="work_col" class="form-control" placeholder="" value="{{$data->work_col}}">
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
						        <input type="text" name="work_value" class="form-control" placeholder="" value="{{$data->work_value}}">
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

