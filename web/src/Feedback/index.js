import React, { Component } from 'react'
import 'materialize-css/dist/css/materialize.min.css'

class Feedback extends Component {
    submitForm(e) {
        e.preventDefault()

        fetch(process.env.REACT_APP_API_URL + '/message', {
            method: 'POST',
            body: new FormData(e.target)
        })
        .then(res => res.json())
        .then(res => alert(res.message))
        .catch(err => console.error(err))
    }

    render () {
        return (
            <div className="row">
                <div className="col s12 m8 offset-m2 l6 offset-l3">
                    <form onSubmit={this.submitForm} className="mt-5">
                        <h5>Форма обратной связи</h5>
                        <div className="input-field">
                            <input type='text' placeholder='Ваше имя' name='name'/>
                        </div>
                        <div className="input-field">
                            <input type='text' placeholder='Ваш телефон' name='phone'/>
                        </div>
                        <button className="btn darken-1 waves-effect" type='submit'>Связаться</button>
                    </form>
                </div>
            </div>
        )
    }
}

export default Feedback
