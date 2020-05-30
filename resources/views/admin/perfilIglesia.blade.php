@include('../thema.header')

<div class="right_col" role="main">
    <div class="">

      <div class="clearfix">

        <div class="col-sm-12 col-md-12"  >
        <img src="{{asset('assets/iglesias/'.str_replace(" ","-",$data['iglesia']->nombre).'/portadas/'.$data['config']->portada)}}" alt="" style="width:100%; height: 400px;" >

        </div>



            <div class="col-sm-3 col-md-3" style="margin-top:-10%">
                      <div class="row" style="">
                        <a href="#" class="" >
                        <img src="{{asset('assets/iglesias/'.str_replace(" ","-",$data['iglesia']->nombre).'/perfiles/' . $data['iglesia']->logo)}}" style="border-radius:20px;width:100%">
                          </a>
                      </div>


                      <div class="row">

                        <button class="btn btn-success form-control">Enviar Mensaje <span class="glyphicon glyphicon-envelope
                            "></span></button>



                        <button class="btn btn-primary form-control">Ver Adtividades <span class="glyphicon glyphicon-bullhorn

                            "></span></button>

                        <button class="btn btn-warning form-control">Ver Galeria <span class="fa fa-file-image-o

                            "></span></button>
                      </div>
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 " style="margin-top: 5px">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-users"></i>
                          </div>
                          <div class="count">{{$data['total']}}</div>

                          <h3>Total de Miembros</h3>

                        </div>
                      </div>

                     <div class="animated flipInY col-lg-12 col-md-12 col-sm-12  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-male"></i>
                          </div>
                          <div class="count">{{$data['hombres']}}</div>

                          <h3>Hombres en General</h3>

                        </div>
                      </div>
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12  ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-female"></i>
                          </div>
                          <div class="count">{{$data['mujeres']}}</div>

                          <h3>Mujeres en General</h3>

                        </div>
                      </div>

            </div>

            <div class="col-sm-6 col-md-6" style="margin-top:5%">
            <h1>{{ ucwords($data['iglesia']->nombre)}} </h1>
                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info Iglesia</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Info Miembros</a>
                    </li>

                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <style>
        .describe{
            font-size: 20px
        }
        .data{
            font-size: 20px
        }
    </style>
                        <div class="row ">
                            <div class="col-sm-3 describe">
                                Nombre
                            </div>
                            <div class="col-sm-9 data">
                                {{$data['iglesia']->nombre}}
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-sm-3 describe">
                                E-Mail
                            </div>
                            <div class="col-sm-9 data">
                                {{$data['iglesia']->email}}
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-sm-3 describe">
                                Telefono
                            </div>
                            <div class="col-sm-9 data">
                                {{$data['iglesia']->telefono}}
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>

                        <div class="row">
                            <div class="col-sm-3 describe">
                                Direccion
                            </div>
                            <div class="col-sm-9 data">
                                {{$data['iglesia']->direccion}}
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-sm-3 describe">
                                Ciudad
                            </div>
                            <div class="col-sm-9 data">
                                {{$data['iglesia']->municipio}}
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-sm-3 describe">
                                Pastor
                            </div>
                            <div class="col-sm-9 data">
                                {{$data['iglesia']->pastor->nombre . ' ' . $data['iglesia']->pastor->apellido}}
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-sm-3 describe">
                                Informes de Servicios
                            </div>
                            <div class="col-sm-9 data">
                                {{$data['config']->servicios}}
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                   <table class="table">
                       <thead>
                           <th>Categoria</th>
                           <th>Cantidad</th>
                           <th>Porsentaje</th>
                       </thead>
                       <tbody>

                        @if(!$data['total'] == 0)
                           <tr>
                            <td>Caballeros</td>
                            <td>{{$data['caballeros']}}</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{($data['caballeros']/$data['total'])*100}}%" aria-valuenow="{{$data['caballeros']}}" aria-valuemin="0" aria-valuemax="100">{{($data['caballeros']/$data['total'])*100}}%</div>
                                  </div>
                            </td>
                           </tr>
                           <tr>
                               <td>Damas</td>
                           <td>{{$data['damas']}}</td>
                           <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-green" role="progressbar" style="width: {{($data['damas']/$data['total'])*100}}%" aria-valuenow="{{$data['damas']}}" aria-valuemin="0" aria-valuemax="100">{{($data['damas']/$data['total'])*100}}%</div>
                              </div>
                        </td>
                           </tr>
                           <tr>
                            <td>Jovenes</td>
                        <td>{{$data['jovenes']}}</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{($data['jovenes']/$data['total'])*100}}%" aria-valuenow="{{$data['jovenes']}}" aria-valuemin="0" aria-valuemax="100">{{($data['jovenes']/$data['total'])*100}}%</div>
                              </div>
                        </td>
                        </tr>
                        <tr>
                            <td>Semillas</td>
                        <td>{{$data['semillas']}}</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{($data['semillas']/$data['total'])*100}}%" aria-valuenow="{{$data['semillas']}}" aria-valuemin="0" aria-valuemax="100">{{($data['semillas']/$data['total'])*100}}%</div>
                              </div>
                        </td>
                        </tr>
                        @else
                        No hay miembros
                        @endif

                       </tbody>
                   </table>
                    </div>

                  </div>
            </div>

            <div class="col-sm-3 col-md-3" style="margin-top:5%">
                <ul class="list-unstyled timeline">
                    @foreach ($data['iglesia']->actividades as $a)


                    <li>
                      <div class="block">
                        <div class="tags">
                        <a href="{{url("Actividad/view/{$a->id}")}}" target="_blank" class="tag">
                          <span class="">{{$a->tipo}}</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                          <a>{{$a->titulo}}</a>
                                      </h2>
                          <div class="byline">
                          <span>{{date('d-m-Y', strtotime($a->fecha_inicio))}}</span> By <a>{{$a->invita}}</a>
                          </div>
                        <p class="excerpt">{{$a->lema}}</a>
                          </p>
                        </div>
                      </div>
                    </li>
                    @endforeach

                  </ul>
                  <a href="#" class="form-control btn btn-info" >Ver mas</a>
             </div>



      </div>
      <!--EndMain-->

    </div>
  </div>


@include('../thema.footer')

</body>
</html>
