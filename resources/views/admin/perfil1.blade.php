@include('../thema.header')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">

        </div>


      </div>

      <div class="clearfix">
      @if(session('success'))
      <div class="alert alert-success" role="alert">{{session('success')}}</div>
      @endif


      <form action="{{route('update-perfil')}}" class="form" style="margin-top:10%" method="post" >

            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" id="email" name="email" required="required" readonly class="form-control " value="{{$user->email}}"/>
                </div>
              </div>
              {{ csrf_field() }}
            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombres<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <input type="text" id="nombre" name="nombre" required="required" class="form-control " value="{{$user->nombre}}"/>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="apellido">Apellidos<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="apellido" name="apellido" required="required" class="form-control " value="{{$user->apellido}}" />
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="contra">Contraseña Actual<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="password" id="contra" name="contra" class="form-control" />
                </div>
              </div>

              <style>
              .none{
                  display: none
              }
              </style>

            @if($errors->any())
              <div class="alert alert-danger none" id="alert" role="alert">
                @foreach ($errors as $error)
                    {{$error}}
                @endforeach
              </div>
              @endif

              {!! $errors->first('password','<div class="alert alert-danger" role="alert">:message</div>')!!}

              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="contran">Nueva Contraseña<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="password" id="contran" name="contran" class="form-control" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="confirma">Confirmar Contraseña<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="password" id="confirma" name="confirma"  class="form-control" />
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-sm-3 col-md-3"></div>
                  <div class="col-md-6 col-sm-6 ">
                <input type="submit" class="btn btn-primary form-control" name="enviar">
                  </div>
              </div>
         </form>
      </div>


    </div>
  </div>



@include('../thema.footer')

<script type="text/javascript">


</script>
</body>
</html>
