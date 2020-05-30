<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <title>Nomina</title>
    <style>
        * {
          box-sizing: border-box;
          font-size: 12px
        }
        .row::after {
          content: "";
          clear: both;
          display: table;
        }
        [class*="col-"] {
          float: left;
          padding: 15px;
        }
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}
        html {
          font-family: "Lucida Sans", sans-serif;
        }
        .container {
          width: 100%;
          padding-right: 55px;
          padding-left: 55px;
          background-color: white;
          padding-top: 20px;
          padding-bottom: 20px;

        }
        @media (min-width: 576px) {
          .container {
            max-width: 540px;
          }
        }
        @media (min-width: 768px) {
          .container {
            max-width: 720px;
          }
        }
        @media (min-width: 992px) {
          .container {
            max-width: 960px;
          }
        }
        @media (min-width: 1200px) {
          .container {
            max-width: 1140px;
          }
        }
        .container-fluid {
          width: 100%;
          padding-right: 15px;
          padding-left: 15px;
          margin-right: auto;
          margin-left: auto;
        }
        h1, h2, h3, h4, h5, h6 {
          margin-top: 0;
          margin-bottom: 0.5rem;
        }
        p {
          margin-top: 0;
          margin-bottom: 1rem;
        }
        .mt-4,
        .my-4 {
          margin-top: 1.5rem !important;
        }
        .mr-4,
        .mx-4 {
          margin-right: 1.5rem !important;
        }
        .mb-4,
        .my-4 {
          margin-bottom: 1.5rem !important;
        }
        .ml-4,
        .mx-4 {
          margin-left: 1.5rem !important;
        }
        .m-5 {
          margin: 3rem !important;
        }
        .mt-3{
          margin: 1.5rem !important;
        }
        .mt-5,
        .my-5 {
          margin-top: 10rem !important;
        }
        .mr-5,
        .mx-5 {
          margin-right: 3rem !important;
        }
        .mb-5,
        .my-5 {
          margin-bottom: 3rem !important;
        }
        .ml-5,
        .mx-5 {
          margin-left: 3rem !important;
        }
        .p-0 {
          padding: 0 !important;
        }
        .pt-0,
        .py-0 {
          padding-top: 0 !important;
        }
        .pr-0,
        .px-0 {
          padding-right: 0 !important;
        }
        .pb-0,
        .py-0 {
          padding-bottom: 0 !important;
        }
        .pl-0,
        .px-0 {
          padding-left: 0 !important;
        }
        .p-1 {
          padding: 0.25rem !important;
        }
        .pt-1,
        .py-1 {
          padding-top: 0.25rem !important;
        }
        .pr-1,
        .px-1 {
          padding-right: 0.25rem !important;
        }

        .text-red{
          color: red;
        }
        .title{
          font-weight: 600;
          font-style: 25px;
          text-transform: capitalize;
        }
        h2{
          text-transform: capitalize;
        }
        .text{
          margin-top: 10px;
          border-bottom: solid 3px #ccc;
        }
        .bg-info{
          background: #7FEEEB;
        }
        .conte{
          font-weight: 300;
        }
        .p-title{
            text-transform: capitalize;
        }
        body{
            font-family:'proxima_novablack' ,sans-serif
        }
        .center{
            text-align: center;
        }
        .bg-table{
            background-color:whitesmoke;
        }
      </style>
</head>
<body >

<h1 class="center" style="font-size:2em">Iglesia Union Misionera Colombiana</h1>
<h3 class="center" style="font-size:2em">N.I.T.     19222192-12</h3>

        <div class="form-group row">
          <div class="col-sm-6 border">
              <strong>Sucursal: </strong>  {{$nomina->iglesia->nombre}} <br>
              <strong>Lugar: </strong> {{$nomina->iglesia->municipio}} <br>
              <strong>Jefe Inmediato: </strong> {{$nomina->empleado->jefe}} <br>
              <strong>Fecha: </strong> {{date('d-m-Y H:i', strtotime($nomina->created_at))}}
          </div>
          <div class="col-sm-6 border">
            <strong>Empleado: </strong>  {{$nomina->empleado->id .' - ' .$nomina->empleado->nombre .' '.$nomina->empleado->apellido}} <br>
            <strong>Identificacion: </strong> {{number_format($nomina->empleado->identificacion,0,',','.')}} <br>
            <strong>Tipo de contrato: </strong> @switch($nomina->empleado->tipo_contrato)
                @case(1)
                A Término Fijo
                    @break
                @case(2)
                A término indefinido
                @break
                @case(3)
                De Obra o labor
                @break
                @case(4)
                Civil por prestación de servicios
                @break
                @case(5)
                De aprendizaje
                @break
                @case(6)
                Ocasional de trabajo
                @break
                @default

            @endswitch <br>
            <strong>Estado del Contrato: </strong> @switch($nomina->empleado->estado)
                @case(0)
                    Cancelado
                    @break
                @case(1)
                    Activo
                    @break
                @default

            @endswitch
        </div>

        </div>

        <div class="row">
            <table class="table ">
                <tr class="bg-table">
                    <th>Salario</th>
                    <th>Dias</th>
                    <th>Basico</th>
                    <th>Aux.Transporte</th>
                    <th>Devengado</th>
                    <th>4% Salud</th>
                    <th>4% Pension</th>
                    <th>Deducciones</th>

                </tr>
                <tbody>
                    <tr>
                    <td>{{number_format($nomina->empleado->salario,0,',','.')}}</td>
                    <td>{{$nomina->dias}}</td>
                    <td>{{number_format($nomina->basico,0,',','.')}}</td>
                    <td>{{number_format($nomina->aux_transporte,0,',','.')}}</td>
                    <td>{{number_format($nomina->total_devengado,0,',','.')}}</td>
                    <td>{{number_format($nomina->salud,0,',','.')}}</td>
                    <td>{{number_format($nomina->pension,0,',','.')}}</td>
                    <td>{{number_format($nomina->total_deducciones,0,',','.')}}</td>


                    </tr>
                    <tr class="bg-table">
                        <th colspan="7">Neto a Pagar</th>
                    <th>${{number_format($nomina->neto,0,',','.')}}</th>
                    </tr>
                    </tbody>
            </table>

        </div>
        <div class="mt-3">

         <h1 style="font-size:15px"><strong>Nomina generada por: </strong> {{$nomina->elaborado}}</h1>
        </div>

</body>
</html>
