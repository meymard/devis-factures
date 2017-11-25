import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/tva/';

export default [
  <Route path='/t_v_as/create' component={Create} exact={true} key='create'/>,
  <Route path='/t_v_as/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/t_v_as/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/t_v_as/:page?' component={List} strict={true} key='list'/>,
];
