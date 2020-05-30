
@include('thema.header')
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
      <form action="{{route('create-empleado')}}" method="POST" enctype="multipart/form-data">
    <div class="form-group row">

        <div class="col-sm-6 col-md-6">
            <label class="label-align" for="nombre">Nombres
            </label>
            <input type="text" id="nombre"  name="nombre"   required="required" aria-describedby="basic-addon2" class="form-control"/>
        </div>
        {{ csrf_field() }}

        <div class="col-sm-6 col-md-6">
            <label class="label-align" for="apellido">Apellidos
            </label>
            <input type="text" id="apellido"  name="apellido"   required="required" aria-describedby="basic-addon2" class="form-control"/>
        </div>

      </div>
      <div class="form-group row">

        <div class="col-sm-6 col-md-6">
            <label class="label-align" for="cc">Identificacion
            </label>
            <input type="text" id="cc"  name="cc"   required="required" aria-describedby="basic-addon2" class="form-control"/>
        </div>

        <div class="col-sm-6 col-md-6">
            <label class="label-align" for="telefono">Telefono</label>
            <input type="text" id="telefono"  name="telefono"   required="required" aria-describedby="basic-addon2" class="form-control"/>
        </div>
      </div>
      <div class="form-group row">
      <div class="col-sm-6 col-md-6">
        <label class="label-align" for="ciudad">Ciudad
        </label>
        <input type="text" id="ciudad"  name="ciudad"   required="required" aria-describedby="basic-addon2" class="form-control"/>
    </div>

    <div class="col-sm-6 col-md-6">
        <label class="label-align" for="direccion">Dirección</label>
        <input type="text" id="direccion"  name="direccion"   required="required" aria-describedby="basic-addon2" class="form-control"/>
    </div>

  </div>
   <div class="form-group row">
    <div class="col-sm-6 col-md-6">
      <label class="label-align" for="email">Email
      </label>
      <input type="email" id="email"  name="email"   required="required" aria-describedby="basic-addon2" class="form-control"/>
  </div>

  <div class="col-sm-6 col-md-6">
      <label class="label-align" for="jefe">Jefe Inmediato</label>
      <input type="text" id="jefe"  name="jefe"   required="required" aria-describedby="basic-addon2" class="form-control"/>
  </div>

</div>
<div class="form-group row">
    <div class="col-sm-6 col-md-6">
      <label class="label-align" for="tipo">Tipo de Contrato
      </label>
     <select name="tipo" id="tipo" class="form-control">
         <option value="1">A Término Fijo</option>
         <option value="2">A término indefinido</option>
         <option value="3">De Obra o labor</option>
         <option value="4">Civil por prestación de servicios</option>
         <option value="5">De aprendizaje</option>
         <option value="6">Ocasional de trabajo</option>
     </select>
  </div>

  <div class="col-sm-6 col-md-6">
    <label class="label-align" for="salario">Salario
    </label>
    <input type="text" name="salario" id="salario" required class="form-control">
  </div>
</div>

<div class="form-group row">
    <div class="col-sm-6 col-md-6">
      <label class="label-align" for="fecha_inicio">Fecha de inicio
      </label>
      <input type="date" id="fecha_inicio"  name="fecha_inicio"   required="required" aria-describedby="basic-addon2" class="form-control"/>
  </div>

  <div class="col-sm-6 col-md-6">
      <label class="label-align" for="fecha_final">Fecha Final</label>
      <input type="date" id="fecha_final"  name="fecha_final"   aria-describedby="basic-addon2" class="form-control"/>
  </div>

</div>
<div class="form-group row">
    <div class="col-sm-6 col-md-6">
      <label class="label-align" for="periodo">Periodo de Pago
      </label>
     <select name="periodo" id="periodo" class="form-control" required>
         <option value="1">Mensual</option>
         <option value="2">Quincenal</option>
         <option value="3">Semanal</option>
     </select>
  </div>

  <div class="col-sm-6 col-md-6">
    <label class="label-align" for="contrato">Abjuntar Contrato
    </label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="" name="contrato" >
    <label class="custom-file-label" for="customFile">Abjuntar COntrato...</label>
      </div>
  </div>

</div>
<div class="form-group">
    <input type="submit" name="enviar" value="Registrar" class="btn btn-success">
</div>

   </form>

      </div>


    </div>
  </div>
  @include('thema.footer')

  <script>

  $('.table').dataTable();
  $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>
</body>
</html>


