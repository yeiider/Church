<div class="col-md-3 left_col" >
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border:0">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>
            </span></a>
      </div>

      <div class="clearfix"></div>


      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('assets/img/perfiles/'. auth()->user()->logo)}}" alt="" class="img-circle profile_img"/>
        </div>
        <div class="profile_info">
          <span>Biemvenido,</span>
        <h2>{{auth()->user()->nombre}}</h2>
        </div>
      </div>


      <br />

      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a href={{url('/')}}><i class="fa fa-dashboard"></i> Dashboard </a>
            </li>
            <li><a><i class="fa fa-home"></i> Iglesias <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href={{route('distritos')}}>Lista de Distritos</a></li>
                <li><a href={{route('add-distrito')}}>Añadir Distrito</a></li>
                <li><a href="form_buttons.html">Asignar Coordinador</a></li>
                <li><a href={{route('iglesias')}}>Lista Iglesias</a></li>
                <li><a href={{route('add-iglesia')}}>Añadir Iglesia</a></li>
                <li><a href="form_upload.html">Asignar Pastor</a></li>

              </ul>
            </li>
            <li><a><i class="fa fa-user"></i>Pastores<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="general_elements.html">Lista de Pastores</a></li>
                <li><a href={{route('add-pastor')}}>Add Pastor</a></li>
                <li><a href="typography.html">Typography</a></li>
                <li><a href="icons.html">Icons</a></li>
                <li><a href="glyphicons.html">Glyphicons</a></li>
                <li><a href="widgets.html">Widgets</a></li>
                <li><a href="invoice.html">Invoice</a></li>
                <li><a href="inbox.html">Inbox</a></li>
                <li><a href="calendar.html">Calendar</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-users"></i> Miembros <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{route('miembros')}}">Lista de Miembros</a></li>
                <li><a href={{route('add-miembro')}}>Add Miembro</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-gears"></i> Diezmos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="chartjs2.html">Chart JS2</a></li>
                  <li><a href="{{route('diezmo-add')}}">Ingresar Diezmos</a></li>
                  <li><a href="morisjs.html">Moris JS</a></li>
                  <li><a href="echarts.html">ECharts</a></li>
                  <li><a href="other_charts.html">Other Charts</a></li>
                </ul>
              </li>

            <li><a><i class="fa fa-bar-chart-o"></i> Informes <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="chartjs.html">Chart JS</a></li>
                <li><a href="chartjs2.html">Chart JS2</a></li>
                <li><a href="morisjs.html">Moris JS</a></li>
                <li><a href="echarts.html">ECharts</a></li>
                <li><a href="other_charts.html">Other Charts</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-clone"></i>Inventario <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                <li><a href="fixed_footer.html">Fixed Footer</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-calendar"></i>Actividades <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                  <li><a href="fixed_footer.html">Fixed Footer</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-inbox"></i>Mensajes <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                  <li><a href="fixed_footer.html">Fixed Footer</a></li>
                </ul>
              </li>
          </ul>
        </div>



      </div>


      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('logaut')}}">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>

    </div>
</div>
