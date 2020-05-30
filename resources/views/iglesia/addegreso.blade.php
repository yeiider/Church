@include('thema.header')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3></h3>
        </div>


      </div>

      <div class="clearfix">
<button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Añadir Egreso</button>
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
                @foreach ($data['egreso'] as $i)
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
                <td>{{date('d-m-Y H:i',strtotime($i->created_at))}}</td>
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
                    <div class="dropdown-divider"></div>
                   @if(!empty($i->file))
                <a href="{{asset('assets/iglesias/'.str_replace(" ","-",$i->iglesia->nombre).'/comprobantes/egresos').'/'.$i->file}}" target="_blank" class="dropdown-item">Descargar <span class="fa fa-file-pdf-o"></span></a>
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
          <h4 class="modal-title" id="myModalLabel">Registrar  Egreso</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('crear-egreso')}}" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="egreso">Tipo Egreso</label>
                  <select name="tipo" id="egreso" class="chossen-select form-control" >
                      @foreach ($data['cuentas'] as $t)
                  <option value="{{$t->id}}">{{$t->nombre}}</option>
                      @endforeach
                  </select>
                </div>
                {{ csrf_field() }}
                <div class="form-group row">
                   <label for="valor">Valor</label>
                   <input type="text" name="valor" id="valor" class="form-control">
               </div>
               <div class="form-group row">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="file" >
                <label class="custom-file-label" for="customFile">Abjuntar Comprobante...</label>
                  </div>
            </div>
               <div class="form-group row">
                 <input type="submit" class="btn btn-primary form-control" value="Registrar">
               </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>

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

$(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>
</html>
