@extends('master')
@section('title','Tiêu đề cột')
@section('icon','view_list')
@section('content')


<div id="main-body" class="main-body">
    <button type="submit" id="create-new-user"  class="btn btn-primary waves-effect" title="Tạo mới">
        <i class="material-icons">note_add</i><span class="icon-name"> Thêm</span>
    </button>

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
            <th>Thứ tự cột</th>
            <th>Giá trị</th>
            <th>Cập nhật lúc</th>
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
                <form id="SalaryColForm" name="SalaryColForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">Thứ tự cột</span>
                                <div class="form-line">
                                    <input type="text" class="form-control" id="salary_col" placeholder="" name="salary_col" value="" required="required" autofocus="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">Giá trị</span>
                                <div class="form-line">
                                    <input type="text" class="form-control" id="salary_value" placeholder="" name="salary_value" value="" required="required" autofocus="">
                                </div>
                            </div>
                        </div>
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
       //serverSide: true,
       ajax: {
            url: "{{ route('salarycol') }}",
            type: 'GET',
       },
       columns: [
                { data: 'id', name: 'id', 'visible': false},
                { data: 'checkbox', name: 'checkbox', orderable: false,searchable: false},
                { data: 'salary_col', name: 'salary_col' },
                { data: 'salary_value', name: 'salary_value' },
                { data: 'updated_at', name: 'updated_at' },
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
    }, 200000 );
    function Message($text = '',$class = 'alert-danger',$icon = 'error_outline'){
        $Message = '<div class="animated fadeInDown alert '+$class+'" role="alert"><i class="material-icons">'+$icon+'</i>'+$text+'<button type="button" class="close" aria-hidden="true">×</button></div>';
        $('.alert').removeClass('fadeInDown').addClass('fadeOutDown');
        $('body').append($Message);
    };
    /*  Thêm Salary */
    $('#create-new-user').click(function () {
        $('#id').val('');
        $('#SalaryColForm').trigger("reset");
        $('#userCrudModal').html($(this).attr('title'));
        $('#info').empty();//xóa HTML
        $('#ajax-crud-modal').modal('show');
    });

    /* When click edit  */
    $('body').on('click', '.action-edit', function () {
        var id = $(this).data('id');
        $('#SalaryColForm').trigger("reset"); // làm sạch form
        $.get('col/' + id +'/edit', function (data) {
            $('#id').val(data.id);
            $('#userCrudModal').html("Sửa");
            $('#salary_col').val(data.salary_col);
            $('#salary_value').val(data.salary_value);
            $('#ajax-crud-modal').modal('show'); // Hiện modal
        })
    });

    // delete 
    $('body').on('click', '.action-delete', function () {
        var id = $(this).data("id");
        var $confirm = confirm("Bạn có chắc chắn xóa !");
        if($confirm == true){
            $.ajax({
                type: "DELETE",
                url: "{{ route('salarycol') }}/"+id+"/delete",
                dataType: 'json',
                success: function (data) {
                    if(data['error'] == 1){
                        $class = 'alert-danger';
                        $icon = 'error_outline';
                    }else{
                        $class = 'alert-success';
                        $icon = 'done';
                        DATATable.ajax.reload(); // làm mới DATATable
                        //$('#SalaryColForm').trigger("reset"); // làm sạch form
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

    if ($("#SalaryColForm").length > 0) {
        $("#SalaryColForm").validate({
            submitHandler: function(form) {
                //$('#btn-save').html('Sending ..');
                $.ajax({
                    data: $('#SalaryColForm').serialize(),
                    url: "{{ route('salarycol.addorupdate') }}",
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
                            $('#SalaryColForm').trigger("reset"); // làm sạch form
                            $('#ajax-crud-modal').modal('hide'); // ẩn form
                        }
                        Message(data['message'],$class,$icon);
                        //$('#btn-save').html("Thành công");
                        //var oTable = $('#DataTable').dataTable();
                        //oTable.fnDraw(false);
                    },
                    error: function (data) {
                        Message('Lỗi xảy ra');
                        console.log('Error:', data);

                    }
                });
            }
        })
    }
});
</script>



@endsection('content')



