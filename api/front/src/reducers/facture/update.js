import { combineReducers } from 'redux'

export function retrieveError(state = null, action) {
  switch (action.type) {
    case 'FACTURE_UPDATE_RETRIEVE_ERROR':
      return action.retrieveError;

    case 'FACTURE_UPDATE_RESET':
      return null;

    default:
      return state;
  }
}

export function retrieveLoading(state = false, action) {
  switch (action.type) {
    case 'FACTURE_UPDATE_RETRIEVE_LOADING':
      return action.retrieveLoading;

    case 'FACTURE_UPDATE_RESET':
      return false;

    default:
      return state;
  }
}

export function retrieved(state = null, action) {
  switch (action.type) {
    case 'FACTURE_UPDATE_RETRIEVE_SUCCESS':
      return action.retrieved;

    case 'FACTURE_UPDATE_RESET':
      return null;

    default:
      return state;
  }
}

export function updateError(state = null, action) {
  switch (action.type) {
    case 'FACTURE_UPDATE_UPDATE_ERROR':
      return action.updateError;

    case 'FACTURE_UPDATE_RESET':
      return null;

    default:
      return state;
  }
}

export function updateLoading(state = false, action) {
  switch (action.type) {
    case 'FACTURE_UPDATE_UPDATE_LOADING':
      return action.updateLoading;

    case 'FACTURE_UPDATE_RESET':
      return false;

    default:
      return state;
  }
}

export function updated(state = null, action) {
  switch (action.type) {
    case 'FACTURE_UPDATE_UPDATE_SUCCESS':
      return action.updated;

    case 'FACTURE_UPDATE_RESET':
      return null;

    default:
      return state;
  }
}

export default combineReducers({retrieveError, retrieveLoading, retrieved, updateError, updateLoading, updated});
