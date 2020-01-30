@include('../thema.header')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Informe Diario <small>Cajas</small></h3>
        </div>


      </div>
      <div class="clearfix"></div>

      <div class="col-md-6 col-sm-6  ">
        <div class="x_panel">
          <div class="x_title">

             <select class="select-chossen form-control col-xs-6 col-md-6" style="border-radius:15px">
                 <option value=""></option>
                 @foreach ($data['meses'] as $m)
             <option value="{{$m}}">{{$m}}</option>
                 @endforeach
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
           <table class="table table-hover">
               <thead>
                   <tr>
                       <th>Dia</th>
                       <th>Ingreso</th>
                       <th>Egreso</th>
                       <th>Valor</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($data['caja'] as $caja)
                   <tr>
                    <td>{{date('D,M,Y')}}</td>
                    <td><span class="text-success"><strong>${{number_format($caja->ingreso,0,',','.')}}</strong></span></td>
                        <td><span class="text-danger"><strong>${{number_format($caja->egreso,0,',','.')}}</strong></span></td>
                    <td><span class="text-info"><strong>${{ number_format($caja->ingreso-$caja->egresos,0,',','.')}}</strong></span></td>

                    </tr>
                   @endforeach

               </tbody>
           </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('../thema.footer')
</body>
  </html>
