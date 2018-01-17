@extends('layouts.app')

@section('content')

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a>
              </li>
              <li class="breadcrumb-item active">Tabla Empleados
              </li>
            </ol>
          </div>
          <div class="content-header-left col-md-6 col-xs-12">
            <h3 class="content-header-title mb-0">AutoFill Datatable</h3>
            <p class="text-muted mb-0">Listado de trabajadores, para ver los dias, y gestionar vacaciones.</p>
          </div>
          <div class="content-header-right col-md-6 col-xs-12">
            <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right">
              <!--<div role="group" class="btn-group">
                <button id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-outline-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3 icon-left"></i> Settings</button>
                <div aria-labelledby="btnGroupDrop1" class="dropdown-menu"><a href="card-bootstrap.html" class="dropdown-item">Bootstrap Cards</a><a href="component-buttons-extended.html" class="dropdown-item">Buttons Extended</a></div>
              </div>-->
              <a href="" class="btn btn-outline-primary"><i class="icon-cross2"></i></a>
              <a href="" class="btn btn-outline-primary"><i class="icon-bar-graph-2"></i></a>
            </div>
          </div>
          <div class="content-header-lead col-xs-12 mt-1">
            
          </div>
        </div>
        <div class="content-body">
            <!-- Scrolling table -->
            <section id="scrolling">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Scrolling DataTable</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                            @if($workers->isEmpty())
                                <h1 class="text-center">No existe trabajadores registrados</h1>
                            @else
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered scrolling-dataTable">
                            <thead>
                            <tr>

                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="success" style="text-align:center" colspan="3">Dias Vacaciones</th>
                                <th></th>
                            </tr>
                            <tr>

                                <th>Nombre</th>
                                <th>Departamento</th>
                                <th>Puesto</th>
                                <th class="success">Ganados</th>
                                <th class="success">Tomados</th>
                                <th class="success">Restantes</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($workers as $worker)
                                <tr>
                                    <!--<td scope="row">{{$worker->id}}</td>-->
                                    <td>{{$worker->name}}</td>
                                    <td>{{$worker->area->name}}</td>
                                    <td>{{$worker->position}}</td>
                                    <td class="success">{{$vacationDays=MyHelper::vacationDays($worker->date_in)}}</td>
                                    <td class="success">{{$vacationTaken=MyHelper::vacationTaken($worker->id)}}</td>
                                    <td class="success">{{$vacationDays-$vacationTaken}}</td>
                                    <td>
                                        <!-- Single button -->
                                        <div class="btn-group">
                                            <a href="{{ url('/vacation/creat/'.Crypt::encrypt($worker->id).'/'.Crypt::encrypt($worker->name)) }}" class="btn btn-outline-primary"><i class="icon-calendar5"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                       
                            <tfoot>
                                <tr>
                                <th>Nombre</th>
                                <th>Departamento</th>
                                <th>Puesto</th>
                                <th class="success">Ganados</th>
                                <th class="success">Tomados</th>
                                <th class="success">Restantes</th>
                                <th>Opciones</th>
                                </tr>
                            </tfoot>
                         </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Scrolling table -->

@stop
@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ URL::asset('vendors/js/extensions/moment.min.js')}}"></script>
<script src="{{ URL::asset('vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/tables/datatable/dataTables.autoFill.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/tables/datatable/dataTables.colReorder.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/tables/datatable/dataTables.fixedColumns.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/tables/datatable/dataTables.select.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/core/app-menu.js" type="text/javascript')}}"></script>
<script src="{{ URL::asset('js/core/app.js" type="text/javascript')}}"></script>
<script src="{{ URL::asset('js/scripts/ui/fullscreenSearch.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/scripts/tables/datatables-extensions/datatable-autofill.js')}}" type="text/javascript"></script>
@stop