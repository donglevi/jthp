//viewpass from
$('.show-pass').on('click', function () {
    event.preventDefault();
    $parents = $(this).closest('div');
    $(this).find('i').toggleClass('fa-eye-slash').toggleClass('fa-eye');
    $parents.toggleClass('viewpass').toggleClass('');

    if($parents.hasClass('viewpass')){
        $parents.find('.form-control').attr('type', 'text');
    }else{
        $parents.find('.form-control').attr('type', 'password');
    }
});
$('.alert .close').on('click', function (){ 
    $(this).closest('.alert').addClass('d-none');
});
$(document).ready(function() {
    setTimeout(function(){
        $('.alert').fadeOut("slow");
    }, 7000);
});