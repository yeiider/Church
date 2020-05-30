<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/chossen/chosen.css')}}">
<title>{{$activity->lema}}</title>
<style>
    * {
          box-sizing: border-box;

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
 .radio{
        border-radius: 15px;
        padding: 5px;
        height: 100%;
        position: absolute;
        color: white;
        background-color:cadetblue;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
    }
</style>
</head>
<body>



        <div class="row">
            <div class="col-sm-4 col-md-4   radio" >
             <h3 class="pl-3">Contacto</h3>
            <div class="pl-3">{{$activity->iglesia->telefono}}</div>
              <div class="pl-3"><p>{{$activity->iglesia->email}}</p></div>
              <div class="pl-3">{{$activity->iglesia->municipio}}</div>
              <div class="pl-3 mb-3">{{$activity->iglesia->direccion}}</div>
              <div class="pl-3"><h3 class="pl-3">IGLESIA</h3> </div>
               <div class="pl-3 mb-3">{{$activity->iglesia->nombre}}</div>
                <h3 class="pl-3 ">Pastor a cargo</h3>
              <div class="pl-3">{{$activity->iglesia->pastor->nombre}}</div>


            </div>

            <div class="col-sm-8 col-md-8 radio  text-black" style="background-color:white; color:black ">
              <div class="di" style="padding:9px">
                <h5><em><strong>Lema</strong></em></h5>
              <h3 class="lemaA mb-3">{{$activity->lema}}</h3>

                <h5><em><strong>Introduccion</strong></em></h5>
                <P class="descripcion">{{$activity->descripcion}}</P>

                <h5><em><strong>Lugar</strong></em></h5>
                <P class="lugar">{{$activity->lugar}}</P>
                <h5><em><strong>Hora y Fecha</strong></em></h5>
                <P class="fecha">{{$activity->fecha_inicio .' '. 'Hora: '.$activity->hora_inicio}}</P>
                <h5><em><strong>Valor</strong></em></h5>
                <P class="valor">{{$activity->valor}}</P>
                <h5><em><strong>Invita</strong></em></h5>
                <P class="invita">{{$activity->invita}}</P>
            </div>
            </div>


      </div>
</body>
</html>
