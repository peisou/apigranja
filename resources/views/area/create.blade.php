@extends('layouts.app')

@section('content')

<div class="app-content content container-fluid">
    <div class="col-xl-2 col-lg-12"></div>
        <div class="col-xl-7 col-lg-10">
            <div class="panel panel-default">
                <div  ALIGN=center class="panel-heading">CREAR DEPARTAMENTO</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/area/store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Area:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Descripcion:</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" rows="5" id="description" value="{{ old('description') }}"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear Area
                                </button>
                            </div>
                        </div>
                    </form>
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