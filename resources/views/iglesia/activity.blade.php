@include('thema.header')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Mis Actividades <small></small></h3>
        </div>


      </div>

      <div class="clearfix">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible col-sm-4 col-md-4" role="alert"><p style="font-size:17px"><strong>{{session('success')}}!</strong></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button></div>
            @endif
        @if(session('error'))
        <div class="alert alert-success alert-dismissible col-sm-4 col-md-4" role="alert"><p style="font-size:17px"><strong>{{session('error')}}!</strong></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button></div>
            @endif
        <ul class="list-unstyled timeline list-hover">
            @foreach ($activity as $a)


            <li class="list-group-item list-group-item-action p-3">
              <div class="block">
                <div class="tags pl-3">
                <a href="{{url("Actividad/view/{$a->id}")}}" target="_blank" class="tag">
                  <span class="">{{$a->tipo}}</span>
                  </a>
                </div>
                <div class="block_content">
                  <h2 class="title">
                  <a  onclick="edit('{{$a->id}}','{{$a->publico}}','{{$a->tipo}}','{{$a->titulo}}','{{$a->lema}}','{{$a->valor}}','{{$a->lugar}}','{{$a->direccion}}','{{$a->invita}}','{{json_encode($a->descripcion)}}','{{$a->fecha_inicio}}','{{$a->fecha_final}}','{{$a->hora_inicio}}','{{$a->hora_final}}','{{$a->color}}','{{$a->archivo}}')" data-toggle="modal" data-target="#edit" href="#">{{$a->titulo}}</a></h2>
                  <div class="byline">
                  <span>{{date('d-m-Y', strtotime($a->fecha_inicio))}}</span> By <a>{{$a->invita}}</a>
                  </div>
                <p class="excerpt">{{$a->lema}}</a>
                  </p>
                </div>
              </div>
            </li>
            @endforeach

          </ul>

      </div>



    </div>
  </div>


  <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Actividad</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        </div>
        <form  class="form-horizontal calender"  action="{{route('update-activity')}}" method="post" enctype="multipart/form-data">
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
                        <input type='text' class="form-control" id="h_i" name="hora_inicio" />
                        <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                     <label for="hora">Hora de final</label>
                     <div class='input-group date' id='final'>
                        <input type='text' class="form-control" id="h_f" name="hora_final" />
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

                      <textarea class="form-control" style="height:55px;" id="descripcion" name="descripcion"></textarea>

                  </div>
                  <div class="form-group row">
                    <label class="control-label ">Color</label>

                      <div class="input-group demo2">
                        <input type="text" value="#e01ab5" class="form-control" id="color" name="color"/>
                        <span class="input-group-addon"><i></i></span>
                      </div>

                  </div>
         <input type="hidden" name="id" id="id" value="">
                  <div class="form-group row">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file" >
                    <label class="custom-file-label" for="customFile" id="file">Cargar archivo...</label>
                      </div>
                  </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="elimina">Eliminar</button>
          <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
          <input type="submit" class="btn btn-primary " value="Guardar"/>
        </div>
    </form>
      </div>
    </div>
  </div>

@include('thema.footer')

<script>
function edit(id,publico,tipo,titulo,lema,valor,lugar,direccion,invita,descripcion,fecha_inicio,fecha_final,
hora_inicio,hora_final,color,archivo){
    $('#publico').val(publico)
    $('#tipo').val(tipo)
    $('#titulo').val(titulo)
    $('#lema').val(lema)
    $('#invita').val(invita)
    $('#inicio').val(fecha_inicio)
    $('#fin').val(fecha_final)

    $("select option[value"+publico+"]").attr('selected',true)
    $("#valor").val(valor)
    $("#h_i").val(hora_inicio)
    $("#h_f").val(hora_final)
    $("#lugar").val(lugar)
    $("#direccion").val(direccion)
    $("#descripcion").val(descripcion)
    $("#color").val(color)
    $("#file").html(archivo)
    $("#id").val(id)
}
$('#hora_inicio,#final').datetimepicker({
    format: 'hh:mm A'
    });


$("#elimina").on('click',function(){
    var id=$("#id").val()
   $.confirm({
        title: '<h3>Seguro?!</h3>',
        content: '<h5>Si cancela esta donacion no se contara su valor</h5>',
        buttons: {
           confirma:{
               text:'Aceptar',
               btnClass:'btn-danger',
               action:function(){

                  location.href='Drop/'+id
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
</script>
</body>
</html>
3
