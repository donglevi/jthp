@extends('master')
@section('title','Thêm cột bảng lương')
@section('content')

<div id="content" class="content">
	<div class="card">
		<div class="card-header">
            <h2><i class="material-icons">note_add</i>Thêm cột bảng lương</h2>
		</div>
		<div class="body">
			<form action="" method="POST" accept-charset="utf-8">
				<div class="form-group m-b-30">
					<button class="btn btn-primary waves-effect" type="submit">Hoàn tất</button>
				</div>
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group form-float" style="height: 65px;">
						    <div class="form-line">
						        <input type="text" name="month" class="form-control" placeholder="" value="{{old('month')}}">
						        <label class="form-label">Tháng (Tháng/Năm)</label>
						    </div>
	                        @if($errors->has('month'))
	                            <em style="color:red">{{$errors->first('month')}}</em>
	                        @endif
						</div>
					</div>
					<div class="col-md-6 col-xs-6">
						<div class="form-group form-float" style="height: 65px;">
							<div class="form-line">
								<input type="text" name="id_nv" class="form-control" placeholder="" value="{{old('id_nv')}}">
								<label class="form-label">Mã nv (6 Chữ số)</label>
							</div>
							@if($errors->has('id_nv'))
							<em style="color:red">{{$errors->first('id_nv')}}</em>
							@endif
						</div>
					</div>
					@for ($i = 1; $i < 80; $i++)
					@php if($i < 10){$j = 'c0'.$i;}else{$j = 'c'.$i;} @endphp
					<div class="col-md-4 col-xs-6">
						<div class="form-group form-float" style="height: 65px;">
							<div class="form-line">
								<input type="text" name="{{ $j }}" class="form-control" placeholder="" value="{{old($j)}}">
								<label class="form-label">@isset ($salarycol[$j]){{ $salarycol[$j] }} @else {!! $j !!} @endisset</label>
							</div>
							@if($errors->has($j))
							<em style="color:red">{{$errors->first($j)}}</em>
							@endif
						</div>
					</div>
					@endfor
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

