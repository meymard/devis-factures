import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/facture/';

export default [
  <Route path='/factures/create' component={Create} exact={true} key='create'/>,
  <Route path='/factures/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/factures/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/factures/:page?' component={List} strict={true} key='list'/>,
];
