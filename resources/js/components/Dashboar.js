import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Menu from './bloques/Menu';
import DashboarBloques from './bloques/DashboardBloques'
import MenuTop from './bloques/Menutop'
import InfoM from './bloques/InformeMiembros'
import Chart from './bloques/InfoMiembrosChart'
import Distrito from './bloques/DistritoChart'

export default class Dashboar extends Component {
    render() {
        const style={
            display: 'inline-block'
        }
        return (
        <div>


        <div className="row" style={style}>
        <div className="tile_count">

            <DashboarBloques />
            </div>


          </div>

          <div className="clearfix">
          <Chart />
          <InfoM />
          <Distrito />
          </div>




      </div>


        );
    }
}

if (document.getElementById('dashboar')) {
    ReactDOM.render(<Dashboar />, document.getElementById('dashboar'));
}
