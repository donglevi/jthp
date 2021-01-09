$(document).ready(function() {
    // modal
    setTimeout(function(){
    $('.modal').addClass('in');
    $('.modal-backdrop').addClass('in');
    }, 300);
    $("[data-dismiss=modal]").click(function(){
    $('.modal').removeClass('in').addClass('out');
    $('.modal-backdrop').removeClass('in').addClass('out');
    setTimeout(function(){
    $('.modal').removeClass('out').addClass('hide');
    $('.modal-backdrop').removeClass('out').addClass('hide');
    }, 300);
    });

    $('#tickAll').on('click', function() {
        $obj = $(this); 
        if ($obj.is(':checked')) {
             $obj.parents('.dataTables_wrapper').find('tbody').find('input[name="selData"]').prop('checked', !0) 
        } else {
            $obj.parents('.dataTables_wrapper').find('tbody').find('input[name="selData"]').removeAttr('checked') 
        }
    });
    $('table.table tr').on('click', function() {
        $('table.table tr').removeClass('select');
        $(this).addClass('select');
    });
    // alert setTimeout
    setTimeout(function() {
        $('.alert').removeClass('fadeInDown').addClass('fadeOutDown');
    }, 8000); // <-- time in milliseconds .fadeOut('slow')

    $('.close').click(function(){
        $(this).addClass('pick-on');
    });
    // active menu
    target = $('.menu a[href="'+location.href+'"]');
    target.addClass('active');
    target.parents('.menu li').addClass('active');

    //viewpass from
    $('.show-pass').on('click', function () {
        event.preventDefault();
        $parents = $(this).closest('div');
        $parents.toggleClass('viewpass').toggleClass('');
        if($parents.hasClass('viewpass')){
            $parents.find('.form-control').attr('type', 'text');
            $(this).find('i').text('visibility_off');
        }else{
            $parents.find('.form-control').attr('type', 'password');
            $(this).find('i').text('visibility');
        }
    });

    // pick clock
    var $body = $('body');
    $('.pick').on('click', function () {
        $body.toggleClass('pick-on');
        if($($body).hasClass('pick-on')){
            localStorage.setItem('pick', 1);
        }else{
            localStorage.setItem('pick', 0);
        }
    });
    if (localStorage.getItem('pick') == 1) {
        jQuery($body).addClass('pick-on');
    }




});



// $(document).ready(function() {
//     var height = $( window ).height();
//     $('#content').css('height', height-170);
// });


$(function () {
    $('.sweetalert').on('click', function (e) {
        var type = $(this).data('type');
        if (type === 'confirm') {
            e.preventDefault();
            var linkURL = $(this).data('url');
            showConfirmMessage(linkURL);
        }else if (type === 'delSelected') {
            e.preventDefault();
            $arr = [];
            $('.dataTables_wrapper').find('tbody').find('input[name="selData"]').each(function() { $inpObj = $(this); if ($inpObj.is(':checked')) { $arr.push($inpObj.val()) } });
            linkURL = '?delete='+$arr.join('-');
            if($arr.length > 0) {
                showConfirmMessage(linkURL);
            }
        }else if (type === 'with-title') {
            showWithTitleMessage();
        }
        else if (type === 'success') {
            showSuccessMessage();
        }else if (type === 'basic') {
            showBasicMessage();
        }
        else if (type === 'cancel') {
            showCancelMessage();
        }
        else if (type === 'with-custom-icon') {
            showWithCustomIconMessage();
        }
        else if (type === 'html-message') {
            showHtmlMessage();
        }
        else if (type === 'autoclose-timer') {
            showAutoCloseTimerMessage();
        }
        else if (type === 'prompt') {
            showPromptMessage();
        }
        else if (type === 'ajax-loader') {
            showAjaxLoaderMessage();
        }
    });
});
function showConfirm(linkURL) {
    showConfirmMessage(linkURL);
}
//These codes takes from http://t4t5.github.io/sweetalert/
function showConfirmMessage(linkURL) {
    swal({
        title: "Bạn có muốn xóa ?",
        text: "Dữ liệu bị xóa không thể phục hồi. Bạn có chắc chắn ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function() {
      window.location.href = linkURL;// Redirect
    });
}
