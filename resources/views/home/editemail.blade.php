@extends('master')
@section('title','Nhập bản dự liệu cần gửi - EMAIL MAKETTING')
@section('content')

<div id="content" class="content">
	<div class="card">
		<div class="card-header">
			<h2>Chỉnh sửa bản ghi</h2>
			<i class="small">Chỉnh sửa trước khi bắt đầu gửi Email tới khách hàng</i>
		</div>
		<div class="body">
			<h3>Bản ghi: {{ $name }}</h3>
			<div class="table">
				@if ($status == 0)
				<button type="button" class="btn btn-primary waves-effect">
					<i class="material-icons">playlist_add</i><span class="icon-name">Thêm</span>
				</button>
				@else
				<p>Bản ghi này đã được gửi tới khách hàng, không thể sửa, xóa !</p>
				@endif
				<hr>
				<div id="demo_info" class="box"></div>
				<table id="DataTable" class="table table-striped table-bordered nowrap" style="width:100%"></table>

			</div>
		</div>
		
	</div>

<script type="text/javascript">
	var dataSet =[
	@isset ($project_column)
	@foreach($project_column as $project)
	    ["{{ $project->customer_code}}","{{ $project->bank_code}}","{{ $project->customer_email}}","{{ $project->fullname}}","{{ $project->price}}","{{ $project->bank_name}}","{{ $project->content}}","{{ $project->file_name}}",
	    @if ($status == 0)
	    	"<a class='sweetalert' href='?delete={{ $project->id }}' title='Xóa' data-type='confirm'><i class='col-red delete material-icons'>delete</i></a>"
		@else
			null
		@endif
	    ],
	@endforeach
	@endisset
    ];
</script>
</div>

@endsection('content')
