@extends('master')

@section('title','Kiểm tra online')

@section('content')



<div id="content" class="content">
<div class="card">
<div class="card-header"><h2><i class="material-icons">school</i> Kiểm tra online</h2></div>
<div class="body">
<a href="{{ url('/') }}/exam/question-library" class="btn btn-primary waves-effect" title="Thư viện câu hỏi"><i class="material-icons">view_list</i><span class="icon-name">Thư viện câu hỏi</span></a>
<button class="add btn btn-primary waves-effect" title="Thêm người dùng"><i class="material-icons">note_add</i><span class="icon-name"> Tạo đề kiểm tra</span></button>
<content id="data"></content>
</div>
</div>
</div>

<script type="text/javascript">
$('.add').on('click', function (e) {
    $.ajax({
    url: '/add/',
    success: function(data) {
        data=$(data);
        $('#data').html(data);
        alert('Done.');
     }
    });
});


</script>
@endsection('content')



