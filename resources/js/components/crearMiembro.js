import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import Menu from './bloques/Menu'
import MenuTop from './bloques/Menutop'
import FormM from './formularios/miembro'
import url from '../url'

export default class CreateMiembro extends Component {

    constructor(props){
        super(props)

        this.state={
          distritos:[],
          token:'',
          url:`${url}`
        }
    }


    render(){
        const style={
            display: 'inline-block'
        }
        return(
     <div>
       <FormM/>
        </div>




        );
    }
}
if (document.getElementById('add-miembros')) {
    ReactDOM.render(<CreateMiembro />, document.getElementById('add-miembros'));
}
