@include('../thema.header')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">

        </div>


      </div>

      <div class="clearfix">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('success')}}!</strong></p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button></div>
      @endif

        <div class="col-xs-2 col-sm-2 col-md-2">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <div class="nav nav-tabs flex-column  bar_tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Cuentas</a>
              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Informacion contacto</a>
              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#config" role="tab" aria-controls="v-pills-messages" aria-selected="false">Informacion extra</a>
              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Historial de Diezmos</a>
            </div>

          </div>

          <div class="col-xs-8 col-sm-8 col-md-8">
            <!-- Tab panes -->

            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
           <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Añadir</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>Codio</th>
                        <th>Nombre</th>
                        <th>Naturaleza</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['cuentas'] as $k)
                    <tr>
                    <td>{{$k->cuenta}}</td>
                    <td>{{$k->nombre}}</td>
                    <td>@switch($k->naturaleza)
                        @case(0)
                            Debito
                            @break
                        @case(1)
                            Credito
                            @break
                        @default

                    @endswitch</td>
                    <td><a href="{{url("Cuentas/drop/{$k->id}")}}" class="btn btn-danger fa fa-trash"></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
              </div>

              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

            </div>

            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            </div>

          </div>
        </div>

    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Añadir Cuenta</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{route('crear-cuenta')}}" method="POST" id="form">
        <div class="modal-body">

            {{ csrf_field() }}
                <div class="fomr-group">
                    <label for="">Codigo</label>
                    <input type="text" name="codigo" id="codigo" required class="form-control">
                </div>
                <div class="fomr-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required class="form-control">
                </div>
                <div class="fomr-group">
                    <label for="">Naturaleza</label>
                   <select name="naturaleza" id="tipo" class="form-control">
                       <option value="0">Debito</option>
                       <option value="1">Credito</option>

                   </select>
                </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
          <button type="submit" class="btn btn-success" id="guardar">Guardar</button>
        </div>
    </form>
      </div>
    </div>
  </div>



@include('thema.footer')

<script>


      $('#edad ,#cc, #telefono,#hijos').on('input',function (){
        this.value = (this.value + '').replace(/[^0-9--]/g, '');
      });

      $('.table').dataTable()

</script>
</body>
</html>
