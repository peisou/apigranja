@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-2 col-lg-12"></div>
        <div class="col-xl-10 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Crear Empleado</h3></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                           
                            <div class="dropzone-previews" style="text-align: center"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/worker/update') }}">
                            {!! csrf_field() !!}
                            
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $worker->name }}">

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Numero Celular:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cellphone" value="{{ $worker->cellphone }}">

                                    @if ($errors->has('cellphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Email:</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ $worker->email }}">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date_in') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Fecha de Ingreso:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="date-in" name="date_in" value="{{ $worker->date_in }}">

                                    @if ($errors->has('date_in'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_in') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Area:</label>

                                <div class="col-md-6">
                                    {!! Form::select('area_id',['' => 'Seleccione un area...']+$areas,$worker->area_id, array('class' => 'form-control')) !!}

                                    @if ($errors->has('area_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Cargo:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="position" value="{{ $worker->position }}">

                                    @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar Datos de Empleado
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')

<script src="{{ URL::asset('js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/extensions/moment.min.js')}}" type="text/javascript"></script>

@stop