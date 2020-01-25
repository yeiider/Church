import React, { Component } from 'react';



const FormDistrito = ({pastores , token}) => (
    <div>
    <div className="clearfix"></div>
            <div className="row">
              <div className="col-md-12 col-sm-12 ">
                <div className="x_panel">
                  <div className="x_title">
                     <h2>Registro Distritos </h2>
                    <ul className="nav navbar-right panel_toolbox">
                      <li><a className="collapse-link"><i className="fa fa-chevron-up"></i></a>
                      </li>
                      <li className="dropdown">
                        <a href="#" className="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i className="fa fa-wrench"></i></a>
                        <ul className="dropdown-menu" role="menu">
                          <li><a className="dropdown-item" href="#">Settings 1</a>
                          </li>
                          <li><a className="dropdown-item" href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a className="close-link"><i className="fa fa-close"></i></a>
                      </li>


                    </ul>
                    <div className="clearfix"></div>
                  </div>
                  <div className="x_content">
                    <br />
                    <form id="demo-form2"  className="form-horizontal form-label-left" action="crear/set" method="post">

                      <div className="item form-group">
                        <label className="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span className="required">*</span>
                        </label>
                        <input type="hidden" name="_token" value={token}></input>
                        <div className="col-md-6 col-sm-6 ">
                          <input type="text" id="first-name" name="nombre" required="required" className="form-control " />
                        </div>
                      </div>

                      <div className="item form-group">
                        <label className="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Coordinador <span className="required">*</span>
                        </label>
                        <div className="col-md-6 col-sm-6 ">
                          <select name="coordinador" className="select2-label form-control" id="select">
                          {pastores.map((pastor)=>(
                              <option key={pastor.id}>{pastor.nombre}</option>
                          ))}
                          </select>
                        </div>
                      </div>
                      <div className="item from-group">
                      <button type="submit" className="btn btn-success">Submit</button>
                      </div>


                    </form>
                  </div>
                </div>
              </div>
  </div>
  </div>


)

export default FormDistrito
