import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/devis/';

export default [
  <Route path='/devis/create' component={Create} exact={true} key='create'/>,
  <Route path='/devis/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/devis/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/devis/:page?' component={List} strict={true} key='list'/>,
];
