import React, { Component } from 'react'

import Pais from '../formularios/Pais'
import Ciudad from '../formularios/Ciudad'
import Municipio from '../formularios/Municipio'
import url from '../../url'
import Pastores from '../formularios/SelectPastorChosen'

const FormIglesia=({distritos, token})=>(
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
                      <form className="form-horizontal form-label-left" action={`${url}/send_iglesia`} method="post">
                      <div id="step-1">


                          <div className="form-group row">
                            <label className="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span className="required">*</span>
                            </label>
                            <div className="col-md-6 col-sm-6 ">
                              <input type="text" id="first-name" required="required" name="nombre" className="form-control " />
                            </div>
                          </div>
                          <div className="form-group row">
                            <label className="col-form-label col-md-3 col-sm-3 label-align" for="direccion">Direccion<span className="required">*</span>
                            </label>
                            <div className="col-md-6 col-sm-6 ">
                              <input type="text" id="direccion" name="direccion" required="required" className="form-control " />
                            </div>
                          </div>
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


                      </div>
                      <div id="step-2">
                        <h2 className="StepTitle">Step 2 Content</h2>
                        <div className="form-group row">
                            <label for="middle-name" className="col-form-label col-md-3 col-sm-3 label-align">Fecha de Creacion</label>
                            <div className="col-md-6 col-sm-6 ">
                            <input type="date" className="form-control has-feedback-left"   name="fecha" />

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
                          <div className="form-group row">
                            <label for="pastor" className="col-form-label col-md-3 col-sm-3 label-align">Pastor Encargado</label>
                            <div className="col-md-6 col-sm-6 ">
                              <Pastores/>
                            </div>
                          </div>

                          <div className="form-group row">
                            <label for="telefono" className="col-form-label col-md-3 col-sm-3 label-align">Telefono</label>
                            <div className="col-md-6 col-sm-6 ">
                            <input type="hidden" name="_token" value={token}></input>
                              <input name="telefono" type="text" className="form-control" required id="telefono"/>
                            </div>
                          </div>

                      </div>
                      <div id="step-3">
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

                      </div>

                      <div id="step-4">
                        <h2 className="StepTitle">Finalizar</h2>
                        <div className="form-group row">
                        <div className="col-sm-3 col-md-3"></div>
                        <div className="col-md-6 col-sm-6 ">
                             <p>Una vez pulse el boton de completar registro se le enviara una clave de acceso al correo mencionado

                             </p>
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

export default FormIglesia
