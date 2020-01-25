import React, {Component} from 'react';
import url from '../../url'

export default class DashboarBloques extends Component{

    constructor(props){
        super(props);
        this.state={
            totalMiembros:'',
            totalIglesias:'',
            totalPastores:'',
            hombres:'',
            mujeres:'',
            distritos:'',

            error:null
        }
    }

    async componentDidMount(){
        try {
            let rest = await fetch(`${url}/dashboard-content`)
            let data= await rest.json()
            this.setState({
                totalMiembros:data['miembros'],
                totalIglesias:data['iglesias'],
                totalPastores:data['pastores'],
                hombres:data['hombres'],
                mujeres:data['mujeres'],
                distritos:data['distritos']
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

            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i> Miembros</span>
              <div className={this.state.totalMiembros > 0 ? 'green count' : 'text-danger count' }>{this.state.totalMiembros}</div>
              <span className="count_bottom"><i className="green">4% </i> From  Week</span>
            </div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i>Hombres</span>
        <div className="count">{this.state.hombres}</div>
              <span className="count_bottom"><i className="red"><i className="fa fa-sort-desc"></i>12% </i> From this year</span>
            </div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i>Mujeres</span>
        <div className="count">{this.state.mujeres}</div>
              <span className="count_bottom"><i className="green"><i className="fa fa-sort-asc"></i>34% </i> From this year</span>
            </div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-clock-o"></i>Iglesias</span>
        <div className="count">{this.state.totalIglesias}</div>
              <span className="count_bottom"><i className="green"><i className="fa fa-sort-asc"></i>3% </i> From this year</span>
            </div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i> Pastores</span>
        <div className="count green">{this.state.totalPastores}</div>
              <span className="count_bottom"><i className="green"><i className="fa fa-sort-asc"></i>34% </i> From this year</span>
            </div>

            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i> Distritos</span>
        <div className="count">{this.state.distritos}</div>
              <span className="count_bottom"><i className="green"><i className="fa fa-sort-asc"></i>34% </i> From this year</span>
            </div>
        </div>
        );
    }


}


//if (document.getElementById('infobasica')) {
 //   ReactDOM.render(<DashboarBloques />, document.getElementById('infobasica'));
//}
