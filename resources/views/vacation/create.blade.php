@extends('layouts.app')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <!--Include Required Prerequisites -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
     
     Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
</head>
@section('content')
    <div class="app-content content container-fluid">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div align="center" class="panel-heading"><h3>Registrar vacacion a {{$name_worker}}</h3></div>
                    <div class="panel-body">
                         @include('errors.flash-message')
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/vacation/store') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Tipo:</label>

                                <div class="col-md-6">
                                    {!! Form::select('type',['' => 'Seleccione un tipo...','vacacion' => 'Vacacion','falta' => 'Falta','permiso' => 'Permiso'],null, array('class' => 'form-control')) !!}

                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>          
                            <div class="form-group{{ $errors->has('observations') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Observaciones:</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="observations" rows="5" id="observations"
                                              value="{{ old('observations') }}" required></textarea>
                                    @if ($errors->has('observations'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('observations') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
<!--DATE-PICKER-->
                            <input type="hidden" name="worker_id" value="{{$id_worker}}"/>
                             <div class="col-sm-12 mb-1">
                             <label >Fecha Solicitada:</label></div>
                            <div class="form-group{{ $errors->has('date_init') ? ' has-error' : '' }}">

                                <label class="col-md-4 control-label">Desde... Hasta...</label>
                                <div class="col-md-6">  
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                        @if ($errors->has('date'))
                                            <strong>{{ $errors->first('date') }}</strong>
                                        @endif                                    
                                        <input type="form" id= datefilter name="datefilter" value="" />
<!--   DATE-PICKER  -->                   
<script>
$(function() {
  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });
  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
  });
  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });
});
</script>
<!-- FIN DATE-PICKER -->
                                    </div>        
                                </div>
                            </div>
                            <div class="col-md-2 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Registrar Vacacion
                                                </button>

                                            </div>  

                        </form>

                    </div>
                </div>
            </div>
             
        </div>
    </div>

@stop
@section('javascript')
  
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ URL::asset('vendors/js/extensions/moment.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/scripts/pickers/dateTime/picker-date-time.js')}}" type="text/javascript">
</script>-->
<!--<script src="{{ URL::asset('js/scripts/ui/jquery-ui/date-pickers.js')}}" type="text/javascript"></script>

<script>
    $('#datepicker1').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>
<script>
    $('#datepicker2').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>-->

<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS
-->
@stop