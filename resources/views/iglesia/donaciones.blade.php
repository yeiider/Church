@include('thema.header')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="page-title">
                <?php
    $total=0;
    foreach($donaciones as $p){
        if($p->estado==true)
        $total+=$p->valor;
    }
    ?>
            <div class="title_left">
                <h3>Otros Ingresos : <strong class="text-success">${{number_format($total,2,',','.')}}</strong></h3>
            </div>


          </div>
        </div>


      <div class="clearfix">
       <div class="container">



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

                <script>
                    function modale(nombre,apellido,cc,razon,nit,telefono,ciudad,direccion,valor,nota,email,id){
                      var nombreinput = document.getElementById('nombre');
                      var apellidoinput = document.getElementById('apellido');
                      var ccinput=document.getElementById('cc');
                      var razoninput=document.getElementById('razon');
                      var nitinput=document.getElementById('nit');
                      var telefonoinput = document.getElementById('telefono');
                      var ciudadinput = document.getElementById('ciudad');
                      var direccioninput=document.getElementById('direccion');

                      var valorinput=document.getElementById('valor');
                      var emailinput=document.getElementById('email');
                      var idinput=document.getElementById('id');
                      var notainput=document.getElementById('nota')
                      nombreinput.value=nombre
                      apellidoinput.value=apellido
                      ccinput.value=cc
                      razoninput.value=razon
                      nitinput.value=nit
                      telefonoinput.value=telefono
                      ciudadinput.value=ciudad
                      direccioninput.value=direccion

                      valorinput.value=valor
                      notainput.innerHTML=nota
                      emailinput.value=email
                      idinput.value=id

                    }
                    </script>

<table class="table-bordered table-hover table" id="datatable-buttons">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Cedula</th>
            <th>Razon Social</th>
            <th>N.I.T</th>
            <th>Direccion</th>

            <th>Estado</th>

            <th>Valor</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
@foreach ($donaciones as $d)
<tr>
    <td>{{$d->nombre .' '.$d->apellido}}</td>
    <td>{{$d->identificacion}}</td>
    <td>{{$d->razon_social}}</td>
    <td>{{$d->nit}}</td>
    <td>{{$d->direccion}}</td>

    <td>@switch($d->estado)
        @case(true)
    <h5 class="text-white"><span class="bg-success"  style="padding:3px; border-radius:15px">activa</span></h5>
            @break
        @case(false)
        <h5 class="text-white"><span class="bg-danger"  style="padding:3px; border-radius:15px">cancelada</span></h5>
            @break
        @default

    @endswitch</td>

    <td>${{number_format($d->valor,2,',','.')}}</td>
<td> <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false" style="background-color:white">
    Opcion
  </button>


  <div class="dropdown-menu">
    <a class="dropdown-item" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="modale('{{$d->nombre}}',
    '{{$d->apellido}}','{{$d->identificacion}}','{{$d->razon_social}}','{{$d->nit}}',
    '{{$d->telefono}}','{{$d->ciudad}}','{{$d->direccion}}',
    '{{number_format($d->valor,2,',','.')}}','{{$d->motivo}}','{{$d->email}}','{{$d->id}}'
    )" >Ver</a>

    <div class="dropdown-divider"></div>
    @if($d->estado==true)
    <a class="dropdown-item" href="#" onclick="$.confirm({
        title: '<h3>Seguro?!</h3>',
        content: '<h5>Si cancela esta donacion no se contara su valor</h5>',
        buttons: {
           confirma:{
               text:'Cancelar',
               btnClass:'btn-danger',
               action:function(){

                  location.href='{{url("Donaciones/estado/{$d->id}")}}'
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
    });">Cancelar <span class="glyphicon glyphicon-ban-circle"></span></a>
    @else
    <a class="dropdown-item" href="#" onclick="$.confirm({
        title: '<h3>Seguro?!</h3>',
        content: '<h5>Si Activa esta donacion se contara su valor</h5>',
        buttons: {
           confirma:{
               text:'Cancelar',
               btnClass:'btn-success',
               action:function(){

                  location.href='{{url("Donaciones/estado/{$d->id}")}}'
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
    });">Activar <span class="glyphicon glyphicon-ok-circle"></span></a>
    @endif


  </div></td>
</tr>
@endforeach

    </tbody>
</table>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Informacion detallada de la donacion</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('donacion-update')}}" method="post" id="form">
            <div class="form-group row">
                <div class="col-sm-6 col-md-6">
                    <label for="nombre" class="col-form-label">Nombre del responsable</label>
                    <input type="text" name="nombre" id="nombre" readonly class="form-control">
                </div>
                <div class="col-sm-6 col-md-6">
                   <label for="apellido" class="col-form-label">Apellido del responsable</label>
                    <input type="text" name="apellido" id="apellido" readonly class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 col-md-6">
                    <label for="cc" class="col-form-label">Documento del responsable</label>
                    <input type="text" name="cc" id="cc" readonly class="form-control">
                </div>
                <div class="col-sm-6 col-md-6">
                   <label for="nit" class="col-form-label">N.I.T</label>
                    <input type="text" name="nit" id="nit" readonly class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 col-md-6">
                    <label for="razon" class="col-form-label">Razon Social</label>
                    <input type="text" name="razon" id="razon" readonly class="form-control">
                </div>
                <div class="col-sm-6 col-md-6">
                   <label for="email" class="col-form-label">E-mail</label>
                    <input type="email" name="email" id="email" readonly class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 col-md-6">
                    <label for="ciudad" class="col-form-label">Ciudad de residencia</label>
                    <input type="text" name="ciudad" id="ciudad" readonly class="form-control">
                </div>
                <div class="col-sm-6 col-md-6">
                   <label for="direccion" class="col-form-label">Direccion</label>
                    <input type="text" name="direccion" id="direccion" readonly class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 col-md-6">
                    <label for="telefono" class="col-form-label">Telefono</label>
                    <input type="text" name="telefono" id="telefono" readonly class="form-control">
                </div>
                <div class="col-sm-6 col-md-6">
                    <label for="telefono" class="col-form-label">Valor</label>
                    <input type="text" name="valor" id="valor" readonly class="form-control">
                </div>

            </div>
            <div class="form-group row">

                <input type="hidden" name="id" id="id">

                   <label for="nota" class="col-form-label">Nota</label>
                   <textarea name="nota" id="nota" readonly cols="10" rows="3" class="form-control"></textarea>

            </div>
            {{ csrf_field() }}
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
          <button type="button" class="btn btn-success" id="edit">Editar</button>
        </div>

      </div>
    </div>
  </div>
       </div>
      </div>


    </div>
  </div>
  @include('thema.footer')
  <script>
$('#edit').on('click',function(){
    if($(this).hasClass('true')){
        $('#form').submit()
    }
        $('#nombre ,#apellido,#razon,#nota,#telefono,#email,#direccion,#ciudad,#vaolor,#cc,#nit,#fecha').removeAttr('readonly')
        $(this).text('Guardar').removeClass('btn-success').addClass('btn-primary true')



});

$('#valor ,#cc, #nit, #telefono').on('input',function (){
        this.value = (this.value + '').replace(/[^0-9--]/g, '');
      });
  </script>
</body>
</html>
1000000
