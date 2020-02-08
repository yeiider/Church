@include('thema.header')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3></h3>
        </div>


      </div>

      <div class="clearfix">
<button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Añadir Ingreso</button>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Cuenta</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['ingresos'] as $i)
                    <tr>
                    <td>{{$i->cuenta->cuenta}}</td>
                    <td>{{$i->cuenta->nombre}}</td>
                    <td>
                        @switch($i->estado)

                            @case(true)
                            <h5 class="text-white"><span class="bg-success"  style="padding:1px; border-radius:15px">activo</span></h5>
                                    @break
                                @case(false)
                                <h5 class="text-white"><span class="bg-danger"  style="padding:1px; border-radius:15px">cancelada</span></h5>
                                    @break
                                @default
                                @break


                        @endswitch
                    </td>

                <td>${{number_format($i->valor,0,',','.')}}</td>
                <td>{{date('d-m-Y h:i',strtotime($i->created_at))}}</td>
                <td> <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="background-color:white">
                    Opcion
                  </button>


                  <div class="dropdown-menu">



                    @if($i->estado==true)
                    <a class="dropdown-item" href="#" onclick="$.confirm({
                        title: '<h3>Seguro?!</h3>',
                        content: '<h5>Seguro desea ejecutar esta acción</h5>',
                        buttons: {
                           confirma:{
                               text:'Aceptar',
                               btnClass:'btn-danger',
                               action:function(){

                                  location.href='{{url("Ingresos/Statec/{$i->id}")}}'
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
                        content: '<h5>Seguro desea ejecutar esta acción</h5>',
                        buttons: {
                           confirma:{
                               text:'Aceptar',
                               btnClass:'btn-success',
                               action:function(){

                                  location.href='{{url("Ingresos/Statec/{$i->id}")}}'
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
       <!-- <div class="row">
        <div class="col-sm-4 col-md-4">
        <form action="{{route('crear-otro-ingreso')}}" method="POST">
                 <div class="form-group row">
                     <label for="ingreso">Tipo Ingreso</label>
                   <select name="tipo" id="tipo" class="chossen-select form-control" >
                       @foreach ($data['cuentas'] as $t)
                   <option value="{{$t->id}}">{{$t->nombre}}</option>
                       @endforeach
                   </select>
                 </div>
                 {{ csrf_field() }}
                 <div class="form-group row">
                    <label for="ingreso">Valor</label>
                    <input type="text" name="valor" id="valor" class="form-control">
                </div>
                <div class="form-group row">
                  <input type="submit" class="btn btn-primary form-control" >
                </div>
             </form>
        </div>-->
      </div>
    </div>


    </div>
  </div>

  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Registrar  Ingreso</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('crear-otro-ingreso')}}" method="POST">
                <div class="form-group row">
                    <label for="ingreso">Tipo Ingreso</label>
                  <select name="tipo" id="tipo" class="chossen-select form-control" >
                      @foreach ($data['cuentas'] as $t)
                  <option value="{{$t->id}}">{{$t->nombre}}</option>
                      @endforeach
                  </select>
                </div>
                {{ csrf_field() }}
                <div class="form-group row">
                   <label for="ingreso">Valor</label>
                   <input type="text" name="valor" id="valor" class="form-control">
               </div>
               <div class="form-group row">
                 <input type="submit" class="btn btn-primary form-control" >
               </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
          <button type="button" class="btn btn-success" id="edit">Editar</button>
        </div>

      </div>
    </div>
  </div>


@include('thema.footer')

<script>
$('#valor').on('input',function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });

$('.table').dataTable();
</script>
</body>
</html>
