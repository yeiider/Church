@include('../thema.header')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">

        </div>


      </div>
      <div class="clearfix">

        <div class="col-md-6 col-sm-6" style="margin-top:20px">
            @if(session('error'))
            <div class="alert alert-info alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('error')}}!</strong></p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button></div>
                @endif
            <div class="x_panel">
                <h3>Total Efectivo  <span><strong class="text-success" style="margin-letf:20px">${{number_format($data['caja'],0,',','.')}}</strong></span></h3>
              <div class="x_title">

                 <select class="select-chossen form-control col-xs-6 col-md-6 mes" id="mes" name="mes" style="border-radius:15px">

                     <option value="01">Enero</option>
                     <option value="02">Febrero</option>
                     <option value="04">Abril</option>
                     <option value="05">Mayo</option>
                     <option value="06">Junio</option>
                     <option value="07">Julio</option>
                     <option value="08">Agosto</option>
                     <option value="09">Septiembre</option>
                     <option value="10">Octubre</option>
                     <option value="11">Noviembre</option>
                     <option value="12">Diciembre</option>

                 </select>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
               <table class="table table-hover" id="table">
                   <thead>
                       <tr>
                           <th>Dia</th>
                           <th>Ingreso</th>
                           <th>Egreso</th>
                           <th>Valor</th>
                       </tr>
                   </thead>
                   <tbody id="caja">


                   </tbody>
               </table>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-md-6">
          <h1>Ingresos        <span><strong class="text-success" style="margin-letf:20px">${{number_format($data['diezmos']+$data['ofrendas']+$data['donaciones']+$data['otros'],0,',','.')}}</strong></span></h1>
            <div class="form-group row" style="background-color:white; border-radius:15px; padding:15px">
                <div class="col-sm-8">
                <h3>Diezmos <strong class="text-info">${{number_format($data['diezmos'],2,',','.')}}</strong></h3>
                <h5>Total de Diezmos  <strong style="margin-right:-20px">{{$data['cd']}}</strong></h5>
                </div>
                <div class="col-sm-4">
                 <span class="glyphicon glyphicon-hand-up fa-lg glyphicon-lg fa-5x" style=" width:30; height:10;"></span>
                </div>

            </div>
            <div class="form-group row" style="background-color:white; border-radius:15px; padding:15px">

               <div class="col-sm-8">
                <h3>Ofrendas <strong class="text-info">${{number_format($data['ofrendas'],2,',','.')}}</strong></h3>
                <h5>Total de ofrendas  <strong style="margin-right:-20px">{{$data['co']}}</strong></h5>
            </div>
            <div class="col-sm-4">
             <span class="glyphicon glyphicon-hand-up fa-lg glyphicon-lg fa-5x" style=" width:30; height:10;"></span>
            </div>
            </div>
            <div class="form-group row" style="background-color:white; border-radius:15px; padding:15px">
                <div class="col-sm-8">
                    <h3>Donaciones <strong class="text-info">${{number_format($data['donaciones'],2,',','.')}}</strong></h3>
                    <h5>Total de Donaciones  <strong style="margin-right:-20px">{{$data['ci']}}</strong></h5>
                </div>
                <div class="col-sm-4">
                 <span class="glyphicon glyphicon-hand-up fa-lg glyphicon-lg fa-5x" style=" width:30; height:10;"></span>
                </div>
            </div>
            <div class="form-group row" style="background-color:white; border-radius:15px; padding:15px">
                <div class="col-sm-8">
                    <h3>Otros Ingresos <strong class="text-info">${{number_format($data['otros'],2,',','.')}}</strong></h3>
                    <h5>Total de otros  <strong style="margin-right:-20px">{{$data['cotros']}}</strong></h5>
                </div>
                <div class="col-sm-4">
                 <span class="glyphicon glyphicon-hand-up fa-lg glyphicon-lg fa-5x" style=" width:30; height:10;"></span>
                </div>
            </div>
        <h1>Egresos        <span><strong class="text-danger">${{number_format($data['nomina']+$data['egreso'],0,',','.')}}</strong></span></h1>
            <div class="form-group row" style="background-color:white; border-radius:15px; padding:15px">
                <div class="col-sm-8">
                <h3>Nominas <strong class="text-info">${{number_format($data['nomina'],2,',','.')}}</strong></h3>
                <h5>Total de Nominas  <strong style="margin-right:-20px">{{$data['nomina_c']}}</strong></h5>
                </div>
                <div class="col-sm-4">
                 <span class="glyphicon glyphicon-hand-down fa-lg glyphicon-lg fa-5x" style=" width:30; height:10;"></span>
                </div>
            </div>

            <div class="form-group row" style="background-color:white; border-radius:15px; padding:15px">
                <div class="col-sm-8">
                    <h3>Otros <strong class="text-info">${{number_format($data['egreso'],2,',','.')}} </strong></h3>
                <h5>Total de Otros Egresos <strong style="margin-right:-20px">{{$data['egreso_c']}}</strong></h5>
                </div>
                <div class="col-sm-4">
                 <span class="glyphicon glyphicon-hand-down fa-lg glyphicon-lg fa-5x" style=" width:30; height:10;"></span>
                </div>
            </div>
          </div>
      </div>

    </div>
    </div>

  @include('../thema.footer')
  <script>

   $("#mes option[value="+'{{date('m')}}'+"]").attr("selected",true);
   $("#table").dataTable();

  function changeMes(){
    $.ajax({
       url:"{{route('data-caja')}}",
       data:{'data':$('#mes').val()},

       success:function(rest){
         $('#caja').html(rest);
       }
   })
  }
  changeMes()
   $('#mes').change(function(){
    changeMes()
   })

  </script>
</body>
  </html>
