@extends('master')

@section('title','Quản lý tiêu đề cột')

@section('content')



<div id="content" class="content">

	<div class="card">

		<div class="card-header">

            <h2><i class="material-icons">view_list</i> Tiêu đề cột</h2>

		</div>

		<div class="body">

			<a href="{{ url('/') }}/work/col/add"  class="btn btn-primary waves-effect" title="Thêm người dùng">

				<i class="material-icons">note_add</i><span class="icon-name"> Thêm</span>

			</a>

			<hr>

			<div id="demo_info" class="box"></div>

			<table id="DataTable" class="table table-striped table-bordered nowrap" style="width:100%"></table>
            <a class="sweetalert" href="javascript:;" data-type="delSelected" title="Xóa lựa chọn"><i class="col-red delete material-icons">delete</i></a>
		</div>

	</div>

</div>

<script type="text/javascript">

	var dataSet =[

	@foreach($work_col as $k => $work)["<input class=\"filled-in\" id=\"tick{{ $work->id }}\" type=\"checkbox\" name=\"selData\" value=\"{{ $work->id }}\"><label for=\"tick{{ $work->id }}\"></label>","{{ $work->work_col }}","{{ $work->work_value}}","{{ $work->updated_at }}","<a href=\"col/edit/{{ $work->id }}\" title=\"Sửa\"><i class=\"col-cyan material-icons edit\">mode_edit</i></a><a href=\"javascript:;\" title=\"Xóa\" onclick=\"showConfirm('?delete={{ $work->id }}')\"><i class=\"col-red delete material-icons\">delete</i></a>"],@endforeach

    ];

    if($('#DataTable').length){

        var table = $('#DataTable').DataTable({
        "order": [[ 1, "asc" ]],data: dataSet,columns: [{"orderable":false,title: '<input class=\"filled-in\" id=\"tickAll\" type=\"checkbox\"  title=\"ALL\"><label for="tickAll"></label>'},{ title: "Thứ tự cột" },{ title: "Giá trị" },{ title: "Thay đổi lúc" },{ "orderable":false,title: "Thao tác" }],
        dom: 'lfBrtip',
        buttons: ['copy', 'excel', 'pdf', 'print'],
        "language": {"search": "_INPUT_","searchPlaceholder": "Tìm kiếm",
        "paginate": {"next": 'Sau',"previous": 'Trước',"first": '<i class="fa fa-angle-double-left"></i>',"last": '<i class="fa fa-angle-double-right"></i>'}},
        "iDisplayLength": 10,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
})
}
</script>



@endsection('content')



