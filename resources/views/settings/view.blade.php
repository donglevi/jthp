@extends('master')
@section('title','Cài đặt Website')
@section('icon','settings_applications')
@section('content')
<div id="main-body" class="main-body">

	@foreach ($settings as $key => $data )
		@php
		$name = $data->settings_name;
		$value = $data->settings_value;
		if($name == 'webname'){ $webname = $value;
		}elseif($name == 'webdescription'){ $webdescription = $value;
		}elseif($name == 'admin_email'){ $admin_email = $value;
		}elseif($name == 'logo'){ $logo = $value;
		}elseif($name == 'favicon'){ $favicon = $value;
		}elseif($name == 'send_email'){ $send_email = $value;
		}elseif($name == 'send_email_name'){ $send_email_name = $value;
		}elseif($name == 'send_email_smtp'){ $send_email_smtp = $value;
		}elseif($name == 'send_email_port'){ $send_email_port = $value;
		}elseif($name == 'send_email_pass'){ $send_email_pass = $value;
		}
		@endphp
	@endforeach
	<form action="{{ URL('/settings') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<p></p>
				<div class="form-group form-float">
					<div class="form-line">
						<input name="webname" type="text" class="form-control" value="{{$webname}}">
						<label class="form-label">Tên Website</label>
					</div>
				</div>
				<div class="form-group form-float">
					<div class="form-line">
						<input name="webdescription" type="text" class="form-control" value="{{$webdescription}}">
						<label class="form-label">Khẩu hiệu</label>
					</div>
				</div>
				<div class="form-group form-float">
					<div class="form-line">
						<input name="admin_email" type="text" class="form-control" value="{{$admin_email}}">
						<label class="form-label">Email quản trị</label>
					</div>
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						<label class="form-label">Logo</label>
					</span>
					<div class="form-line">
						@if($logo == null)
						<input type="file" name="logo" class="form-control" accept=".png, .jpg, .jpeg">
						@else
							<img class="img-thumbnail" src="{{ url($logo) }}" alt="">
						<input type="file" name="logo" class="form-control" accept=".png, .jpg, .jpeg">
						@endif
					</div>
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						<label class="form-label">Favicon</label>
					</span>
					<div class="form-line">
						@if($favicon == null)
						<input type="file" name="favicon" class="form-control" accept=".png, .jpg, .jpeg">
						@else
							<img class="img-thumbnail" src="{{ url($favicon) }}" alt="">
						<input type="file" name="logo" class="form-control" accept=".ico, .png, .jpg, .jpeg">
						@endif
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<p></p>
				<div class="form-group form-float">
					<div class="form-line">
						<input name="send_email" type="text" class="form-control" value="{{$send_email}}">
						<label class="form-label">Địa chỉ email gửi</label>
					</div>
				</div>
				<div class="form-group form-float">
					<div class="form-line">
						<input name="send_email_name" type="text" class="form-control" value="{{$send_email_name}}">
						<label class="form-label">Tên email gửi</label>
					</div>
				</div>
				<div class="form-group form-float">
					<div class="form-line">
						<input name="send_email_smtp" type="text" class="form-control" value="{{$send_email_smtp}}">
						<label class="form-label">Máy chủ SMTP</label>
					</div>
				</div>
				<div class="form-group form-float">
					<div class="form-line">
						<input name="send_email_port" type="text" class="form-control" value="{{$send_email_port}}">
						<label class="form-label">Cổng SMTP</label>
					</div>
				</div>
				<div class="form-group form-float">
					<div class="form-line">
						<input name="send_email_pass" type="password" class="form-control" value="{{$send_email_pass}}">
						<label class="form-label">Mật khẩu SMTP</label>
					</div>
				</div>
			</div>
		</div>
		<hr>
		{!! csrf_field() !!}
		<button id="btn-save" class="btn btn-primary waves-effect" type="submit" title="Hoàn tất">Hoàn tất</button>
	</form>
</div>
@endsection('content')