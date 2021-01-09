@isset ($errors)
@foreach($errors->all() as $k => $error)
<div class="animated fadeInDown alert alert-danger {{ 'cound-'.$k }}" role="alert"><i class="material-icons">error_outline</i>{{$error}}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
@endforeach
@endisset



@if(Session::has('error'))
<div class="animated fadeInDown alert alert-danger" role="alert"><i class="material-icons">error_outline</i>{{Session::get('error')}}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
@endif

@if(Session::has('info'))
<div class="animated fadeInDown alert alert-success" role="alert"><i class="material-icons">info_outline</i>{{Session::get('info')}}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
@endif

@if(Session::has('success'))
<div class="animated fadeInDown alert alert-success" role="alert"><i class="material-icons">done</i>{{Session::get('success')}}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
@endif