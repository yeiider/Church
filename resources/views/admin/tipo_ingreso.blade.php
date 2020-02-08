@include('thema.header')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3></h3>
        </div>


      </div>

      <div class="clearfix">
        <div class="row">
        <div class="col-sm-4 col-md-4" style="margin:letf:10px">
        <form action="{{route('tipo_set')}}" method="POST">
                 <div class="form-group row">
                     <label for="ingreso">Codigo *</label>
                     <input type="text" name="codigo" required class="form-control" id="ingreso">
                 </div>
                 {{ csrf_field() }}
                 <div class="form-group row">
                    <label for="ingreso">Concepto</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
                <div class="form-group row">
                  <input type="submit" class="btn btn-primary form-control" >
                </div>
             </form>
        </div>
        <div class="col-sm-1 col-md-1"></div>
        <div class="col-sm-6 col-md-6">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('success')}}!</strong></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button></div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Codio</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipo as $t)
                        <tr>
                        <td>{{$t->codigo}}</td>
                        <td>{{$t->nombre}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


      </div>
    </div>


    </div>
  </div>


@include('thema.footer')

<script>
$('#ingreso').on('input',function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });
</script>
</body>
</html>
