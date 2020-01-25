import React, { Component } from 'react';
import url from '../../url'
export default class InformeMiembros extends Component{

    constructor(props){
        super(props)

        this.state={
           categorias:[],

        }
    }
    async componentDidMount(){
        try {
            let rest = await fetch(`${url}/dashboard-content`)
            let data= await rest.json()
            this.setState({
            categorias:data.categorias


            })
            console.log(this.state.categorias)
        } catch (error) {
            this.setState({
                error
            })
        }
    }
 render(){
     const style ={
         marginTop:'5%',


     }



    return(
        <div>
         <div className='col-md-5 col-sm-5' style={style}>
         <div className="x_panel tile fixed_height_320">
                <div className="x_title">
                  <h2>Informe Miembros</h2>
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
                  <table className=" tile_info table-hover tablet-bordered">
                      <thead>
                          <tr>
                              <th>
                          <div className="col-lg-7 col-md-7 col-sm-7 ">
                          <p className="">Categoria</p>
                        </div></th><th>
                        <div className="col-lg-7 col-md-7 col-sm-7 ">
                          <p className="">Cantidad</p>
                        </div>
                        </th>
                          </tr>
                      </thead>
                      <tbody>
                       { this.state.categorias.map((lista)=>(
                           <tr key={lista.id}>
                        <td>{lista.descripcion}</td>
                       <td>{lista.valor}</td>
                           </tr>
                       )) }

                      </tbody>
                  </table>
                </div>
                </div>
         </div>
        </div>
    );
 }


}

