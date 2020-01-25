import React, { Component } from 'react';
import url from '../../url'

export default class DistritoChart extends Component{

    constructor(props){
        super(props)
        this.state={
            chart:'',
            error:null
        }
    }


    async componentDidMount(){
        try {
            let rest = await fetch(`${url}/dashboard-chart`)
            let data= await rest.json()
            this.setState({

            })
        } catch (error) {
            this.setState({
                error
            })
        }
    }


    render(){

        const style={
            height:'230px'
        }
        return(
            <div>
                <div className=" col-md-10 col-sm-10">
                <div className="col-md-12 col-sm-12 ">
                  <div className="x_panel">
                    <div className="x_title">
                      <h2>Visitors location <small>geo-presentation</small></h2>
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

                      <div className="dashboard-widget-content">


                        <div className="col-md-4 hidden-small">
                          <h2 className="line_30">Distritos</h2>

                          <table className="countries_list">
                            <tbody>
                              <tr>
                                <td>United States</td>
                                <td className="fs15 fw700 text-right">33%</td>
                              </tr>
                              <tr>
                                <td>France</td>
                                <td className="fs15 fw700 text-right">27%</td>
                              </tr>
                              <tr>
                                <td>Germany</td>
                                <td className="fs15 fw700 text-right">16%</td>
                              </tr>
                              <tr>
                                <td>Spain</td>
                                <td className="fs15 fw700 text-right">11%</td>
                              </tr>
                              <tr>
                                <td>Britain</td>
                                <td className="fs15 fw700 text-right">10%</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div className="col-md-8 col-sm-8">
                        <canvas id="pieChart" height="" width=""></canvas>
                        </div>


                        </div>


                    </div>
                  </div>
                </div>
                </div>
            </div>
        );
    }
}
