import React, { Component } from 'react';
import Axios from 'axios';

class Devis extends Component {
    constructor(props) {
        super(props);
        Axios.get('http://localhost:8181/app_dev.php/devis')
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
    }
  render() {
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
