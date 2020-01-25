@include('../thema.header')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">

        </div>


      </div>

      <div class="clearfix">
  @if(session('success'))
      <div class="alert alert-success" role="alert"><h3>{{session('success')}}</h3></div>
      @endif
        <form action="{{route('update-iglesia')}}" class="form" method="post" enctype="multipart/form-data" >
        <div class="col-xs-2 col-sm-2 col-md-2">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <div class="nav nav-tabs flex-column  bar_tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Informacion Basica</a>
              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Informacion Usuario</a>
              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Configuracion</a>
              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Galeria</a>
            </div>

          </div>

          <div class="col-xs-8 col-sm-8 col-md-8">
            <!-- Tab panes -->

            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nombre" name="nombre" required="required"  class="form-control " value="{{$data['iglesia']->nombre}}"/>
                        </div>
                      </div>
                      {{ csrf_field() }}

                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="telefono">Telefono<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="telefono" name="telefono" required="required" class="form-control " value="{{$data['iglesia']->telefono}}"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="direccion">Direccion<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="direccion" name="direccion" required="required" class="form-control " value="{{$data['iglesia']->direccion}}"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="fecha">Fecha de Creacion<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="date" id="fecha" name="fecha" required="required" class="form-control " value="{{$data['iglesia']->fecha_creacion}}"/>
                        </div>
                      </div>


              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="email" name="email" required="required" readonly class="form-control " value="{{$data['user']->email}}"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="user">Nombres Administrador<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="user" name="user" class="form-control" value="{{$data['user']->nombre}}"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="apellido">Apellidos Administrador<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="apellido" name="apellido" class="form-control" value="{{$data['user']->apellido}}"/>
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
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="servicios">Dias de Servicios<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <textarea name="servicios" id="servicios" cols="30" rows="3" class="form-control">{{$data['config']->servicios}}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="servicios">Imagen de Portada<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="portada" >
                        <label class="custom-file-label" for="customFile">{{$data['config']->portada}}</label>
                          </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="servicios">Imagen de Perfil<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="perfil" >
                        <label class="custom-file-label" for="customFile">{{$data['user']->logo}}</label>
                          </div>
                    </div>
                  </div>

              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...content</div>
            </div>

          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group row">

               <button type="sutmid" class="btn btn-success form-control" name="enviar"  >Guardar <span class="glyphicon glyphicon-floppy-disk
                "></span></button>

              </div>
          </div>

        </form>
    </div>
  </div>
</div>



@include('../thema.footer')

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
</body>
</html>
