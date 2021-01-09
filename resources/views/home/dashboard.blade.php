@extends('master')
@section('title','Trang chủ')
@section('icon','home')
@section('content')
<div id="main-body" class="main-body">
	<div class="row clearfix">
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="info-box bg-pink hover-expand-effect hover-zoom-effect">
				<div class="icon">
					<i class="material-icons">person</i>
				</div>
				<div class="content">
					<div class="text">NGƯỜI DÙNG</div>
					<div class="number count-to" data-from="0" data-to="{{ $users_count }}" data-speed="15" data-fresh-interval="20">{{ $users_count }}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="info-box bg-cyan hover-expand-effect hover-zoom-effect">
				<div class="icon">
					<i class="material-icons">extension</i>
				</div>
				<div class="content">
					<div class="text">BẢNG LƯƠNG</div>
					<div class="number count-to" data-from="0" data-to="{{ $salary_count }}" data-speed="1000" data-fresh-interval="20">{{ $salary_count }}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="info-box bg-light-green hover-expand-effect hover-zoom-effect">
				<div class="icon">
					<i class="material-icons">widgets</i>
				</div>
				<div class="content">
					<div class="text">BẢNG CÔNG</div>
					<div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="info-box bg-orange hover-expand-effect hover-zoom-effect">
				<div class="icon">
					<i class="material-icons">person_add</i>
				</div>
				<div class="content">
					<div class="text">NEW VISITORS</div>
					<div class="number count-to" data-from="0" data-to="" data-speed="1000" data-fresh-interval="20"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection('content')