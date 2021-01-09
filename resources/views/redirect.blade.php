@if(Session::has('redirect'))
<meta http-equiv="refresh" content="3; url={{Session::get('redirect')}}" />
@endif