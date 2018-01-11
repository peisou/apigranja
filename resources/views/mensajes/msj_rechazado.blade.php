@extends('layouts.app')
@section('content')

<br/>
<div class="app-content content container-fluid">
<div align= "center" class='rechazado'><label style='color:#FA206A'><h3><?php  echo $msj; ?></h3></label>  </div> 
</div>

@stop

@section('javascript')
<script src="{{ URL::asset('js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/extensions/moment.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
@stop