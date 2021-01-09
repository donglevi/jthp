@extends('master')

@section('title','Thư viện câu hỏi')

@section('content')



<div id="content" class="content">

	<div class="card">

		<div class="card-header">

            <h2><i class="material-icons">library_books</i>Thư viện câu hỏi</h2>

		</div>

		<div class="body">
			<a href="{{ url('/') }}/exam/question-library/add"  class="btn btn-primary waves-effect" title="Thêm người dùng">
				<i class="material-icons">note_add</i><span class="icon-name"> Thêm</span>
			</a>
			<a href="{{ url('/') }}/exam/question-library/import"  class="btn btn-primary waves-effect" title="Thêm người dùng hàng loạt">
				<i class="material-icons">move_to_inbox</i><span class="icon-name"> Import Excel</span>
			</a>
			<hr>
			<div id="demo_info" class="box"></div>

			<table id="DataTable" class="table table-striped table-bordered nowrap" style="width:100% !important"></table>
			<a class="sweetalert" href="javascript:;" data-type="delSelected" title="Xóa lựa chọn"><i class="col-red delete material-icons">delete</i></a>
            <div class="small">(*) : Thử việc</div>

            <div class="small">(+) : Thu nhập miễn thuế</div>

                

            

		</div>

	</div>

</div>

<script type="text/javascript">
var dataSet =[
@foreach($questionlibrary as $k => $question)
[
"<input class=\"filled-in\" id=\"tick{{ $question->id }}\" type=\"checkbox\" name=\"selData\" value=\"{{ $question->id }}\"><label for=\"tick{{ $question->id }}\"></label>",
"{{ $question->question }}",
"{{ $question->updated_at }}",
"<a href=\"question-library/edit/{{ $question->id }}\" title=\"Sửa\"><i class=\"col-cyan material-icons edit\">mode_edit</i></a><a href=\"javascript:;\" title=\"Xóa\" onclick=\"showConfirm('?delete={{ $question->id }}')\"><i class=\"col-red delete material-icons\">delete</i></a>",
],
@endforeach];

if($('#DataTable').length){

var table = $('#DataTable').DataTable({
"order": [[ 1, "asc" ]],
// "scrollX": true,
data: dataSet,
columns: [
{"orderable":false,title: '<input class=\"filled-in\" id=\"tickAll\" type=\"checkbox\"  title=\"ALL\"><label for="tickAll"></label>'},
{class:'one-line', title: "Câu hỏi" },
{ title: "Cập nhật lúc" },
{ "orderable":false,title: "Thao tác" }
],



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



