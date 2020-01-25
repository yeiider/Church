@include('../thema.header')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Lista de Miembros </h3>
        </div>


      </div>

      <div class="clearfix">
<!-- Main -->


<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" >
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Genero</th>
        <th>Edad</th>
        <th>Estado Civil</th>
        <th>Estado</th>
        <th>Fecha Inicio</th>
        <th>Accion</th>
      </tr>
    </thead>


    <tbody>

        @foreach ($data['miembros'] as $i)
        <tr>
        <td>{{$i->nombres . ' ' . $i->apellidos}}</td>
        <td>@if($i->genero==1) Mascolino @else Femenino @endif</td>
        <td>{{$i->edad}}</td>
        <td>@switch($i->estado_civil)
            @case(1)
                Soltero
                @break
            @case(2)
                Casado
                @break
            @case(3)
                Union Libre
                @break
            @default

        @endswitch</td>
        <td>@if($i->estado==0) Bautizado @else Conzolidando @endif</td>
        <td>{{$i->fecha_inicio}}</td>

            <td> <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="background-color:white">
                Opcion
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href={{url("Iglesia/{$i->referencia}")}}>Ver Perfil</a>
                <a class="dropdown-item" href="#">Informe Miembros</a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Eliminar</a>

              </div></td>
          </tr>
        @endforeach

    </tbody>
</table>


      </div>
      <!--EndMain-->

    </div>
  </div>


@include('../thema.footer')

</body>
</html>
