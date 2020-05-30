
@include('thema.header')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">

        </div>


      </div>

      <div class="clearfix">
      <table class="table table-hover">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cedula</th>
                  <th>Estado</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Acción</th>
              </tr>
          </thead>

      <tbody>
          @foreach ($empleados as $p)
              <tr>
              <td>{{$p->nombre}}</td>
              <td>{{$p->apellido}}</td>
              <td>{{$p->identificacion}}</td>
              <td>@switch($p->estado)
                @case(true)
            <h5 class="text-white"><span class="bg-success"  style="padding:3px; border-radius:15px">activa</span></h5>
                    @break
                @case(false)
                <h5 class="text-white"><span class="bg-danger"  style="padding:3px; border-radius:15px">cancelada</span></h5>
                    @break
                @default

            @endswitch</td>
              <td>{{$p->email}}</td>
              <td>{{$p->telefono}}</td>
              <td> <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="background-color:white">
                Opcion
              </button>


              <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('empleado-view',$p->identificacion)}}" >Ver</a>
              <a class="dropdown-item" href="{{asset('assets/iglesias/'.str_replace(" ","-",$p->iglesia->nombre)).'/soportes/empleados/'.$p->soporte}}" target="_blank">Descargar Contrato</a>
                <a class="dropdown-item" data-toggle="modal"  onclick="$.confirm({
                    title: '<h3>Seguro?!</h3>',
                    content: '<h5>Deseas generar la nomina de este empleado</h5>',
                    buttons: {
                       confirma:{
                           text:'Aceptar',
                           btnClass:'btn-success',
                           action:function(){

                              location.href='{{url("Nominas/Generar/{$p->id}")}}'
                           }
                       },
                        cancelar: {
                            text: 'Cancelar',
                            btnClass: 'btn-default',
                            keys: ['enter', 'shift'],
                            action: function(){
                                $.alert('Proceso cancelado');
                            }
                        }
                    }
                });">Generar Nomina <span class="glyphicon glyphicon-refresh
                "></span></a>

              </div></td>


              </tr>
          @endforeach
      </tbody>
    </table>
      </div>


    </div>
  </div>
  @include('thema.footer')

  <script>

  $('.table').dataTable();
  </script>
</body>
</html>


