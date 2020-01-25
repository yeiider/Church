 import React, { Component } from 'react'
 import ReactDOM from 'react-dom'
 import Menu from './bloques/Menu'
 import MenuTop from './bloques/Menutop'
 import Form from './formularios/FormDistrito'
 import url from '../url'

export default class DistritoCrear extends Component {

    constructor(props){
        super(props)
        this.state={
            pastores:[],
            token:''

        }
    }
    async componentDidMount(){
        try {
            let rest = await fetch(`${url}/Distritos/info`)
            let data= await rest.json()
            this.setState({
            pastores:data.pastores,
            token:data.token
            })
            console.log(pastores)
        } catch (error) {
            this.setState({
                error
            })
        }
    }
  render() {
    const style={
        display: 'inline-block'
    }
    return (
        <div>


                <Form pastores={this.state.pastores} token={this.state.token}/>
              </div>



    );
  }
}

if (document.getElementById('distrito')) {
    ReactDOM.render(<DistritoCrear />, document.getElementById('distrito'));
}
