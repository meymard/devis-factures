import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/ligne/';

export default [
  <Route path='/lignes/create' component={Create} exact={true} key='create'/>,
  <Route path='/lignes/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/lignes/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/lignes/:page?' component={List} strict={true} key='list'/>,
];
