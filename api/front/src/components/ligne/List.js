import React, {Component} from 'react';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';
import PropTypes from 'prop-types';
import { list, reset } from '../../actions/ligne/list';
import { success } from '../../actions/ligne/delete';
import { itemToLinks } from '../../utils/helpers';

class List extends Component {
  static propTypes = {
    error: PropTypes.string,
    loading: PropTypes.bool.isRequired,
    data: PropTypes.object.isRequired,
    deletedItem: PropTypes.object,
    list: PropTypes.func.isRequired,
    reset: PropTypes.func.isRequired,
  };

  componentDidMount() {
    this.props.list(this.props.match.params.page && decodeURIComponent(this.props.match.params.page));
  }

  componentWillReceiveProps(nextProps) {
    if (this.props.match.params.page !== nextProps.match.params.page) nextProps.list(nextProps.match.params.page && decodeURIComponent(nextProps.match.params.page));
  }

  componentWillUnmount() {
    this.props.reset();
  }

  render() {
    return <div>
      <h1>Ligne List</h1>

      {this.props.loading && <div className="alert alert-info">Loading...</div>}
      {this.props.deletedItem && <div className="alert alert-success">{this.props.deletedItem['@id']} deleted.</div>}
      {this.props.error && <div className="alert alert-danger">{this.props.error}</div>}

      <p><Link to="create" className="btn btn-default">Create</Link></p>

      <div className="table-responsive">
          <table className="table table-striped table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>facture</th>
              <th>description</th>
              <th>quantite</th>
              <th>prix</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          {this.props.data['hydra:member'] && this.props.data['hydra:member'].map(item =>
            <tr className={item['@id']} key={item['@id']}>
              <td><Link to={`show/${encodeURIComponent(item['@id'])}`}>{item['@id']}</Link></td>
              <td>{item['facture'] ? itemToLinks(item['facture']) : ''}</td>
              <td>{item['description'] ? itemToLinks(item['description']) : ''}</td>
              <td>{item['quantite'] ? itemToLinks(item['quantite']) : ''}</td>
              <td>{item['prix'] ? itemToLinks(item['prix']) : ''}</td>
              <td>
                <Link to={`show/${encodeURIComponent(item['@id'])}`}>
                  <span className="glyphicon glyphicon-search" aria-hidden="true"/>
                  <span className="sr-only">Show</span>
                </Link>
              </td>
              <td>
                <Link to={`edit/${encodeURIComponent(item['@id'])}`}>
                  <span className="glyphicon glyphicon-pencil" aria-hidden="true"/>
                  <span className="sr-only">Edit</span>
                </Link>
              </td>
            </tr>
          )}
          </tbody>
        </table>
      </div>

      {this.pagination()}
    </div>;
  }

  pagination() {
    const view = this.props.data['hydra:view'];
    if (!view) return;

    const {'hydra:first': first, 'hydra:previous': previous,'hydra:next': next, 'hydra:last': last} = view;

    return <nav aria-label="Page navigation">
        <Link to='.' className={`btn btn-default${previous ? '' : ' disabled'}`}><span aria-hidden="true">&lArr;</span> First</Link>
        <Link to={!previous || previous === first ? '.' : encodeURIComponent(previous)} className={`btn btn-default${previous ? '' : ' disabled'}`}><span aria-hidden="true">&larr;</span> Previous</Link>
        <Link to={next ? encodeURIComponent(next) : '#'} className={`btn btn-default${next ? '' : ' disabled'}`}>Next <span aria-hidden="true">&rarr;</span></Link>
        <Link to={last ? encodeURIComponent(last) : '#'} className={`btn btn-default${next ? '' : ' disabled'}`}>Last <span aria-hidden="true">&rArr;</span></Link>
    </nav>;
  }
}

const mapStateToProps = (state) => {
  return {
    data: state.ligne.list.data,
    error: state.ligne.list.error,
    loading: state.ligne.list.loading,
    deletedItem: state.ligne.del.deleted,
  };
};

const mapDispatchToProps = (dispatch) => {
  return {
    list: (page) => dispatch(list(page)),
    reset: () => {
      dispatch(reset());
      dispatch(success(null));
    },
  };
};

export default connect(mapStateToProps, mapDispatchToProps)(List);
