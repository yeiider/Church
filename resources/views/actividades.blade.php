@include('thema.header')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">

        </div>


      </div>
      @if(session('success'))
      <div class="alert alert-success alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('success')}}!</strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button></div>
          @endif

      <div class="clearfix">
        <div id='actividades' style="color:#000"></div>
      </div>


    </div>
  </div>

  <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Nuevo Evento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        </div>
        <form  class="form-horizontal calender"  action="{{route('crear-actividad')}}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div id="testmodal" style="padding: 5px 20px;">
              {{ csrf_field() }}
                <div class="form-group row">
                    <label class="control-label">Tipo de Actividad</label>

                      <input type="text" class="form-control" id="tipo" name="tipo">

                  </div>
                  <div class="form-group row">
                    <label class="control-label">Titulo</label>

                      <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>

                  <div class="form-group row">
                    <label class="control-label">Lema</label>

                      <input type="text" class="form-control" id="lema" name="lema">
                    </div>

                  <div class="form-group row">
                    <label class="control-label">Quien Invita</label>

                      <input type="text" class="form-control" id="invita" name="invita">
                    </div>

                  <div class="form-group row">
                      <div class="col-sm-6 col-md-6">
                        <label class="control-label">Fecha Inicio</label>
                         <input type="date" class="form-control" id="inicio" name="inicio">
                      </div>
                      <div class="col-sm-6 col-md-6">
                        <label class="control-label">Fecha Fin</label>
                         <input type="date" class="form-control" id="fin" name="fin">
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-6 col-md-6">
                        <label class="control-label">Publico</label>

                        <select name="publico" id="publico" class="form-control"  tabindex="4" data-placeholder="Seleccione Pais">
                            <option value="1">Publico</option>
                            <!--<option value="2">Distrito</option>-->
                            <option value="3">Privado</option>
                            <!--<option value="4">Selecciona Personal</option>-->
                        </select>
                      </div>
                      <div class="col-sm-6 col-md-6">
                    <label for="valor" class="control-label">Valor</label>
                    <input type="text" name="valor" id="valor" class="form-control">
                      </div>

                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 col-md-6">
                       <label for="">Hora de inicio</label>
                       <div class='input-group date' id='hora_inicio'>
                        <input type='text' class="form-control" name="hora_inicio" />
                        <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                     <label for="hora">Hora de final</label>
                     <div class='input-group date' id='final'>
                        <input type='text' class="form-control" name="hora_final" />
                        <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 col-md-6">
                       <label for="">Lugar</label>
                       <input type="text" name="lugar" id="lugar" class="form-control">
                </div>
                <div class="col-sm-6 col-md-6">
                     <label for="hora">Direccion</label>
                     <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
                  </div>
                  <div class="form-group row">
                    <label class=" control-label">Description</label>

                      <textarea class="form-control" style="height:55px;" id="describe" name="describe"></textarea>

                  </div>
                  <div class="form-group row">
                    <label class="control-label ">Color</label>

                      <div class="input-group demo2">
                        <input type="text" value="#e01ab5" class="form-control" name="color"/>
                        <span class="input-group-addon"><i></i></span>
                      </div>

                  </div>

                  <div class="form-group row">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file" >
                    <label class="custom-file-label" for="customFile">Cargar archivo...</label>
                      </div>
                  </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
          <input type="submit" class="btn btn-primary " value="Guardar"/>
        </div>
    </form>
      </div>
    </div>
  </div>
  <div id="CalenderModalEdit" class="modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title lema" id="lema"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        </div>

        <div class="modal-body">

          <div id="testmodal2" style="padding: 5px 20px;">

            <div class="row">
                <div class="col-sm-4 col-md-4   radio" >
                    <h3 class="pl-3">Contacto</h3>
                  <div class="tel pl-3"></div>
                  <div class="email pl-3"><p></p></div>
                  <div class="lugarIglesia pl-3"></div>
                  <div class="direccionIglesia pl-3"></div>
                  <div class="pl-3">
                    <h3>IGLESIA</h3>
                    <div class="iglesia mb-3"></div>
                    <h3>Pastor a cargo</h3>
                    <div class="pastor"></div>
                  </div>

                </div>

                <div class="col-sm-8 col-md-8 radio  text-black" style="background-color:white; color:black ">
                  <div class="di" style="padding:9px">
                    <h5><em>Lema</em></h5>
                    <h3 class="lemaA">UNA IGLESIA QUE INSPIRA</h3>

                    <h5><em>Introduccion</em></h5>
                    <P class="descripcion"></P>

                    <h5><em>Lugar</em></h5>
                    <P class="lugar"></P>
                    <h5><em>Hora y Fecha</em></h5>
                    <P class="fecha"></P>
                    <h5><em>Valor</em></h5>
                    <P class="valor">$100.000</P>
                    <h5><em>Invita</em></h5>
                    <P class="invita">Ministerio de Evangelismo</P>
                </div>
                </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>

  <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
  <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

@include('thema.footer')


<script>

$('#hora_inicio').datetimepicker({
    format: 'hh:mm A'
    });

$('#final').datetimepicker({
        format: 'hh:mm A'
    });


$(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
                    var date = new Date(),
                        d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear(),
                        started,
                        categoryClass;

                    var calendar = $('#actividades').fullCalendar({
                    lang:"es",
                      header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listMonth',


                      },
                      selectable: true,
                      selectHelper: true,
                      select: function(start, end, allDay) {
                        $('#fc_create').click();

                        started = start;
                        ended = end;

                        $(".antosubmit").on("click", function() {
                          var title = $("#title").val();
                          if (end) {
                            ended = end;
                          }

                          categoryClass = $("#event_type").val();

                          if (title) {
                            calendar.fullCalendar('renderEvent', {
                                title: title,
                                start: started,
                                end: end,
                                allDay: allDay
                              },
                              true // make the event "stick"
                            );
                          }

                          $('#title').val('');

                          calendar.fullCalendar('unselect');

                          $('.antoclose').click();

                          return false;
                        });
                      },
                      eventClick: function(calEvent, jsEvent, view) {
                        $('#fc_edit').click();
                        $('#title2').val(calEvent.tipo);
                        $('.lema').html(calEvent.tipo);
                        $('.email').html(calEvent.email)
                        $('.tel').html(calEvent.tel)
                        $('.lugarIglesia').html(calEvent.lugarIglesia)
                        $('.direccionIglesia').html(calEvent.direccionIglesia)
                        $('.lemaA').html(calEvent.lema)
                        $('.descripcion').html(calEvent.descripcion)
                        $('.lugar').html(calEvent.lugar)
                        $('.fecha').html(calEvent.fecha)
                        $('.invita').html(calEvent.invita)
                        $('.valor').html(calEvent.valor)
                        $('.iglesia').html(calEvent.iglesia)
                        $('.pastor').html(calEvent.pastor)

                        categoryClass = $("#event_type").val();

                        $(".antosubmit2").on("click", function() {
                          calEvent.title = $("#title2").val();

                          calendar.fullCalendar('updateEvent', calEvent);
                          $('.antoclose2').click();
                        });

                        calendar.fullCalendar('unselect');
                      },
                      editable: false,
                      eventSources:[{
                        events:[
                          @foreach($data['actividades'] as $k)
                          {
                           title: "{{$k->tipo}}",
                           descripcion:"{{json_encode($k->descripcion)}}",
                           lema:"{{$k->lema}}",
                           file:"{{$k->file}}",
                           pastor:"<em>{{$k->iglesia->pastor->nombre .' '. $k->iglesia->pastor->apellido}}</em>",
                           iglesia:"{{$k->iglesia->nombre}}",
                           valor:"{{'$'.number_format($k->valor,2,',','.')}}",
                           invita:"{{$k->invita}}",
                           id:"{{$k->id}}",
                           fecha:"{{date('D-M-Y', strtotime($k->fecha_inicio)).' de ' .$k->hora_inicio.' a'.$k->hora_final}}",
                           lugar:"{{$k->lugar.' '.$k->direccion}}",
                           email:"{{'Email: '.$k->iglesia->email}}",
                           tel:"{{'Telefono: '.$k->iglesia->telefono}}",
                           lugarIglesia:"{{'Lugar: '.$k->iglesia->municipio.' - '.$k->departamento}}",
                           tipo:"{{$k->tipo}}",
                           direccionIglesia:"{{'Direccion: '.$k->iglesia->direccion}}",
                           start: '{{date('Y, m, d', strtotime($k->fecha_inicio))}}',
                           end: '{{date('Y, m, d',strtotime($k->fecha_final))}}',
                           color:"{{$k->color}}",


                      },
                          @endforeach
                      ]
                      }]

                     /* events: [{
                        title: 'All Day Event',
                        start: new Date(y, m, 1)
                      }, {
                        title: 'Long Event',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2)
                      }, {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false
                      }, {
                        title: 'Lunch',
                        start: new Date(y, m, d + 14, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false
                      }, {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false
                      }, {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://google.com/'
                      }]*/
                    });
</script>
</body>
</html>
