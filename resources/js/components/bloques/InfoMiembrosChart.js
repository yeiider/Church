import React, { Component } from 'react';
import url from '../../url'

export default class InfoMiembrosChart extends Component{

    constructor(props){
        super(props)
        this.state={
            categorias:[],
            error:null
        }
    }


    async componentDidMount(){
        try {
            let rest = await fetch(`${url}/dashboard-chart`)
            let data= await rest.json()
            this.setState({
            categorias:data.categorias
            })
        } catch (error) {
            this.setState({
                error
            })
        }
    }


    render(){

        const style={
            margin:{
                margin: '15px 10px 10px 0'
            },
            width:{
                width:'100%'
            },
            width1:{
                width:'37%'
            },

            space:{
                marginTop: '5%'
            }

        }
        return(
            <div>
                  <div className="col-md-5 col-sm-5" style={style.space}>
              <div className="x_panel tile fixed_height_320 overflow_hidden">
                <div className="x_title">
                  <h2>Estadisticas</h2>
                  <ul className="nav navbar-right panel_toolbox">
                    <li><a className="collapse-link"><i className="fa fa-chevron-up"></i></a>
                    </li>
                    <li className="dropdown">
                      <a href="#" className="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i className="fa fa-wrench"></i></a>
                      <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a className="dropdown-item" href="#">Settings 1</a>
                          <a className="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a className="close-link"><i className="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div className="clearfix"></div>
                </div>
                <div className="x_content">
                  <table className="" style={style.width}>
                    <tr>
                      <th style={style.width1}>

                      </th>
                      <th>
                        <div className="col-lg-7 col-md-7 col-sm-7 ">
                          <p className="">Categoria</p>
                        </div>
                        <div className="col-lg-5 col-md-5 col-sm-5 ">
                          <p className="">Porsentaje</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas className="canvasDoughnut" height="140" width="140" style={style.margin}></canvas>
                      </td>
                      <td>
                        <table className="tile_info">
                            {this.state.categorias.map((list) => (
                                <tr key={list.id}>
                                <td>
                                  <p><i className={list.color}></i>{list.descripcion} </p>
                                </td>
                            <td>{list.valor}%</td>
                              </tr>

                            ))}


                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            </div>
        );
    }
}
