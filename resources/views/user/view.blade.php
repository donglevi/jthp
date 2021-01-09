@extends('master')
@section('title','Quản lý người dùng')
@section('icon','person_outline')
@section('content')
<div id="main-body" class="main-body">
	<button type="submit" id="create-new-user"  class="btn btn-primary waves-effect" title="Thêm người dùng">
		<i class="material-icons">note_add</i><span class="icon-name"> Thêm</span>
	</button>
	<a href="{{ url('/') }}/user/import"  class="btn btn-primary waves-effect" title="Thêm người dùng hàng loạt">
		<i class="material-icons">move_to_inbox</i><span class="icon-name"> Import Excel</span>
	</a>
	<hr>
	<div id="demo_info" class="box"></div>
	<table id="DataTable" class="table table-striped table-bordered nowrap" style="width:100%">
      <thead>
         <tr>
            <th>ID</th>
            <th>
            	<input class="filled-in" id="tickAll" type="checkbox"  title="ALL">
            	<label for="tickAll"></label>
            </th>
            <th>Mã NV</th>
			 <th>Họ tên</th>
            <th>Email</th>
            <th>Quyền hạn</th>
            <th>Trạng thái</th>
            <th>Đã đổi MK</th>
            <th>Tạo lúc</th>
            <th>Action</th>
         </tr>
      </thead>
	</table>
	<a class="sweetalert" href="javascript:;" data-type="delSelected" title="Xóa lựa chọn"><i class="col-red delete material-icons">delete</i></a>
</div>
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="userCrudModal"></h4>
			</div>
			<div class="modal-body">
				<form id="userForm" name="userForm" class="form-horizontal">
					<input type="hidden" name="id" id="id">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon">Mã NV</span>
								<div class="form-line">
									<input type="number" class="form-control" id="id_nv" minlength="6" maxlength="6" placeholder="Mã nhân viên 6 chữ số" name="id_nv" value="" required="required" autofocus="">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon">Họ và Tên</span>
								<div class="form-line">
									<input type="text" class="form-control" id="name" placeholder="" name="name" value="" required="required" autofocus="">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon">Email</span>
								<div class="form-line">
									<input type="email" class="form-control" id="email" minlength="6" placeholder="" name="email" value="">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon">Quyền hạn</span>
								<div class="form-line level">
									<select id="level" class="form-control show-tick" name="level">
										<option value="">-- Please select --</option>
										<option value="1">Admin</option>
										<option value="0">User</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon">Trạng thái</span>
								<input name="status" type="checkbox" id="status" class="filled-in">
								<label class="m-b-0" for="status">Kích hoạt</label>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon">MK mặc định</span>
								<input name="pass" type="checkbox" id="pass" class="filled-in">
								<label class="m-b-0" for="pass">jnt123</label>
							</div>
						</div>
					</div>
					<div id="info">

					</div>
					<div class="form-group m-t-15 text-center">
						<button id="btn-save" class="btn btn-primary waves-effect" type="submit" title="Hoàn tất">Hoàn tất</button>
					</div>
				</form>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready( function () {
	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var DATATable = $('#DataTable').DataTable({
		//dom: 'lfBrtip',
		//buttons: ['copy', 'excel', 'pdf', 'print'],
	   //processing: true,
	   serverSide: true,
	   ajax: {
			url: "{{ route('user') }}",
			type: 'GET',
	   },
	   columns: [
	            { data: 'id', name: 'id', 'visible': false},
	            { data: 'checkbox', name: 'checkbox', orderable: false,searchable: false},
	            { data: 'id_nv', name: 'id_nv' },
	            { data: 'name', name: 'name' },
		   { data: 'email', name: 'email' },
	            { data: 'level', name: 'level' },
	            { data: 'status', name: 'status' },
	            { data: 'first_login', name: 'first_login' },
	            { data: 'created_at', name: 'created_at' },
	            { data: 'action', name: 'action', orderable: false},
	         ],
		order: [[2, 'asc']],
		scrollX: true,
		language: {"search": "_INPUT_","searchPlaceholder": "Tìm kiếm",
		paginate: {"next": 'Sau',"previous": 'Trước',"first": '<i class="material-icons">keyboard_arrow_left</i>',"last": '<i class="material-icons">keyboard_arrow_right</i>'}},
		iDisplayLength: 100,
		sPaginationType: "full_numbers",
		aLengthMenu: [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
	});

	// cứ 3p là tài lại bảng 1 lần
	setInterval( function () {
	    DATATable.ajax.reload();
	}, 20000 );
	function Message($text = '',$class = 'alert-danger',$icon = 'error_outline'){
		$Message = '<div class="animated fadeInDown alert '+$class+'" role="alert"><i class="material-icons">'+$icon+'</i>'+$text+'<button type="button" class="close" aria-hidden="true">×</button></div>';
		$('.alert').removeClass('fadeInDown').addClass('fadeOutDown');
		$('body').append($Message);
	};
	/*  Thêm user */
	$('#create-new-user').click(function () {
		$('#id').val('');
		$('#userForm').trigger("reset");
		$('#userCrudModal').html($(this).attr('title'));
		document.getElementById("level").value = 0; // đặt mặc định quyền user
		$('#status').prop('checked', !0);  // đặt mặc định trạng thái kích hoạt
		$('#pass').prop('checked', !0); // đặt mk mặc định jnt123
		$('#id_nv').prop("disabled", false); // mở sửa mã nv
		$('#info').empty();//xóa HTML
		$('#ajax-crud-modal').modal('show');
	});

	/* When click edit user */
	$('body').on('click', '.action-edit', function () {
		var id = $(this).data('id');
		$('#userForm').trigger("reset"); // làm sạch form
		$.get('user/' + id +'/edit', function (data) {
			$('#name-error').hide();
			$('#email-error').hide();
			$('#userCrudModal').html("Sửa người dùng");
			$('#id').val(data.id);
			$('#id_nv').val(data.id_nv);
			$('#id_nv').prop("disabled", true); // không cho sửa mã nv
			$('#name').val(data.name);
			$('#email').val(data.email);
			document.getElementById("level").value = data.level;
			if(data.status == 1){$('#status').prop('checked', !0);}
			$('#info').empty();//xóa HTML
			$('#info').append('<span>Cập nhật lúc: '+data.updated_at+'</span>');
			$('#info').append('<span>Đăng nhập lúc: '+data.login_at+'</span>');
			$('#info').append('<span>Ip Adress: '+data.ip_adress+'</span>');
			$('#ajax-crud-modal').modal('show'); // Hiện modal
		})
	});

	// delete user
	$('body').on('click', '.action-delete', function () {
		var id = $(this).data("id");
		var $confirm = confirm("Bạn có chắc chắn xóa !");
		if($confirm == true){
			$.ajax({
				type: "DELETE",
				url: "{{ route('user') }}/"+id+"/delete",
				dataType: 'json',
				success: function (data) {
					if(data['error'] == 1){
						$class = 'alert-danger';
						$icon = 'error_outline';
					}else{
						$class = 'alert-success';
						$icon = 'done';
						DATATable.ajax.reload(); // làm mới DATATable
						//$('#userForm').trigger("reset"); // làm sạch form
						//$('#ajax-crud-modal').modal('hide'); // ẩn form
					}
					Message(data['message'],$class,$icon);
					//$('body').append($message);
					//$('#btn-save').html("Thành công");
					//var oTable = $('#DataTable').dataTable();
					//oTable.fnDraw(false);
				},
				error: function (data) {
					Message();
				}
			});
		}
	}); 

	if ($("#userForm").length > 0) {
		$("#userForm").validate({
			submitHandler: function(form) {
				//$('#btn-save').html('Sending ..');
				$.ajax({
					data: $('#userForm').serialize(),
					url: "{{ route('user.addorupdate') }}",
					type: "PUT",
					dataType: 'json',
					success: function (data) {
						if(data['error'] == 1){
							$class = 'alert-danger';
							$icon = 'error_outline';
						}else{
							$class = 'alert-success';
							$icon = 'done';
							DATATable.ajax.reload(); // làm mới DATATable
							$('#userForm').trigger("reset"); // làm sạch form
							$('#ajax-crud-modal').modal('hide'); // ẩn form
						}
						Message(data['message'],$class,$icon);
						//$('#btn-save').html("Thành công");
						//var oTable = $('#DataTable').dataTable();
						//oTable.fnDraw(false);
					},
					error: function (data) {
						Message();
						//console.log('Error:', data);

					}
				});
			}
		})
	}
});
</script>



@endsection('content')



