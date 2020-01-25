import React, { Component } from 'react'
import url from '../../url'

export default class SelectPastorChosen extends Component{
    constructor(props){
        super(props)
        this.state={
            pastores:[],
            error:null
        }
    }

    async componentDidMount(){
        try {
            let response = await fetch(`${url}/Pastor/get`)
            let data = await response.json()
            this.setState({
            pastores:data
            })
            console.log(this.state.pastores)

        } catch (error) {

        }
    }

    render(){
        return(
            <div>
                <select name="pastor" className="form-control" id="pastor">
                    <option>seleccione</option>
                    {this.state.pastores.map((pastor)=>(
                    <option value={pastor.id} key={pastor.id}>{pastor.nombre} {pastor.apellido}</option>

                    ))}
                </select>
            </div>
        )
    }


}
