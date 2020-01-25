import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import Menu from '../components/bloques/Menu'
import MenuTop from '../components/bloques/Menutop'
import url from '../url'
import Table from '../components/tablas/tablas'

export default class Iglesias extends Component{

    constructor(props){
        super(props)
        this.state={
            table:[]
        }
    }


async componentDidMount(){
    try {
        let rest = await fetch(`${url}/dashboard-iglesia`)
            let data= await rest.json()
            this.setState({
            categorias:data.categorias
            })
    } catch (error) {
        this.setState(
            error
        )
    }
}


    render(){
        const style={
            display: 'inline-block'
        }
        return (
<div>
    <div className="container body">
      <div className="main_container">
          <Menu />
          <MenuTop />

          <div className="right_col" role="main">
          <div className="row" style={style} >
          <div className="tile_count">
           <h2>Iglesias</h2>
          </div>
        </div>
       <Table/>
      </div>
      </div>
       </div>
       </div>

        )
    }

}

if (document.getElementById('iglesias')) {
    ReactDOM.render(<Iglesias />, document.getElementById('iglesias'));
}
