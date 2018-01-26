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
                                        <div id='ternal-events'>
                                            <h4>Eventos Arrastrables</h4>

                                            <div id='external-events' class="fc-events-container">
                                                <div id='fc-event' class='fc-event bg-red'> Fechas No Disponibles</div>
                                                <div class='fc-event bg-orange' >Consultar Fecha</div>
                                                <div class='fc-event bg-green' >Fecha disponible</div>
                                                <div class='fc-event' data-color='#FB6E52'>Cumpleaños</div>
                                                <div class='fc-event' data-color='#ED5564'>Comida</div>
                                                <div class='fc-event' data-color='#F8B195'>Conferencia</div>
                                                <div class='fc-event' data-color='#6C5B7B'>Fiesta</div>
                                                <div class='fc-event' data-color='#355C7D'>Meeting</div>
                                                <div class='fc-event' data-color='#547A8B'>Fiesta de Baile</div>
                                                <div class='fc-event' data-color='#3EACAB'>Cena</div>
                                                <p>
                                                    <input type='checkbox' id='drop-remove' />
                                                    <label for='drop-remove'>Remover después de mover</label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Crear evento</h3>
            </div>
            <div class="box-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                
              </div>
              <!-- /btn-group -->
              <div class="input-group">
                <input id="new-event" type="text" class="form-control" placeholder="Titulo de evento">

                <div class="input-group-btn">
                  <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Agregar</button>
                </div>
                <!-- /btn-group -->
              </div><br/><br/>
              <!-- /input-group -->
              {!! Form::open(['route' => ['guardaEventos'], 'method' => 'POST', 'id' =>'form-calendario']) !!}
              {!! Form::close() !!}
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
<!-- // Full calendar advance section end -->
@stop
@section('javascript')
 <!-- jQuery UI 1.11.4 -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js"></script>
<script>
    /**$(function () {
//inicialimos los eventos
/* initialize the external events
     -----------------------------------------------------------------
    function ini_events(ele) {
      ele.each(function () {
        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }
    ini_events($('#fc-event div.fc-events-container'));
//Inicializamos el calendario:    

    $('#fc-default').fullCalendar({
        defaultDate: '2016-06-12',
        editable: true,
        eventLimit: true, // allow "more" link when too many events

        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
        
    });

});
**/
  $(function () {
    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {
        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#fc-event div.external-events'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
  //while(reload==false){
    $('#fc-default').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'hoy',
        month: 'mes',
        week: 'semana',
        day: 'dia'
      },
      monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
      events: { url:"cargaEventos"},

      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!

      drop: function (date, allDay) { // this function is called when something is dropped
        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');
        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);
        allDay=true;
        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        //$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }
        //Guardamos el evento creado en base de datos
        var title=copiedEventObject.title;
        var start=copiedEventObject.start.format("YYYY-MM-DD HH:mm");
        var back=copiedEventObject.backgroundColor;

        crsfToken = document.getElementsByName("_token")[0].value;
        $.ajax({
             url: 'guardaEventos',
             data: 'title='+ title+'&start='+ start+'&allday='+allDay+'&background='+back,
             type: "POST",
             headers: {
                    "X-CSRF-TOKEN": crsfToken
                },
              success: function(events) {
                console.log('Evento creado');      
                $('#fc-default').fullCalendar('refetchEvents' );
              },
              error: function(json){
                console.log("Error al crear evento");
              }        
        });        
      },

      eventResize: function(event) {
          var start = event.start.format("YYYY-MM-DD HH:mm");
          var back=event.backgroundColor;
          var allDay=event.allDay;
          if(event.end){
            var end = event.end.format("YYYY-MM-DD HH:mm");
          }else{var end="NULL";
          }
          crsfToken = document.getElementsByName("_token")[0].value;
            $.ajax({
              url: 'actualizaEventos',
              data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id+'&background='+back+'&allday='+allDay,
              type: "POST",
              headers: {
                    "X-CSRF-TOKEN": crsfToken
                },
                success: function(json) {
                  console.log("Updated Successfully");
                },
                error: function(json){
                  console.log("Error al actualizar evento");
                }
            });
      },
      eventDrop: function(event, delta) {
        var start = event.start.format("YYYY-MM-DD HH:mm");
        if(event.end){
          var end = event.end.format("YYYY-MM-DD HH:mm");
        }else{var end="NULL";
        }
        var back=event.backgroundColor;
        var allDay=event.allDay;
        crsfToken = document.getElementsByName("_token")[0].value;

          $.ajax({  
            url: 'actualizaEventos',
            data: 'title='+ event.title+'&start='+ start +'&end='+ end+'&id='+ event.id+'&background='+back+'&allday='+allDay ,           
            type: "POST",
            headers: {
              "X-CSRF-TOKEN": crsfToken
            },
            success: function(json) {
              console.log("Updated Successfully eventdrop");
            },
            error: function(json){
              console.log("Error al actualizar eventdrop");
            }
          });
      },
      eventClick: function (event, jsEvent, view) {
        crsfToken = document.getElementsByName("_token")[0].value;
        var con=confirm("Esta seguro que desea eliminar el evento");
        if(con){
            $.ajax({
               url: 'eliminaEvento',
               data: 'id=' + event.id,
               headers: {
                  "X-CSRF-TOKEN": crsfToken
                },
               type: "POST",
               success: function () {
                    $('#fc-default').fullCalendar('removeEvents', event._id);
                    console.log("Evento eliminado");
                }
            });
        }else{
           console.log("Cancelado");
        }
      },

      eventMouseover: function( event, jsEvent, view ) { 
        var start = (event.start.format("HH:mm"));
        var back=event.backgroundColor;
        if(event.end){
            var end = event.end.format("HH:mm");
        }else{var end="No definido";
        }
        if(event.allDay){
            var allDay = "Si";
        }else{var allDay="No";
        }
        var tooltip = '<div class="tooltipevent" style="width:200px;height:100px;color:white;background:'+back+';position:absolute;z-index:10001;">'+'<center>'+ event.title +'</center>'+'Todo el dia: '+allDay+'<br>'+ 'Inicio: '+start+'<br>'+ 'Fin: '+ end +'</div>';
        $("body").append(tooltip);
        $(this).mouseover(function(e) {
          $(this).css('z-index', 10000);
          $('.tooltipevent').fadeIn('500');
          $('.tooltipevent').fadeTo('10', 1.9);
        }).mousemove(function(e) {
          $('.tooltipevent').css('top', e.pageY + 10);
          $('.tooltipevent').css('left', e.pageX + 20);
        });            
      },

      eventMouseout: function(calEvent, jsEvent) {
        $(this).css('z-index', 8);
        $('.tooltipevent').remove();
      },

      dayClick: function(date, jsEvent, view) {
            if (view.name === "month") {
                $('#fc-default').fullCalendar('gotoDate', date);
                $('#fc-default').fullCalendar('changeView', 'agendaDay');
            }
      }
    });

    /* AGREGANDO EVENTOS AL PANEL */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>
</script>

@stop