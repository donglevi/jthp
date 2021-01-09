@extends('master')
@section('title','Send email - EMAIL MAKETTING')
@section('content')

<div class="content">
	<div class="card">
		<div class="card-header">
			<h2>GỬI MAIL TỰ ĐỘNG</h2>
			<i class="small"></i>
		</div>
		<div class="body">
			<a href="{{ url('/send-mail/add') }}"  class="btn btn-primary waves-effect">
				<i class="material-icons">note_add</i><span class="icon-name">Thêm</span>
			</a>
			<hr>
			<div id="demo_info" class="box"></div>
			<table id="DataTableProject" class="table table-striped table-bordered nowrap" style="width:100%"></table>
		</div>
	</div>
</div>
<script type="text/javascript">
	var dataSet =[
	@foreach($project as $k => $column)
	    ["{{ $k+1 }}","{{ $column->name}}","{{ $column->description }}","@if ($column->status == 0) {{'Chưa gửi'}}@else{{'Đã gửi'}}@endif","{{ $column->date }}","<a href='send-mail/edit/{{ $column->id }}' title='Xem'><i class='col-cyan material-icons edit'>open_in_new</i></a>@if ($column->status == 0) <a class='sweetalert' href='?delete={{ $column->id }}' title='Xóa' data-type='confirm'><i class='col-red delete material-icons'>delete</i></a> @endif"],
	@endforeach
    ];
</script>
@endsection('content')

