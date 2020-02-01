@include('../thema.header')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="page-title">
            <div class="title_left">
              <h3>Ofrenda</h3>
            </div>


          </div>
        </div>


      <div class="clearfix">
       <div class="container">
        <div class="row">
          <div class="col-sm-4 col-md-4">
          <form action="{{route('ofrenda-add')}}" method="post">

            <div class="form-group row">
                <label class="col-form-label label-align" for="ofrenda">Valor<span class="required">*</span>
                </label>

                <input type="text" id="ofrenda" name="ofrenda" required class="form-control " />

              </div>
              <div class="form-group row">
                <label class="col-form-label label-align" for="ofrenda">Tipo de Ofrenda<span class="required">*</span>
                </label>
              <select name="tipo" id="tipo" required class="form-control">
                  <option value="">Seleccione</option>
                  <option value="1">Ofrenda General</option>
                  <option value="2">Ofrenda Pro-Templo</option>
                  <option value="3">Ofrenda Voluntaria</option>
                  <option value="4">Otro Tipo de Ofrenda</option>
              </select>
              </div>
              <div class="form-group row">
                <label class="col-form-label label-align" for="nota">Nota<span class="required">*</span>
                </label>

                <textarea name="nota" id="nota" cols="3" rows="3" class="form-control"></textarea>

              </div>
              <div class="form-group row">
               <button type="submit" class="btn btn-success" id="guardar" name="guardar">Registrar</button>
              </div>

              {{ csrf_field() }}
           </form>
          </div>
          <div class="col-sm-8 col-md-8">
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
<?php
    $total=0;
    foreach($ofrendas as $p){
        $total+=$p->ofrenda;
    }
    ?>
    <h3>Total de Ofrendas : <strong style="color:red">${{number_format($total,2,',','.')}}</strong></h3>
<table class="table-bordered table-hover table" id="mytable">
    <thead>
        <tr>
            <th>Tipo de Ofrenda</th>
            <th>Fecha</th>
            <th>Nota</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ofrendas as $o)
        <tr>
        <td>@switch($o->tipo_ofrenda)
            @case(1)
            Ofrenda General
                @break
            @case(2)
            Ofrenda Pro-Templo
                @break
            @case(3)
            Ofrenda Voluntaria
                @break
            @case(4)
            Otros
                @break

            @default

        @endswitch</td>
        <td>{{date('d-m-Y',strtotime($o->created_at))}}</td>
        <td>{{$o->nota}}</td>
        <td>${{number_format($o->ofrenda,2,',','.')}}</td>
        </tr>
        @endforeach

    </tbody>
</table>
          </div>
        </div>
       </div>
      </div>


    </div>
  </div>
  @include('../thema.footer')
  <script>
$('#mytable').dataTable();
$('#ofrenda').on('input',function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });
  </script>
</body>
</html>
