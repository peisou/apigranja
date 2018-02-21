<?php session_start(); ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard Vacations</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('images/ico/apple-icon-60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('images/ico/apple-icon-76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('images/ico/apple-icon-120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('images/ico/apple-icon-152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('images/ico/favicon.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('images/ico/favicon-32.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css')}}">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendors/css/sliders/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendors/css/extensions/pace.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendors/css/weather-icons/climacons.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/colors.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/core/menu/menu-types/vertical-overlay-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/plugins/calendars/clndr.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <!-- END Custom CSS-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <!--FULLCALENDAR CSS Y JS-->
    
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
<!--==================================================
Header Section Start
================================================== -->
<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
                <li class="nav-item">
                    <a href="{{url('/home')}}" class="navbar-brand nav-link">
                        <img alt="branding logo" src="{{ URL::asset('images/logo/robust-logo-light.png')}}" data-expand="{{ URL::asset('images/logo/robust-logo-light.png')}}" data-collapse="{{ URL::asset('images/logo/robust-logo-small.png')}}" class="brand-logo"></a></li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
                    
                    <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
                    <li class="dropdown nav-item mega-dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link">Mega</a>
                        <ul class="mega-dropdown-menu dropdown-menu row">
                            <li class="col-md-6">
                                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="icon-mail6"></i> Contact Us</h6>
                                <form>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <label for="inputName1" class="col-sm-3 form-control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="inputName1" placeholder="{{ Auth::user()->name }}" class="form-control">
                                            <div class="form-control-position"><i class="icon-head"></i></div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <label for="inputEmail1" class="col-sm-3 form-control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" id="inputEmail1" placeholder="john@example.com" class="form-control">
                                            <div class="form-control-position"><i class="icon-mail6"></i></div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <label for="inputMessage1" class="col-sm-3 form-control-label">Message</label>
                                        <div class="col-sm-9">
                                            <textarea id="inputMessage1" rows="2" placeholder="Simple Textarea" class="form-control"></textarea>
                                            <div class="form-control-position"><i class="icon-file-text"></i></div>
                                        </div>
                                    </fieldset>
                                    <div class="col-sm-12 mb-1">
                                        <button type="button" class="btn btn-primary float-xs-right"><i class="icon-send-o"></i> Send</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- MENU HORIZONTAL SUPERIOR-->
                <ul class="nav navbar-nav float-xs-right">

                    <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-bell4"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up">5</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0">5 New</span></h6>
                            </li>
                            <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i class="icon-cart3 icon-bg-circle bg-cyan"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">You have new order!</h6>
                                            <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                                                <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">30 minutes ago</time></small>
                                        </div>
                                    </div></a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i class="icon-monitor3 icon-bg-circle bg-red bg-darken-1"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading red darken-1">99% Server load</h6>
                                            <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                                                <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Five hour ago</time></small>
                                        </div>
                                    </div></a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i class="icon-server2 icon-bg-circle bg-yellow bg-darken-3"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading yellow darken-3">Warning notification</h6>
                                            <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                                                <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                                        </div>
                                    </div></a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i class="icon-check2 icon-bg-circle bg-green bg-accent-3"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Complete the task</h6><small>
                                                <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last week</time></small>
                                        </div>
                                    </div></a><a href="javascript:void(0)" class="list-group-item">
                                    <div class="media">
                                        <div class="media-left valign-middle"><i class="icon-bar-graph-2 icon-bg-circle bg-teal"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Generate monthly report</h6><small>
                                                <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last month</time></small>
                                        </div>
                                    </div></a></li>
                            <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all notifications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-mail6"></i><span class="tag tag-pill tag-default tag-info tag-default tag-up">8</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span class="notification-tag tag tag-default tag-info float-xs-right m-0">4 New</span></h6>
                            </li>
                            <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                                   </li>
                            <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all messages</a></li>
                        </ul>
                    </li>
                    <!-- MENU USUARIO-->
                    <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{ URL::asset('images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i>
                                </i></span><span class="user-name">{{ Auth::user()->name }}</span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ url('/worker/show/.Crypt::encrypt(Auth::user()->id)') }}" class="dropdown-item">
                                <i class="icon-head"></i> Editar Perfil</a>
                            <a href="#" class="dropdown-item"><i class="icon-mail6"></i> Correo</a>
                            <a href="#" class="dropdown-item"><i class="icon-clipboard2"></i> Tareas</a>
                            <a href="{{url('/home')}}" class="dropdown-item"><i class="icon-calendar5"></i> Calender</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{url('/logout')}}" class="dropdown-item"><i class="icon-power3"></i>Salir</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- FIN MENU SUPERIOR HORIZONTAL-->
<!--main nav-->


<!--==================================================
Header Section ENDS
================================================== -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- MENU PRINCIPAL LATERAL-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            
            <li class=" nav-item"><a href="{{url('/home')}}"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Gestión Vacaciones</span></a>
                <ul class="menu-content">

                    <li class="active"><a href="" data-i18n="nav.dash.ecommerce" class="menu-item">Departamentos</a>
                        <ul class="menu-content">
                            <li><a href="{{url('/area/create')}}" data-i18n="nav.menu_levels.adddep" class="menu-item">Añadir Departamento</a>
                            </li>
                            <li><a href="{{url('/area')}}" data-i18n="nav.menu_levels.seedep" class="menu-item">Ver Departamentos</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li><a href="" data-i18n="nav.dash.workers" class="menu-item">Empleados</a>
                        <ul class="menu-content">
                            <li><a href="{{url('/worker/create')}}" data-i18n="nav.menu_levels.addworker" class="menu-item">Añadir Empleados</a>
                            </li>
                            <li><a href="{{url('/worker/showall')}}" data-i18n="nav.menu_levels.seeworkers" class="menu-item">Listar Empleados</a>
                            </li>
                        </ul>
                    </li>
                     
                    <li><a href="" data-i18n="nav.dash.crm" class="menu-item">Vacaciones</a>
                        <ul class="menu-content">
                            <li><a href="{{url('/vacation/request')}}" data-i18n="nav.menu_levels.solic" class="menu-item">Ver solicitudes</a>
                            </li>
                            <li><a href="{{url('/vacation/calendar')}}" data-i18n="nav.menu_levels.solic" class="menu-item">Ver calendario</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li><a href="{{ url('/vacation/create/'.Crypt::encrypt(Auth::user()->id).'/'.Crypt::encrypt(Auth::user()->name)) }}" data-i18n="nav.dash.crm" class="menu-item">Solicitar Vacaciones</a></li>

                   
                </ul>
            </li>
        </ul>
    </div>
    <!--=========================    Footer Menu Section Start    ================================================== -->
    <div class="main-menu-footer footer-close">
        <div class="header text-xs-center"><a href="#" class="col-xs-12 footer-toggle"><i class="icon-ios-arrow-up"></i></a></div>
        <div class="content">
          <div class="insights">
            <div class="col-xs-12">
              <p>Product Delivery</p>
              <progress value="25" max="100" class="progress progress-xs progress-success">25%</progress>
            </div>
            <div class="col-xs-12">
              <p>Targeted Sales</p>
              <progress value="70" max="100" class="progress progress-xs progress-info">70%</progress>
            </div>
          </div>
          <div class="actions"><a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Settings"><span aria-hidden="true" class="icon-cog3"></span></a><a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock"><span aria-hidden="true" class="icon-lock4"></span></a><a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout"><span aria-hidden="true" class="icon-power3"></span></a></div>
        </div>
      </div><!--==============================    Footer Menu Section END    ============================================= -->
</div><!--==============================    Fin Menu Section END    ================================================== -->
<!-- / main menu-->

<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('errors.error')
@include('errors.flash-message') 
@yield ('content')
<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="http://www.globalretail.es/" target="_blank" class="text-bold-800 grey darken-2">GLOBAL RETAIL</a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
</footer>
@yield('javascript')
<!-- BEGIN VENDOR JS-->
<script>  $("#content-wrapper").css("min-height","2000px"); </script>
<!--<script src="{{ URL::asset('js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>-->
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
<!--<script src="{{ URL::asset('vendors/js/extensions/moment.min.js')}}" type="text/javascript"></script>-->
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
<!-- END PAGE LEVEL JS-->
</body>
</html>