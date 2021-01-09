@extends('master')

@section('title','Quản lý bảng công')

@section('content')



<div id="content" class="content">

	<div class="card">

		<div class="card-header">

            <h2><i class="material-icons">widgets</i> Quản lý bảng công</h2>

		</div>

		<div class="body">

			<a href="{{ url('/') }}/work/col"  class="btn btn-primary waves-effect" title="Thêm người dùng">

				<i class="material-icons">view_list</i><span class="icon-name"> Chỉnh sửa tiêu đề cột</span>

			</a>

			<a href="{{ url('/') }}/work/add"  class="btn btn-primary waves-effect" title="Thêm người dùng">

				<i class="material-icons">note_add</i><span class="icon-name"> Thêm</span>

			</a>

			<a href="{{ url('/') }}/work/import"  class="btn btn-primary waves-effect" title="Thêm người dùng hàng loạt">

				<i class="material-icons">move_to_inbox</i><span class="icon-name"> Import Excel</span>

			</a>

			<hr>

			<div id="demo_info" class="box"></div>

			<table id="DataTable" class="table table-striped table-bordered nowrap" style="width:100%"></table>
			<a class="sweetalert" href="javascript:;" data-type="delSelected" title="Xóa lựa chọn"><i class="col-red delete material-icons">delete</i></a>
            <div class="small">(*) : Thử việc</div>

            <div class="small">(+) : Thu nhập miễn thuế</div>

                

            

		</div>

	</div>

</div>

<script type="text/javascript">
var dataSet =[
@foreach($works as $k => $work)
["<input class=\"filled-in\" id=\"tick{{ $work->id }}\" type=\"checkbox\" name=\"selData\" value=\"{{ $work->id }}\"><label for=\"tick{{ $work->id }}\"></label>","{{ $work->id_nv }}","<a href=\"work/edit/{{ $work->id }}\" title=\"Sửa\"><i class=\"col-cyan material-icons edit\">mode_edit</i></a><a href=\"javascript:;\" title=\"Xóa\" onclick=\"showConfirm('?delete={{ $work->id }}')\"><i class=\"col-red delete material-icons\">delete</i></a>","{{ $work->month }}",@for ($i = 1; $i < 81; $i++)@php if($i < 10){$j = 'c0'.$i;}else{$j = 'c'.$i;} @endphp"@if (is_numeric($work->$j)){{ number_format($work->$j) }}@elseif($work->$j == ''){!! 0 !!}@else{{ $work->$j }}@endif",@endfor],
@endforeach];

if($('#DataTable').length){

var table = $('#DataTable').DataTable({
"order": [[ 1, "asc" ]],
"scrollX": true,
data: dataSet,
columns: [{"orderable":false,title: '<input class=\"filled-in\" id=\"tickAll\" type=\"checkbox\"  title=\"ALL\"><label for="tickAll"></label>',},{ title: "Mã nv" },{ "orderable":false,title: "Thao tác" },{ title: "Tháng" },@for ($i = 1; $i < 81; $i++)@php if($i < 10){$j = 'c0'.$i;}else{$j = 'c'.$i;} @endphp{ title:"@isset ($workcol[$j]){{ $workcol[$j] }}@else {!! $j !!} @endisset" },@endfor],
dom: 'lfBrtip',
buttons: ['copy', 'excel', 'pdf', 'print'],
"language": {"search": "_INPUT_","searchPlaceholder": "Tìm kiếm",
"paginate": {"next": 'Sau',"previous": 'Trước',"first": '<i class="fa fa-angle-double-left"></i>',"last": '<i class="fa fa-angle-double-right"></i>'}},
"iDisplayLength": 10,
"sPaginationType": "full_numbers",
"aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
});
}
</script>
@endsection('content')



