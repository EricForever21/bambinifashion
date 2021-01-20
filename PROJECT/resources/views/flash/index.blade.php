@if(Session::has('primary'))

<div class="alert alert-primary" role="alert">
{{Session::get('primary')}}
</div>
@endif

@if(Session::has('secondary'))
<div class="alert alert-secondary" role="alert">
{{Session::get('secondary')}}
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif


@if(Session::has('danger'))
<div class="alert alert-danger" role="alert">
{{Session::get('danger')}}
</div>
@endif


@if(Session::has('warning'))
<div class="alert alert-warning" role="alert">
{{Session::get('warning')}}
</div>
@endif


@if(Session::has('info'))
<div class="alert alert-info" role="alert">
{{Session::get('info')}}
</div>
@endif


@if(Session::has('light'))
<div class="alert alert-light" role="alert">
{{Session::get('light')}}
</div>
@endif


@if(Session::has('error'))
<div class="alert alert-dark" role="alert">
{{Session::get('error')}}
</div>
@endif