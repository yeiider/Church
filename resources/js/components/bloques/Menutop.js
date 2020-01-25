import React, {Component} from 'react';
import url from '../../url'
 export default class Menutop extends Component{

    constructor(props){
        super(props)
        this.state = {
            nombreUsuario: '',

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
        const style ={
            padding_left:'15px'
        }
        return(
<div>
<div className="top_nav">
          <div className="nav_menu">
              <div className="nav toggle">
                <a id="menu_toggle"><i className="fa fa-bars"></i></a>
              </div>
              <nav className="nav navbar-nav">
              <ul className=" navbar-right">
                <li className="nav-item dropdown open" style={style} >
                  <a href="#" className="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="" />{this.state.nombreUsuario}
                  </a>
                  <div className="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a className="dropdown-item"  href="#"> Profile</a>
                      <a className="dropdown-item"  href="#">
                        <span className="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a className="dropdown-item"  href="#">Help</a>
                    <a className="dropdown-item"  href="Logaut"><i className="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" className="nav-item dropdown open">
                  <a href="#" className="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i className="fa fa-envelope-o"></i>
                    <span className="badge bg-green">6</span>
                  </a>
                  <ul className="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li className="nav-item">
                      <a className="dropdown-item">
                        <span className="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span className="time">3 mins ago</span>
                        </span>
                        <span className="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li className="nav-item">
                      <a className="dropdown-item">
                        <span className="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span className="time">3 mins ago</span>
                        </span>
                        <span className="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li className="nav-item">
                      <a className="dropdown-item">
                        <span className="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span className="time">3 mins ago</span>
                        </span>
                        <span className="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li className="nav-item">
                      <a className="dropdown-item">
                        <span className="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span className="time">3 mins ago</span>
                        </span>
                        <span className="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li className="nav-item">
                      <div className="text-center">
                        <a className="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i className="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
</div>
        );
    }


 }
