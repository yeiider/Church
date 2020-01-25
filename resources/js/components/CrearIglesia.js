import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import Menu from './bloques/Menu'
import MenuTop from './bloques/Menutop'
import Form from './formularios/iglesia'
import url from '../url'
export default class CreateIglesia extends Component {

    constructor(props){
        super(props)

        this.state={
          distritos:[],
          token:''
        }
    }

   async componentDidMount(){
        try {
            let rest = await fetch(`${url}/Distritos/info`)
            let data= await rest.json()
            this.setState({
            distritos:data.distritos,
            token:data.token
            })
            console.log(data)

        } catch (error) {
            this.setState({
                error
            })
        }

    }

    render(){
        const style={
            display: 'inline-block'
        }
        return(
    <div>
       <Form distritos={this.state.distritos} token={this.state.token} />
        </div>

        );
    }
}
if (document.getElementById('add-iglesia')) {
    ReactDOM.render(<CreateIglesia />, document.getElementById('add-iglesia'));
}
