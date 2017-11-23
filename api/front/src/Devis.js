import React, { Component } from 'react';
import Axios from 'axios';

class AbstractModel extends Component {
    constructor(props) {
        super(props);
        this.basePath = 'http://localhost:8181/app_dev.php/';
    }
    getElements() {
        Axios.get(this.basePath + 'devis')
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}

class Devis extends AbstractModel {
    render() {
        this.getElements();

        return (
            <div className="Devis">
                <div className="Devis-header">
                    <h2>Devis</h2>
                </div>
            </div>
        );
    }
}

export default Devis;
