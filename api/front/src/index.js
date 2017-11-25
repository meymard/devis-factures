import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import Devis from './Devis';
import './index.css';
import registerServiceWorker from './registerServiceWorker';
import { createStore, combineReducers, applyMiddleware } from 'redux';
import { Provider } from 'react-redux';
import thunk from 'redux-thunk';
import { reducer as form } from 'redux-form';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import createBrowserHistory from 'history/createBrowserHistory';
import { syncHistoryWithStore, routerReducer as routing } from 'react-router-redux'

// Replace "foo" with the name of the resource type
import devis from './reducers/devis/';
import devisRoutes from './routes/devis';

ReactDOM.render(
  <App />,
  document.getElementById('root')
);

//ReactDOM.render(
//  <Devis />,
//  document.getElementById('devis')
//);



const store = createStore(
  combineReducers({routing, form, devis}), // Don't forget to register the reducers here
  applyMiddleware(thunk),
);

const history = syncHistoryWithStore(createBrowserHistory(), store);

ReactDOM.render(
  <Provider store={store}>
    <Router history={history}>
      <Switch>
        {devisRoutes}
        <Route render={() => <h1>Not Found</h1>}/>
      </Switch>
    </Router>
  </Provider>,
  document.getElementById('generate')
);

registerServiceWorker();

