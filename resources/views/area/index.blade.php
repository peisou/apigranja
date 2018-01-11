@extends('layouts.app')

@section('content')
    <div class="app-content content container-fluid">

        <div align=center class="col-xl-10 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Areas</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($areas as $area)
                        <tr>
                            <th scope="row">{{$area->id}}</th>
                            <td>{{$area->name}}</td>
                            <td>{{$area->description}}</td>
                            <td>
                                <!-- Single button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Editar area {{$area->name}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('javascript')
<!-- BEGIN VENDOR JS-->
<script src="{{ URL::asset('js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/ui/jquery-sliding-menu.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/sliders/slick/slick.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ URL::asset('vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/extensions/moment.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/extensions/underscore-min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/extensions/clndr.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/charts/echarts/chart/pie.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/charts/echarts/chart/funnel.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/charts/echarts/chart/line.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/charts/echarts/chart/bar.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>

<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="{{ URL::asset('js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/core/app.js')}}" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ URL::asset('js/scripts/pages/dashboard-ecommerce.js')}}" type="text/javascript"></script>