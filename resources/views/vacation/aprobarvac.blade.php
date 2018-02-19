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
          <!--<h3 class="content-header-title mb-0">AutoFill Datatable</h3>-->
          <p class="text-muted mb-0">Listado de trabajadores que solicitan vacaciones.</p>
        </div>
        <div class="content-header-right col-md-6 col-xs-12">
          <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right">
           <a href="" class="btn btn-outline-primary"><i class="icon-cross2"></i></a>
           <a href="" class="btn btn-outline-primary"><i class="icon-bar-graph-2"></i></a>
          </div>
        </div>
        </div>
        <div class="content-body">
          <section id="scrolling">
            <div class="row">
              <div class="col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <!--<h4 class="card-title">Scrolling DataTable</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>-->
                    <div class="heading-elements">
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
                    @if($vacations)
                    <form action="{{url('vacation/update')}}" method="POST" role="form">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <legend>Solicitudes Pendientes</legend>
                        
                        <table class="table table-striped table-bordered scrolling-dataTable">
                            <thead>
                              <tr>
                               <th>Nombre</th>
                               <th>Tipo</th>
                               <th>Fecha inicio</th>
                               <th>Fecha fin</th>
                               <th>Observaciones</th>
                               <th>Aprobar</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                            @foreach ($vacations as $vacation)
                            <tr>
                              <td>{{ $vacation->name }}</td>
                              <td>{{ $vacation->type }}</td>
                              <td>{{ $vacation->date_from }}</td>
                              <td>{{ $vacation->date_to }}</td>
                              <td>{{ $vacation->observations }}</td>
                                         
                                <td>
                                  <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right">
                                    <input type="hidden" name="id" id="inputId" class="form-control" value="{{$vacation->id}}">
                                    <button type="submit" class= "btn btn-primary"><i class="icon-bar-graph-2"></i></button>
                                    <a href="{{url('/vacation/deny')}}" class="btn btn-outline-primary"><i class="icon-cross2"></i></a>
                                  </div>                         
                                </td>
                             </tr>   
                           @endforeach
                           </tbody>
                        </table>
                    </form>
                    @else
                    <h2 class="text-center">No hay solicitudes pendientes</h2>
                    @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>

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
<!--<script src="{{ URL::asset('js/core/app-menu.js" type="text/javascript')}}"></script>
<script src="{{ URL::asset('js/core/app.js" type="text/javascript')}}"></script>-->
<script src="{{ URL::asset('js/scripts/ui/fullscreenSearch.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/scripts/tables/datatables-extensions/datatable-autofill.js')}}" type="text/javascript"></script>
@stop