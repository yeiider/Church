    @include('../thema.header')

    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Lista de Iglesias </h3>
            </div>


          </div>

          <div class="clearfix">
<!-- Main -->


    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" >
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>E-Mail</th>
            <th>Direccion</th>
            <th>Ciudad</th>
            <th>Pastor</th>
            <th>Fecha Inicio</th>
            <th>Accion</th>
          </tr>
        </thead>


        <tbody>
            @foreach ($datos['iglesia'] as $i)
            <tr>
            <td>{{$i->nombre}}</td>
            <td>{{$i->telefono}}</td>
            <td>{{$i->email}}</td>
            <td>{{$i->direccion}}</td>
            <td>{{$i->municipio}}</td>
            <td>{{$i->pastor->nombre . ' ' . $i->pastor->apellido}}</td>
            <td>{{$i->fecha_creacion}}</td>
                <td> <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="background-color:white">
                    Opcion
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href={{url("Iglesia/{$i->referencia}")}}>Ver Perfil</a>
                    <a class="dropdown-item" href="#">Informe Miembros</a>
                    <div class="dropdown-divider"></div>
                    @if(auth()->user()->rol==1)
                    <a class="dropdown-item" href="#">Asignar Pastor</a>
                    <a class="dropdown-item" href="#">Informe Iglesia</a>
                    @endif
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
