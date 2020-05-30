
@include('thema.header')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">

        </div>


      </div>

      <div class="clearfix">
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('error')}}!</strong></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button></div>
            @endif
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('success')}}!</strong></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button></div>
                @endif
      <table class="table table-hover">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cedula</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Telefono</th>
                  <th>Valor Pagado</th>
                  <th>Acción</th>
              </tr>
          </thead>

      <tbody>
          @foreach ($nominas as $p)
              <tr>
              <td>{{$p->empleado->nombre}}</td>
              <td>{{$p->empleado->apellido}}</td>
              <td>{{$p->empleado->identificacion}}</td>
              <td>@switch($p->empleado->estado)
                @case(true)
            <h5 class="text-white"><span class="bg-success"  style="padding:3px; border-radius:15px">activa</span></h5>
                    @break
                @case(false)
                <h5 class="text-white"><span class="bg-danger"  style="padding:3px; border-radius:15px">cancelada</span></h5>
                    @break
                @default

            @endswitch</td>
              <td>{{date('d-m-Y H:i',strtotime($p->created_at))}}</td>
              <td>{{$p->empleado->telefono}}</td>
              <td>${{number_format($p->neto,0,',','.')}}</td>
              <td> <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="background-color:white">
                Opcion
              </button>


              <div class="dropdown-menu">
              <a class="dropdown-item" target="_blank" href="{{url("Nominas/view/{$p->id}")}}" >Ver</a>
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


