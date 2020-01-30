@include('../thema.header')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="page-title">
         <div class="title_left">
                <h3>Registro de Otros Ingresos</strong></h3>
            </div>


          </div>
        </div>


      <div class="clearfix">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('success')}}!</strong></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button></div>
                @endif
            @if(session('error'))
            <div class="alert alert-success alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('error')}}!</strong></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button></div>
                @endif
      </div>

    <form action="{{route('donacion-create')}}"  method="post">
    <div class="form-group row">

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="nombre">Nombres del Responsable
                </label>
                <input type="text" id="nombre"  name="nombre"   required="required" aria-describedby="basic-addon2" class="form-control"/>
            </div>

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="apellido">Apellidos del Responsable
                </label>
                <input type="text" id="apellido"  name="apellido"   required="required" aria-describedby="basic-addon2" class="form-control"/>
            </div>

          </div>

          <div class="form-group row">

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="cc">Documento de Identidad
                </label>
                <input type="text" id="cc"  name="cc"   required="required" aria-describedby="basic-addon2" class="form-control"/>
            </div>

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="nit">N.I.T
                </label>
                <input type="text" id="nit"  name="nit"   aria-describedby="basic-addon2" class="form-control"/>
            </div>

          </div>

          <div class="form-group row">

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="razon">Razon Social
                </label>
                <input type="text" id="razon"  name="razon"    aria-describedby="basic-addon2" class="form-control"/>
            </div>

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="email">Email
                </label>
                <input type="email" id="email"  name="email"   aria-describedby="basic-addon2" class="form-control"/>
            </div>

          </div>

          <div class="form-group row">

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="ciudad">Ciudad de Residencia
                </label>
                <input type="text" id="ciudad"  name="ciudad"    aria-describedby="basic-addon2" class="form-control"/>
            </div>

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="direccion">Direccion de Residencia
                </label>
                <input type="text" id="direccion"  name="direccion"   aria-describedby="basic-addon2" class="form-control"/>
            </div>

          </div>

          <div class="form-group row">

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="telefono">Telefono
                </label>
                <input type="text" id="telefono"  name="telefono"    aria-describedby="basic-addon2" class="form-control"/>
            </div>

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="direccion">Fecha
                </label>
                <input type="date" id="fecha"  name="fecha"   aria-describedby="basic-addon2" class="form-control"/>
            </div>

          </div>
          <div class="form-group row">

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="motivo">Motivo
                </label>
            <textarea name="motivo" id="motivo" cols="30" rows="3" class="form-control"></textarea>
            </div>

            <div class="col-sm-6 col-md-6">
                <label class="label-align" for="valor">Valor <strong>$</strong>
                </label>
                <input type="text" id="valor"  name="valor"   aria-describedby="basic-addon2" class="form-control"/>
            </div>

          </div>


          <div class="form-group row">
              <button type="submit" name="enviar" id="btn-enviar" class="btn btn-success">Guardar</button>
          </div>



      {{ csrf_field() }}
</form>


    </div>
  </div>
  @include('../thema.footer')
  <script>

    $(document).ready(function (){
      $('#valor ,#cc, #nit, #telefono').on('input',function (){
        this.value = (this.value + '').replace(/[^0-9--]/g, '');
      });
    });
</script>

</body>
</html>
