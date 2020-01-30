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
        <form action="{{route('update-miembro')}}" class="form" method="post" enctype="multipart/form-data" >
        <div class="col-xs-2 col-sm-2 col-md-2">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <div class="nav nav-tabs flex-column  bar_tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Informacion Personal</a>
              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Informacion contacto</a>
              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#config" role="tab" aria-controls="v-pills-messages" aria-selected="false">Informacion extra</a>
              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Historial de Diezmos</a>
            </div>

          </div>

          <div class="col-xs-8 col-sm-8 col-md-8">
            <!-- Tab panes -->

            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombres<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nombre" name="nombres" required="required"  class="form-control " value="{{$miembro->nombres}}"/>
                        </div>
                      </div>
                      {{ csrf_field() }}

                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="apellidos">Apellidos<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="apellidos" name="apellidos" required="required" class="form-control " value="{{$miembro->apellidos}}"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="cc">Identificacion<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="cc" name="cc" required="required" class="form-control " value="{{$miembro->identificacion}}"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="edad">Edad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="edad" name="edad" required="required" class="form-control " value="{{$miembro->edad}}"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="fecha">Fecha de Nacimiento<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="date" id="fecha" name="fecha" class="form-control " value="{{date('Y-d-m',strtotime($miembro->fecha_nacimiento))}}"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="hijos">Numero de Hijos<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="hijos" name="hijos"  class="form-control " value="{{$miembro->num_hijos}}"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="civil" >Estado Civil<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <select name="civil" class="form-control" required id="civil">
                            <option value="1">Soltero</option>
                            <option value="2">Casado</option>
                            <option value="3">Union Libre</option>
                        </select>
                        </div>
                      </div>

              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="email" name="email"   class="form-control " value="{{$miembro->email}}"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="telefono">Telefono<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="telefono" name="telefono" class="form-control" value="{{$miembro->telefono}}"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="municipio">Municipio<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="municipio" name="municipio" class="form-control" value="{{$miembro->municipio}}"/>
                    </div>
                </div>
              </div>

              <div class="tab-pane fade" id="config" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fecha_inicio">Fecha de Inicio<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control " value="{{date('Y-d-m',strtotime($miembro->fecha_inicio))}}"/>
                    </div>
                  </div>
            <div class="form-group row">
              <label for="estrato" class="col-form-label col-md-3 col-sm-3 label-align">Estrato</label>
              <div class="col-md-6 col-sm-6 ">

              <input name="estrato" type="num" class="form-control"  id="estrato" value="{{$miembro->estrato}}"/>
              </div>
            </div>
            <div class="form-group row">
              <label for="estrato" class="col-form-label col-md-3 col-sm-3 label-align">Discapacida</label>
              <div class="col-md-6 col-sm-6 ">

                <select name="discapacidad" id="discapacidad" class="form-control">
                    <option value="">Seleccione</option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
                </select>
              </div>
            </div>
        <input type="hidden" value="{{$miembro->id}}" name="id">
            <div class="form-group row">
              <label for="empleado" class="col-form-label col-md-3 col-sm-3 label-align">Empleado</label>
              <div class="col-md-6 col-sm-6 ">

                <select name="empleado" id="empleado" class="form-control">
                    <option value="">Seleccione</option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="diezma" class="col-form-label col-md-3 col-sm-3 label-align">Diezma</label>
              <div class="col-md-6 col-sm-6 ">

                <select name="diezma" id="diezma" class="form-control">
                <option value="">Seleccione</option>
                  <option value="0">No</option>
                  <option value="1">Si</option>

                </select>
              </div>
            </div>

              </div>

              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
<?php
$total=0;
foreach($miembro->diezmos as $t){
$total+=$t->valor;
}

?>

            <table class="table-bordered table-hover table" id="mytable">
               <thead>
                   <tr>
                       <td>Fecha</td>
                       <td>Valor</td>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($miembro->diezmos as $d)

                   <tr>
                   <td>{{$d->fecha}}</td>
                   <td>${{number_format($d->valor,2,',','.')}}</td>

                   </tr>

                   @endforeach
               </tbody>
            </table>
            </div>

            </div>

          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group row">

               <button type="submit" class="btn btn-success form-control" name="enviar"  >Guardar <span class="glyphicon glyphicon-floppy-disk
                "></span></button>

               <button type="button" id="elimina" class="btn btn-danger form-control" name="enviar"  >Eliminar <span class="glyphicon glyphicon-trash
                "></span></button>

              </div>
          </div>

        </form>
    </div>
  </div>
</div>



@include('../thema.footer')

<script>
    $("#empleado option[value="+ {{$miembro->empleado}} +"]").attr("selected",true);
    $("#diezma option[value="+{{$miembro->diezma}} +"]").attr("selected",true);
    $("#discapacidad option[value="+ {{$miembro->discapasida}} +"]").attr("selected",true);


    $("#civil option[value="+ {{$miembro->estado_civil}} +"]").attr("selected",true);
    //$("#etnia option[value="+ {{$miembro->etnia}} +"]").attr("selected",true);
    $('#mytable').dataTable();
    $('#elimina').on('click',function(){

$.confirm({
    title: '<h3>Seguro?!</h3>',
    content: '<h5>Si eliminas a este miembro se eliminara toda la informacion relacionada con el mismo</h5>',
    buttons: {
       confirma:{
           text:'Eliminar',
           btnClass:'btn-danger',
           action:function(){

              location.href='{{url("Miembros/drop/{$miembro->id}")}}'
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
});
    })


      $('#edad ,#cc, #telefono,#hijos').on('input',function (){
        this.value = (this.value + '').replace(/[^0-9--]/g, '');
      });

</script>
</body>
</html>
