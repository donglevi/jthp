@extends('master')
@section('title','Sửa cột bảng lương')
@section('content')

<div id="content" class="content">
	<div class="card">
		<div class="card-header">
            <h2><i class="material-icons">note_add</i>Sửa cột bảng lương</h2>
		</div>
		<div class="body">
			<form action="" method="POST" accept-charset="utf-8">
				<input type="text" name="id_nv" class="hidden" placeholder="" value="{{ $salary->id_nv }}">
				<input type="text" name="month" class="hidden" placeholder="" value="{{ $salary->month }}">
				<div class="form-group m-b-30">
					<button class="btn btn-primary waves-effect" type="submit">Hoàn tất</button>
				</div>
				<div class="row">
					<div class="col-xs-12 m-b-30">
						<label class="form-label">Mã NV: {{ $salary->id_nv }} </label> - 
						<label class="form-label">Tháng: {{ $salary->month }} </label>
					</div>


					@for ($i = 1; $i < 80; $i++)
					@php if($i < 10){$j = 'c0'.$i;}else{$j = 'c'.$i;} @endphp
					<div class="col-md-4 col-xs-6">
						<div class="form-group form-float" style="height: 65px;">
							<div class="form-line">
								<input type="text" name="{{ $j }}" class="form-control" placeholder="" value="@isset ($salary->$j){{ $salary->$j }}@endisset">
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

