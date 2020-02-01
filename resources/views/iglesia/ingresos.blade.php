@include('../thema.header')
<div class="right_col" role="main">
    <div class="">
        <div class="row" style="display:inline-block">
        <div class="top_tiles">

        </div>
        </div>


      <div class="clearfix">
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
        <div class="row" id="contaiber">


                   <!-- <form class="" id="form">
                        <div class="form-group">
                            <label for="">Seleccione una fecha</label>
                      <fieldset>
                        <div class="control-group ">
                          <div class="controls">
                            <div class="input-prepend input-group">
                              <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                            <input type="text" style="width: 200px" name="fecha" id="fecha" class="form-control" value="{{date('d-m-Y')}}" />
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                    </form>-->
                    <div class="row col-sm-4 col-md-4">
                        <div class="form-group">
                            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                        </div>

                    </div>
                  <input type="hidden" name="fecha" id="fecha">

                </div>
                <style>
                .circle{
                   background-color: #17B6B4;
                   border-radius: 12px;
                   color: #fff;
                   font-size: 25px;
                   padding: 3px;
                   padding-left: 5px;
                   padding-right: 5px;

                }
                </style>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-external-link"></i></div>
                      <div class="count" id="diezmos"></div>
                      <h3>Diezmos <span class="circle" id="td"></span></h3>

                    <p>Cantidad de Diezmos </p>
                    </div>
                  </div>
                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                    <div class="tile-stats">
                     <div class="icon"><i class="fa fa-calculator"></i></div>
                      <div class="count" id="ofrendas" ></div>
                      <h3>Ofrendas<span class="circle" id="to"></span></h3>
                      <p>Cantidad Ofrendas</p>
                    </div>
                  </div>
                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                      <div class="count" id="ingresos"></div>
                      <h3>Donaciones <span class="circle" id="ti"></span></h3>
                      <p>Cantidad de Otros.</p>
                    </div>
                  </div>
                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-check-square-o"></i></div>
                      <div class="count" id="total"></div>
                    <h3>Total<span class="circle" id="t"></span></h3>
                      <p>total de Ingresos.</p>
                    </div>
                  </div>


                  <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Grafica<small>Ingresos</small></h2>
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
                        <canvas id="grafi"></canvas>
                      </div>
                    </div>
                  </div>

                </div>
      </div>





    </div>
  </div>
  @include('../thema.footer')
  <script>

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})



   /* function init_daterangepicker_reservation() {

        if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
        console.log('init_daterangepicker_reservation');

        $('#reservation').daterangepicker(null, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        });

        $('#reservation-time').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'DD/MM/YYYY h:mm A'
        }
});*/

/*$('#fecha').daterangepicker(null,function(){
    $('#form').submit();
})*/
$(function() {

var start = moment().subtract(29, 'days');
var end = moment();

function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    var fecha= $('#reportrange span').html();
    $.ajax({
        url:"{{route('info-ingresos')}}",
        type:'get',
        data:{'data':fecha},
        dataType:'json',
        success:function(rest){
         $('#diezmos').html(rest.tdiezmos)
         $('#td').html(rest.diezmos)
         $('#ofrendas').html(rest.tofrendas)
         $('#to').html(rest.ofrendas)
         $('#ingresos').html(rest.tingresos)
         $('#ti').html(rest.ingresos)
         $('#total').html(rest.total)
         $('#t').html(rest.t)
        }
    })
}




$('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'Hoy': [moment(), moment()],
       'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Ultimo 7 Dias': [moment().subtract(6, 'days'), moment()],
       'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
       'Este Mes': [moment().startOf('month'), moment().endOf('month')],
       'Mes Pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, cb);

cb(start, end);

});

if ($('#grafi').length ){
    var chartingresos=''
    $.ajax({
     url:"{{route('chart-ingresos')}}",
     dataType:'json',
     async:false,
     success:function(rest){
        chartingresos=JSON.stringify(rest)

     }
    })
    console.log(chartingresos)
			  var ctx = document.getElementById("grafi");
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
                data:JSON.parse(chartingresos),
				/*data: {
				  labels: ["Enero", "Frebrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
				  datasets: [{
					label: '# Diezmos',
					backgroundColor: "#26B99A",
					data: [18000, 46000, 32000, 27500, 43323, 23233, 11223]
				  },{
					label: '# Ofrendas',
					backgroundColor: "#03586A",
					data: [12323, 89087, 76787, 23564, 54543, 34543, 49765]
				  },{
					label: '# Otros',
					backgroundColor: "#17B6B4",
					data: [75765, 123322, 45554, 23454, 90888, 34433, 43223]
				  }]
				},*/

				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  }
					}]
				  }
				}
			  });

			}
</script>

</body>
</html>
