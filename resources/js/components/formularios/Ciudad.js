import React, { Component } from 'react';
import url from '../../url'

export default class Pais extends Component{
    constructor(props){
        super(props)
        this.state={
            ciudades:[{"id_departamento":5,"departamento":"ANTIOQUIA"},{"id_departamento":8,"departamento":"ATL\u00c1NTICO"},{"id_departamento":11,"departamento":"BOGOT\u00c1, D.C."},{"id_departamento":13,"departamento":"BOL\u00cdVAR"},{"id_departamento":15,"departamento":"BOYAC\u00c1"},{"id_departamento":17,"departamento":"CALDAS"},{"id_departamento":18,"departamento":"CAQUET\u00c1"},{"id_departamento":19,"departamento":"CAUCA"},{"id_departamento":20,"departamento":"CESAR"},{"id_departamento":23,"departamento":"C\u00d3RDOBA"},{"id_departamento":25,"departamento":"CUNDINAMARCA"},{"id_departamento":27,"departamento":"CHOC\u00d3"},{"id_departamento":41,"departamento":"HUILA"},{"id_departamento":44,"departamento":"LA GUAJIRA"},{"id_departamento":47,"departamento":"MAGDALENA"},{"id_departamento":50,"departamento":"META"},{"id_departamento":52,"departamento":"NARI\u00d1O"},{"id_departamento":54,"departamento":"NORTE DE SANTANDER"},{"id_departamento":63,"departamento":"QUINDIO"},{"id_departamento":66,"departamento":"RISARALDA"},{"id_departamento":68,"departamento":"SANTANDER"},{"id_departamento":70,"departamento":"SUCRE"},{"id_departamento":73,"departamento":"TOLIMA"},{"id_departamento":76,"departamento":"VALLE DEL CAUCA"},{"id_departamento":81,"departamento":"ARAUCA"},{"id_departamento":85,"departamento":"CASANARE"},{"id_departamento":86,"departamento":"PUTUMAYO"},{"id_departamento":88,"departamento":"ARCHIPI\u00c9LAGO DE SAN ANDR\u00c9S, PROVIDENCIA Y SANTA CATALINA"},{"id_departamento":91,"departamento":"AMAZONAS"},{"id_departamento":94,"departamento":"GUAIN\u00cdA"},{"id_departamento":95,"departamento":"GUAVIARE"},{"id_departamento":97,"departamento":"VAUP\u00c9S"},{"id_departamento":99,"departamento":"VICHADA"}],
            error:null
        }
    }

    async componentDidMount(){
        try {
            let rest = await fetch(`${url}/pais_get`)
            let data= await rest.json()
            this.setState({

            })
        } catch (error) {
            this.setState({
                error
            })
            console.log('hola mundo')
        }
    }

    render(){
        return(
            <div>
            <select data-placeholder="Seleccione Pais" className="chosen-select form-control"  tabindex="4" name="ciudad">
   <option>Seleccione</option>
                {this.state.ciudades.map((ciudad)=>(
            <option key={ciudad.id_departamento} value={ciudad.id_departamento}>{ciudad.departamento}</option>
                ))}
            </select>


          </div>
        )
        }
}

