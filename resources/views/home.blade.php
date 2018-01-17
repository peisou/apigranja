@extends('layouts.app')
    
    <link rel="stylesheet" href="{{ URL::asset('css/plugins/calendars/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css" media="print"/>

@section('content')
<!-- Full calendar advance example section start -->
<div class="app-content content container-fluid">
    
     <div class="content-body">
        <section id="advance-examples">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 align= "center" class="card-title">Calendario</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div id='external-events'>
                                            <h4>Eventos Arrastrables</h4>
                                            <div class="fc-events-container">
                                                <div class='fc-event' data-color='#2D95BF'>Evento todo el día</div>
                                                <div class='fc-event' data-color='#48CFAE'>Evento Largo</div>
                                                <div class='fc-event' data-color='#50C1E9'>Meeting</div>
                                                <div class='fc-event' data-color='#FB6E52'>Cumpleaños</div>
                                                <div class='fc-event' data-color='#ED5564'>Comida</div>
                                                <div class='fc-event' data-color='#F8B195'>Conferencia</div>
                                                <div class='fc-event' data-color='#6C5B7B'>Fiesta</div>
                                                <div class='fc-event' data-color='#355C7D'>Hora Feliz</div>
                                                <div class='fc-event' data-color='#547A8B'>Fiesta de Baile</div>
                                                <div class='fc-event' data-color='#3EACAB'>Cena</div>
                                                <p>
                                                    <input type='checkbox' id='drop-remove' />
                                                    <label for='drop-remove'>Remover después de mover</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div id='fc-default'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- // Full calendar advance example section end -->
@stop
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ URL::asset('vendors/js/extensions/moment.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js"></script>
<script>
$(document).ready(function(){

    $('#fc-default').fullCalendar({
        defaultDate: '2016-06-12',
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
            {
                title: 'Evento todo el día',
                start: '2016-06-01'
            },
            {
                title: 'Evento Largo',
                start: '2016-06-07',
                end: '2016-06-10'
            },
            {
                id: 999,
                title: 'Meeting',
                start: '2016-06-09T16:00:00'
            },
            {
                title: 'Conferencia',
                start: '2016-06-11',
                end: '2016-06-13'
            },
            {
                title: 'Comida',
                start: '2016-06-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2016-06-12T14:30:00'
            },
            {
                title: 'Hora Feliz',
                start: '2016-06-12T17:30:00'
            },
            {
                title: 'Cena',
                start: '2016-06-12T20:00:00'
            },
            {
                title: 'Cumpleaños',
                start: '2016-06-13T07:00:00'
            }
        ]
    });
    });
</script>
<script src="{{ URL::asset('vendors/js/extensions/drag-drop.js')}}"></script>

<script type="text/javascript">
        function dragMe(teamValue){
            dragula([document.getElementById('fc-event'), document.getElementById('fc-default')], {
                copy: function (el, source) {
                    return source === document.getElementById('nameroll')
                },
                accepts: function (el, target) {
                    return target !== document.getElementById('nameroll')
                }
            });
        }
</script>
@stop