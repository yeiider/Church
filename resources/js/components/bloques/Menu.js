import React ,{Component} from 'react';
import ReactDOM from 'react-dom';
import url from '../../url';

export default class Menu extends Component{

  constructor(props){
    super();

    this.state={
     nombreUsuario:'',
     url:`${url}`,

     error:null
    }
  }

  async componentDidMount(){
    try {
        let rest = await fetch(`${url}/dashboard-content`)
        let data= await rest.json()
        this.setState({
        nombreUsuario:data['usuario']
        })
    } catch (error) {
        this.setState({
            error
        })
    }
}
render(){
    return (
        <div className="col-md-3 left_col" >
        <div className="left_col scroll-view">
          <div className="navbar nav_title" style={{border: 0}}>
            <a href="index.html" className="site_title"><i className="fa fa-paw"></i> <span>{this.state.time}</span></a>
          </div>

          <div className="clearfix"></div>


          <div className="profile clearfix">
            <div className="profile_pic">
              <img src="images/img.jpg" alt="..." className="img-circle profile_img"/>
            </div>
            <div className="profile_info">
              <span>Biemvenido,</span>
              <h2>{this.state.nombreUsuario}</h2>
            </div>
          </div>


          <br />

          <div id="sidebar-menu" className="main_menu_side hidden-print main_menu">
            <div className="menu_section">
              <h3>General</h3>
              <ul className="nav side-menu">
                <li><a href="../home"><i className="fa fa-home"></i> Dashboard </a>




                </li>
                <li><a><i className="fa fa-edit"></i> Iglesias <span className="fa fa-chevron-down"></span></a>
                  <ul className="nav child_menu">
                    <li><a href={this.state.url}>Lista de Distritos</a></li>
                    <li><a href={this.state.url + "/Distrito/crear"}>Añadir Distrito</a></li>
                    <li><a href="form_buttons.html">Asignar Coordinador</a></li>
                    <li><a href="form_validation.html">Lista Iglesias</a></li>
                    <li><a href={this.state.url+"/Iglesia/crear"}>Añadir Iglesia</a></li>
                    <li><a href="form_upload.html">Asignar Pastor</a></li>

                  </ul>
                </li>
                <li><a><i className="fa fa-desktop"></i>Pastores<span className="fa fa-chevron-down"></span></a>
                  <ul className="nav child_menu">
                    <li><a href="general_elements.html">Lista de Pastores</a></li>
                    <li><a href={this.state.url + '/Pastor/crear'}>Add Pastor</a></li>
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="icons.html">Icons</a></li>
                    <li><a href="glyphicons.html">Glyphicons</a></li>
                    <li><a href="widgets.html">Widgets</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                    <li><a href="inbox.html">Inbox</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                  </ul>
                </li>
                <li><a><i className="fa fa-table"></i> Miembros <span className="fa fa-chevron-down"></span></a>
                  <ul className="nav child_menu">
                    <li><a href="tables.html">Lista de Miembros</a></li>
                    <li><a href={this.state.url + '/Miembro/crear'}>Add Miembro</a></li>
                  </ul>
                </li>
                <li><a><i className="fa fa-bar-chart-o"></i> Data Presentation <span className="fa fa-chevron-down"></span></a>
                  <ul className="nav child_menu">
                    <li><a href="chartjs.html">Chart JS</a></li>
                    <li><a href="chartjs2.html">Chart JS2</a></li>
                    <li><a href="morisjs.html">Moris JS</a></li>
                    <li><a href="echarts.html">ECharts</a></li>
                    <li><a href="other_charts.html">Other Charts</a></li>
                  </ul>
                </li>
                <li><a><i className="fa fa-clone"></i>Layouts <span className="fa fa-chevron-down"></span></a>
                  <ul className="nav child_menu">
                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                    <li><a href="fixed_footer.html">Fixed Footer</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div className="menu_section">
              <h3>Live On</h3>
              <ul className="nav side-menu">
                <li><a><i className="fa fa-bug"></i> Additional Pages <span className="fa fa-chevron-down"></span></a>
                  <ul className="nav child_menu">
                    <li><a href="e_commerce.html">E-commerce</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="project_detail.html">Project Detail</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="profile.html">Profile</a></li>
                  </ul>
                </li>
                <li><a><i className="fa fa-windows"></i> Extras <span className="fa fa-chevron-down"></span></a>
                  <ul className="nav child_menu">
                    <li><a href="page_403.html">403 Error</a></li>
                    <li><a href="page_404.html">404 Error</a></li>
                    <li><a href="page_500.html">500 Error</a></li>
                    <li><a href="plain_page.html">Plain Page</a></li>
                    <li><a href="login.html">Login Page</a></li>
                    <li><a href="pricing_tables.html">Pricing Tables</a></li>
                  </ul>
                </li>
                <li><a><i className="fa fa-sitemap"></i> Multilevel Menu <span className="fa fa-chevron-down"></span></a>
                  <ul className="nav child_menu">
                      <li><a href="#level1_1"> One</a>
                      <li><a>Level One<span className="fa fa-chevron-down"></span></a>
                        <ul className="nav child_menu">
                          <li className="sub_menu"><a href="level2.html">Level Two</a>
                          </li>
                          <li><a href="#level2_1">Level Two</a>
                          </li>
                          <li><a href="#level2_2">Level Two</a>
                          </li>
                        </ul>
                      </li>
                      <li><a href="#level1_2">Level One</a>
                      </li>
                      </li>
                  </ul>
                </li>
                <li><a href='#' onClick={e => e.preventDefault()}><i className="fa fa-laptop"></i> Landing Page <span className="label label-success pull-right">Coming Soon</span></a></li>
              </ul>
            </div>

          </div>


          <div className="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span className="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span className="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span className="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span className="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>

        </div>
      </div>
       );
   }

}

if (document.getElementById('menu')) {
    ReactDOM.render(<Menu />, document.getElementById('menu'));
}
