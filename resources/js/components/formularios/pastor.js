import React, { Component } from 'react'
import SelectPastor from '../bloques/municipioSelect'
import Pais from '../formularios/Pais'
import Ciudad from '../formularios/Ciudad'
import Municipio from '../formularios/Municipio'
import url from '../../url'


const FormPastor=({distritos , token}) =>(
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
                <form className="form-horizontal form-label-left" action={`${url}/Pastor/create`} method="post">
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
                      <input type="date" className="form-control has-feedback-left" id="single_cal3"  name="fecha" />

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
                      <label className="col-form-label col-md-3 col-sm-3 label-align" for="edad">Casado<span className="required">*</span>
                      </label>
                      <div className="col-md-6 col-sm-6 ">
                        <select id="casado" name="casado" required="required" className="form-control " >
                            <option>Seleccione</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
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
                      <input type="hidden" name="_token" value={token}></input>
                        <input name="direccion" type="text" className="form-control" required id="direccion"/>
                      </div>
                    </div>
                    <div className="form-group row">
                      <label for="telefono" className="col-form-label col-md-3 col-sm-3 label-align">Telefono</label>
                      <div className="col-md-6 col-sm-6 ">
                      <input type="hidden" name="_token" value={token}></input>
                        <input name="telefono" type="text" className="form-control" required id="telefono"/>
                      </div>
                    </div>


                    <div className="form-group row">
                      <label for="distrito" className="col-form-label col-md-3 col-sm-3 label-align">Distrito</label>
                      <div className="col-md-6 col-sm-6 ">
                        <select name="distrito" required className="select form-control" id="distrito">
                        <option>Seleccione</option>
                          {distritos.map((d)=>(
                              <option key={d.id} value={d.id}>{d.nombre}</option>
                          ))}
                        </select>
                      </div>
                    </div>




                </div>
                <div id="step-3">
                <h2 className="StepTitle">Step 3 Content</h2>
                <div className="form-group row">
                      <label className="col-form-label col-md-3 col-sm-3 label-align" for="afp">Fondo de Pencion<span className="required">*</span>
                      </label>
                      <div className="col-md-6 col-sm-6 ">
                        <select id="afp" name="afp" required="required" className="form-control " >
                            <option>Seleccione</option>
                            <option value="Proteccion S.A.">Protección S.A.</option>
                            <option value="Porvenir S.A.">Porvenir S.A.</option>
                            <option value="Colfondos Pensiones y Cesantias">Colfondos Pensiones y Cesantías</option>
                            <option value="Old Mutual">Old Mutual</option>

                        </select>

                      </div>
                    </div>
                    <div className="form-group row">
                      <label className="col-form-label col-md-3 col-sm-3 label-align" for="eps">E.P.S.<span className="required">*</span>
                      </label>
                      <div className="col-md-6 col-sm-6 ">
                        <select id="eps" name="eps" required="required" className="form-control " >
                            <option>Seleccione</option>
                            <option value="AMBUQ">AMBUQ</option>
                            <option value="ASMET SALUD">ASMET SALUD</option>
                            <option value="CAJACOPI">CAJACOPI</option>
                            <option value="COMFACOR">COMFACOR</option>
                            <option value="COMFASUCRE">COMFASUCRE</option>

                            <option value="COMPARTA">COMPARTA</option>
                            <option value="COOSALUD">COOSALUD</option>
                            <option value="EMDISALUD">EMDISALUD</option>
                            <option value="MUTUAL SER">MUTUAL SER</option>
                            <option value="NUEVA EPS SUBSIDIADA">NUEVA EPS SUBSIDIADA</option>
                            <option value="SALUDVIDA">SALUDVIDA</option>
                            <option value="CAFESALUD">CAFESALUD</option>
                            <option value="COOMEVA">COOMEVA</option>
                            <option value="NUEVA EPS CONTRIBUTIVO">NUEVA EPS CONTRIBUTIVO</option>
                            <option value="SALUD TOTAL">SALUD TOTAL</option>
                            <option value="EPS SANITAS">EPS SANITAS</option>
                            <option value="COMFASUCRE">COMFASUCRE</option>

                        </select>

                      </div>
                    </div>
                    <div className="form-group row">
                      <label className="col-form-label col-md-3 col-sm-3 label-align" for="arl">A.R.L<span className="required">*</span>
                      </label>
                      <div className="col-md-6 col-sm-6 ">
                        <select id="arl" name="arl" required="required" className="form-control " >
                            <option>Seleccione</option>
                            <option value="Allianz Colombia">Allianz Colombia</option>
                            <option value="Axa Colpatria Seguros S.A.">Axa Colpatria Seguros S.A.</option>
                            <option value="Colmena Seguros">Colmena Seguros</option>
                            <option value="Compañia de Seguros de Vida Aurora S.A">Compañía de Seguros de Vida Aurora S.A</option>
                            <option value="Seguros Bolívar S.A.">Seguros Bolívar S.A.</option>
                            <option value="Global Seguros">Global Seguros</option>
                            <option value="La Equidad Seguros Generales Organismo Cooperativo">La Equidad Seguros Generales Organismo Cooperativo</option>
                            <option value="Liberty Seguros S.A.">Liberty Seguros S.A.</option>

                            <option value="Positiva Compañía de Seguros S.A.">Positiva Compañía de Seguros S.A.</option>
                            <option value="Seguros ALFA S.A. y Seguros de Vida ALFA S.A.">Seguros ALFA S.A. y Seguros de Vida ALFA S.A.</option>
                            <option value="Seguros Generales Suramericana S.A.">Seguros Generales Suramericana S.A.</option>
                            <option value="SURA S.A.">SURA</option>

                        </select>

                      </div>
                    </div>
                </div>

                <div id="step-4">
                <h2 className="StepTitle">Step 3 Content</h2>
                  <div className="form-group row">
                      <label for="usuario" className="col-form-label col-md-3 col-sm-3 label-align">Nombre de Usuario</label>
                      <div className="col-md-6 col-sm-6 ">
                        <input name="usuario" type="text" className="form-control" required id="usuario"/>
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
                              <button type="submit" className="btn btn-primary" >Completar Registro<span className=" btn btn-success glyphicon glyphicon-floppy-disk
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

export default FormPastor
