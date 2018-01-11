@extends('layouts.app')

@section('content')
<div class="app-content content container-fluid">

        <div class="col-xl-10 col-lg-12">
            <div class="panel panel-default">
                <div align=center class="panel-heading"><h3>Registrar Empleado</h3></div>
                <div class="panel-body">

                    @if(empty($areas))
                        <h3 class="text-center">Usted debe crear los departamentos primero (Ejem Sistema, contabilidad, etc)</h3>
                        <div class="text-center">
                            <a href="{{ url('/area/create') }}" class="btn btn-success">
                                Crear nueva Area
                            </a>
                        </div>
                    @else

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            {!! Form::open(['route'=> 'worker.upload', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}

                            <div class="dropzone-previews" style="text-align: center"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/worker/store') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Numero Teléfono:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Teléfono" name="cellphone" value="{{ old('cellphone') }}">

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
                                    <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}">

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
                                    <input type="text" class="form-control" placeholder="Fecha de inicio" id="date-in" name="date_in" value="{{ old('date_in') }}">

                                    @if ($errors->has('date_in'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_in') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Departamento:</label>

                                <div class="col-md-6">
                                    {!! Form::select('area_id',['' => 'Seleccione un departamento...']+$areas,null, array('class' => 'form-control')) !!}

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
                                    <input type="text" class="form-control" placeholder="Puesto en la empresa" name="position" value="{{ old('position') }}">

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
                                        Registrar Nuevo Empleado
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
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