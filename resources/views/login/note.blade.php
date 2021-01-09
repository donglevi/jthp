@if(Session::has('errors'))
<div class="animated alert alert-error fadeInDown"><button type="button" class="close" role="button">×</button><i class="fa fa-close"></i><div class="message">
@foreach($errors->all() as $k => $error)
<span class="d-block">{{ $error }}</span>
@endforeach
</div></div>
@endisset


@if(Session::has('error'))
<div class="animated alert alert-error fadeInDown"><button type="button" class="close" role="button">×</button><i class="fa fa-close"></i><div class="message">{{ Session::get('error') }}</div></div>
@endif

@if(Session::has('warning'))
<div class="animated alert alert-warning fadeInDown"><button type="button" class="close" role="button">×</button><i class="fa fa-info"></i><div class="message">{{ Session::get('warning') }}</div></div>
@endif

@if(Session::has('success'))
<div class="animated alert alert-success fadeInDown"><button type="button" class="close" role="button">×</button><i class="fa fa-check"></i><div class="message">{{ Session::get('success') }}</div></div>
@endif