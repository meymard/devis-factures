import fetch from '../../utils/fetch';

export function error(error) {
  return {type: 'FACTURE_LIST_ERROR', error};
}

export function loading(loading) {
  return {type: 'FACTURE_LIST_LOADING', loading};
}

export function success(data) {
  return {type: 'FACTURE_LIST_SUCCESS', data};
}

export function list(page = '/factures') {
  return (dispatch) => {
    dispatch(loading(true));
    dispatch(error(''));

    fetch(page)
      .then(response => response.json())
      .then(data => {
        dispatch(loading(false));
        dispatch(success(data));
      })
      .catch(e => {
        dispatch(loading(false));
        dispatch(error(e.message))
      });
  };
}

export function reset() {
  return {type: 'FACTURE_LIST_RESET'};
}
