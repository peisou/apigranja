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
                                            <h4>Draggable Events</h4>
                                            <div class="fc-events-container">
                                                <div class='fc-event' data-color='#2D95BF'>All Day Event</div>
                                                <div class='fc-event' data-color='#48CFAE'>Long Event</div>
                                                <div class='fc-event' data-color='#50C1E9'>Meeting</div>
                                                <div class='fc-event' data-color='#FB6E52'>Birthday party</div>
                                                <div class='fc-event' data-color='#ED5564'>Lunch</div>
                                                <div class='fc-event' data-color='#F8B195'>Conference Meeting</div>
                                                <div class='fc-event' data-color='#6C5B7B'>Party</div>
                                                <div class='fc-event' data-color='#355C7D'>Happy Hour</div>
                                                <div class='fc-event' data-color='#547A8B'>Dance party</div>
                                                <div class='fc-event' data-color='#3EACAB'>Dinner</div>
                                                <p>
                                                    <input type='checkbox' id='drop-remove' />
                                                    <label for='drop-remove'>remove after drop</label>
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
                title: 'All Day Event',
                start: '2016-06-01'
            },
            {
                title: 'Long Event',
                start: '2016-06-07',
                end: '2016-06-10'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2016-06-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2016-06-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2016-06-11',
                end: '2016-06-13'
            },
            {
                title: 'Meeting',
                start: '2016-06-12T10:30:00',
                end: '2016-06-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2016-06-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2016-06-12T14:30:00'
            },
            {
                title: 'Happy Hour',
                start: '2016-06-12T17:30:00'
            },
            {
                title: 'Dinner',
                start: '2016-06-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2016-06-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2016-06-28'
            }
        ]
    });
    });
</script>

@stop