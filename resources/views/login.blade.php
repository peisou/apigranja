<!DOCTYPE html>
<html lang="en" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page </title>
    <link rel="apple-touch-icon" sizes="60x60" href="images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- font icons -->
    <link rel="stylesheet" type="text/css" href="fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/sliders/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/extensions/pace.css">
     
    <link rel="stylesheet" type="text/css" href="vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS -->
    <!-- BEGIN ROBUST CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/colors.css">
    <!-- END ROBUST CSS -->
    <!-- BEGIN Page Level CSS -->
    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="css/pages/login-register.css">

    <!-- END Page Level CSS -->
    <!-- BEGIN Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <!-- END Custom CSS -->
</head>
<body data-open="hover" data-menu="horizontal-menu" data-col="1-column" class="horizontal-layout horizontal-menu 1-column  blank-page blank-page">

<!-- //////////////////////////////////////////////////////////////////////////// -->

<div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <div class="p-1"><img src="images/logo/robust-logo-dark.png" alt="branding logo"></div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login</span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                               
                                <form class="form-horizontal form-simple" action="login" method ="post" >
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="email" class="form-control form-control-lg input-lg" name ="email" id="email" placeholder="Your Email" required>
                                                <div class="form-control-position">
                                                    <i class="icon-head"></i>
                                                </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-lg input-lg" name="password" id="password" placeholder="Enter Password" required>
                                                <div class="form-control-position">
                                                    <i class="icon-key3"></i>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                       <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                        </fieldset>
                                        <fieldset class="form-group row">
                                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                                <fieldset>
                                                    <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                </fieldset>
                                            </div>        
                                        </fieldset>   
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>                            
                                    @include('errors.flash-message')                               
                                </form>                                
                            </div>
                        </div>
                        <!--<div class="card-footer">
                            <div class="form-group">
                            <p class="float-sm-left text-xs-center m-0"><a href="{{ url('password.request') }}" class="card-link">Olvidaste tu contraseña?</a></p>
                                <p class="float-sm-right text-xs-center m-0">New to Robust? <a href="{{url('/register')}}" class="card-link">Registrate</a></p>
                            </div>-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
{{-- END CONTAINER --}}
<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- BEGIN VENDOR JS
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="vendors/js/ui/jquery-sliding-menu.js" type="text/javascript"></script>
<script src="vendors/js/sliders/slick/slick.min.js" type="text/javascript"></script>
<script src="vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS -->
<!-- BEGIN PAGE VENDOR JS -->
<script type="text/javascript" src="vendors/js/ui/jquery.sticky.js"></script>
{{-- iCheck --}}
<script src="vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS -->
{{-- BEGIN LIVE RELOAD TODO: Need to remove --}}
{{-- script(src='http://localhost:35729/livereload.js', type='text/javascript') --}}
{{-- END LIVE RELOAD --}}
<!-- BEGIN ROBUST JS -->
<script src="js/core/app-menu.js" type="text/javascript"></script>
<script src="js/core/app.js" type="text/javascript"></script>
<script src="js/scripts/ui/fullscreenSearch.js" type="text/javascript"></script>
<!-- END ROBUST JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="js/scripts/forms/form-login-register.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
</body>
</html>
{{-- Horizontal top-icon menu templates --}}
{{-- include ../templates/horizontal-top-icon-menu-template --}}