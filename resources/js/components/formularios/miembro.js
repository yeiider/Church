import React, { Component } from 'react'

import Pais from '../formularios/Pais'
import Ciudad from '../formularios/Ciudad'
import Municipio from '../formularios/Municipio'
import url from '../../url'


export default class FormMiembro extends Component{
 constructor(props){
     super(props)

     this.state={
        token:'',
        url:`${url}`,
        diezma:false
     }



 }



 async componentDidMount(){
    try {
        let rest = await fetch(`${url}/Distritos/info`)
        let data= await rest.json()
        this.setState({

        token:data.token
        })


    } catch (error) {
        this.setState({
            error
        })
    }

}

    render(){
        return(
            <div>


  <div className="col-md-12 col-sm-12 ">
  <div className="x_panel">
    <div className="x_title">
      <h2>Form Wizards <small>Sessions</small></h2>
      <ul className="nav navbar-right panel_toolbox">
        <li><a className="collapse-link"><i className="fa fa-chevron-up"></i></a>
        </li>
        <li className="dropdown">
          <a href="#" className="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i className="fa fa-wrench"></i></a>
          <ul className="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a className="close-link"><i className="fa fa-close"></i></a>
        </li>
      </ul>
      <div className="clearfix"></div>
    </div>
    <div className="x_content">



      <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
      <div id="wizard" className="form_wizard wizard_horizontal">
        <ul className="wizard_steps">
          <li>
            <a href="#step-1">
              <span className="step_no">1</span>
              <span className="step_descr">
                                Step 1<br />
                                <small>Step 1 description</small>
                            </span>
            </a>
          </li>
          <li>
            <a href="#step-2">
              <span className="step_no">2</span>
              <span className="step_descr">
                                Step 2<br />
                                <small>Step 2 description</small>
                            </span>
            </a>
          </li>
          <li>
            <a href="#step-3">
              <span className="step_no">3</span>
              <span className="step_descr">
                                Step 3<br />
                                <small>Step 3 description</small>
                            </span>
            </a>
          </li>
          <li>
            <a href="#step-4">
              <span className="step_no">4</span>
              <span className="step_descr">
                                Step 4<br />
                                <small>Step 4 description</small>
                            </span>
            </a>
          </li>
        </ul>
        <form className="form-horizontal form-label-left" action={`${url}/Miembro/Set`} method="post">
        <div id="step-1">


            <div className="form-group row">
              <label className="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span className="required">*</span>
              </label>
              <div className="col-md-6 col-sm-6 ">
                <input type="text" id="first-name" required="required" name="nombre" className="form-control " />
              </div>
            </div>
            <div className="form-group row">
              <label className="col-form-label col-md-3 col-sm-3 label-align" for="apellido">Apellido<span className="required">*</span>
              </label>
              <div className="col-md-6 col-sm-6 ">
                <input type="text" id="apellido" name="apellido" required="required" className="form-control " />
              </div>
            </div>
            <div className="form-group row">
              <label className="col-form-label col-md-3 col-sm-3 label-align" for="cc">Identeficacion<span className="required">*</span>
              </label>
              <div className="col-md-6 col-sm-6 ">
                <input type="text" id="cc" name="cc" required="required" className="form-control " />
              </div>
            </div>
            <div className="form-group row">
              <label className="col-form-label col-md-3 col-sm-3 label-align" for="apellido">Genero<span className="required">*</span>
              </label>
              <div className="col-md-6 col-sm-6 ">
               <select name="genero" id="genero" required className="form-control">
                   <option>Seleccione</option>
                   <option value="1">Hombre</option>
                   <option value="2">Mujer</option>
               </select>
              </div>
            </div>
            <div className="form-group row">
              <label className="col-form-label col-md-3 col-sm-3 label-align" for="edad">Edad<span className="required">*</span>
              </label>
              <div className="col-md-6 col-sm-6 ">
                <input type="number" id="edad" name="edad" required="required" className="form-control " />
              </div>
            </div>
            <div className="form-group row">
              <label for="single_cal3" className="col-form-label col-md-3 col-sm-3 label-align">Fecha de Nacimiento</label>
              <div className="col-md-6 col-sm-6 ">
              <input type="date" className="form-control has-feedback-left" name="fecha"/>

              </div>
            </div>
            <div className="form-group row">
              <label className="col-form-label col-md-3 col-sm-3 label-align" for="hijos">Numero de Hijos<span className="required">*</span>
              </label>
              <div className="col-md-6 col-sm-6 ">
                <input type="number" id="hijos" name="hijos" required="required" className="form-control " />
              </div>
            </div>
            <div className="form-group row">
              <label className="col-form-label col-md-3 col-sm-3 label-align" for="edad">Estado Civil<span className="required">*</span>
              </label>
              <div className="col-md-6 col-sm-6 ">
                <select id="estado_civil" name="estado_civil" required="required" className="form-control " >
                    <option>Seleccione</option>
                    <option value="1">Soltero</option>
                    <option value="2">Casado</option>
                    <option value="3">Union Libre</option>

                </select>

              </div>
            </div>
            <div className="form-group row">
              <label className="col-form-label col-md-3 col-sm-3 label-align" for="etnia">Etnia<span className="required">*</span>
              </label>
              <div className="col-md-6 col-sm-6 ">
                <select id="etnia" name="etnia" required="required" className="form-control " >
                    <option>Seleccione</option>
                    <option value="Blanco">Blanco</option>
                    <option value="Indio">Indigena</option>
                    <option value="Mestizo">Mestizo</option>
                    <option value="Mulato">Mulato</option>
                    <option value="Negro">Afrom</option>
                    <option value="Zambos">Zambos</option>
                </select>

              </div>
            </div>
        </div>
        <div id="step-2">
          <h2 className="StepTitle">Step 2 Content</h2>
          <div className="form-group row">
              <label for="pais" className="col-form-label col-md-3 col-sm-3 label-align">Pais</label>
              <div className="col-md-6 col-sm-6 ">
               <Pais/>
              </div>
            </div>
            <div className="form-group row">
              <label for="ciudad" className="col-form-label col-md-3 col-sm-3 label-align">Departamento</label>
              <div className="col-md-6 col-sm-6 ">
                <Ciudad/>
              </div>
            </div>
            <div className="form-group row">
              <label for="municipio" className="col-form-label col-md-3 col-sm-3 label-align">Municipio</label>
              <div className="col-md-6 col-sm-6 ">
                <Municipio/>
              </div>
            </div>
            <div className="form-group row">
              <label for="direccion" className="col-form-label col-md-3 col-sm-3 label-align">Direccion</label>
              <div className="col-md-6 col-sm-6 ">
              <input type="hidden" name="_token" value={this.state.token}></input>
                <input name="direccion" type="text" className="form-control" required id="direccion"/>
              </div>
            </div>
            <div className="form-group row">
              <label for="telefono" className="col-form-label col-md-3 col-sm-3 label-align">Telefono</label>
              <div className="col-md-6 col-sm-6 ">

                <input name="telefono" type="text" className="form-control" required id="telefono"/>
              </div>
            </div>










        </div>
        <div id="step-3">
        <h2 className="StepTitle">Step 3 Content</h2>
        <div className="form-group row">
              <label for="estrato" className="col-form-label col-md-3 col-sm-3 label-align">Estrato</label>
              <div className="col-md-6 col-sm-6 ">

                <input name="estrato" type="num" className="form-control" required id="estrato"/>
              </div>
            </div>
            <div className="form-group row">
              <label for="estrato" className="col-form-label col-md-3 col-sm-3 label-align">Discapacida</label>
              <div className="col-md-6 col-sm-6 ">

                <select name="discapacidad" id="discapacidad" className="form-control">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                </select>
              </div>
            </div>
            <div className="form-group row">
              <label for="empleado" className="col-form-label col-md-3 col-sm-3 label-align">Empleado</label>
              <div className="col-md-6 col-sm-6 ">

                <select name="empleado" id="empleado" className="form-control">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                </select>
              </div>
            </div>
            <div className="form-group row">
              <label for="diezma" className="col-form-label col-md-3 col-sm-3 label-align">Diezma</label>
              <div className="col-md-6 col-sm-6 ">

                <select name="diezma" id="diezma" className="form-control">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                </select>
              </div>
            </div>




        </div>

        <div id="step-4">
        <h2 className="StepTitle">Step 3 Content</h2>
        <div className="form-group row">
              <label for="single_cal1" className="col-form-label col-md-3 col-sm-3 label-align">Fecha de Inicio</label>
              <div className="col-md-6 col-sm-6 ">
              <input type="date" className="form-control has-feedback-left" id="single_cal1"  name="fecha_inicio" />

              </div>
            </div>
            <div className="form-group row">
              <label for="estado" className="col-form-label col-md-3 col-sm-3 label-align">Estado en la Iglesia</label>
              <div className="col-md-6 col-sm-6 ">

                <select name="estado" id="estado" className="form-control">
                  <option value="0">Bautizado</option>

                  <option value="1">Consolidando</option>
                </select>
              </div>
            </div>

            <div className="form-group row">
              <label for="email" className="col-form-label col-md-3 col-sm-3 label-align">E-mail</label>
              <div className="col-md-6 col-sm-6 ">
                <input name="email" type="text" className="form-control" required id="email"/>
              </div>
            </div>

            <div className="form-group row">
                    <div className="col-sm-5 col-md-5"></div>
                    <div className="col-md-6 col-sm-6 ">
                      <button type="submit" className="btn btn-primary" >Completar Registro <span className=" btn btn-success glyphicon glyphicon-floppy-disk
"></span></button>
                    </div>
                  </div>
         </div>

        </form>
      </div>

</div>


</div>
</div>
</div>
        )
    }

}


