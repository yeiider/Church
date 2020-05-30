@include('thema.header')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Inventario</h3>
        </div>


      </div>

      <div class="clearfix">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal">Agregar Articulo</button>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Articulo</th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Valor Unitario</th>
                <th>Imagen</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventario as $item)
                <tr>
                <td>{{$item->articulo}}</td>
                <td>{{$item->marca}}</td>
                <td>{{$item->cantida}}</td>
                <td>${{number_format($item->valor,0,',','.')}}</td>
                @if(!empty($item->imagen))
                <td><div><img src="{{asset('assets/iglesias/'.str_replace(" ","-",$item->iglesia->nombre).'/inventario/'.$item->imagen)}}" alt="" width="70" height="70"></div></td>
                @else
                <td><div><img src="{{asset('assets/img/default.png')}}" width="70" height="70"></div></td>
                @endif
                <td>${{number_format($item->cantida*$item->valor,0,',','.')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
      </div>


    </div>
  </div>


  <div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Registrar  Egreso</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('inventario-crear')}}" method="POST" enctype="multipart/form-data">

                <div class="form-group  row">
                    <label for="nombre">Nombre de Articulo</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="form-group  row">
                    <label for="marca">Marca del Articulo</label>
                    <input type="text" id="marca" name="marca" class="form-control" >
                </div>
                <div class="form-group  row">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control" required>
                </div>
                {{ csrf_field() }}

                <div class="form-group row ">
                    <label for="valor">Valor</label>
                    <input type="text" id="valor" name="valor" class="form-control" required>
                </div>
                <div class="form-group row">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file" accept="image/*" >
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
