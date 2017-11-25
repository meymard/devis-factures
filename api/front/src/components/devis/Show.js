import React, {Component} from 'react';
import {connect} from 'react-redux';
import {Link, Redirect} from 'react-router-dom';
import PropTypes from 'prop-types';
import {retrieve, reset} from '../../actions/devis/show';
import { del, loading, error } from '../../actions/devis/delete';

class Show extends Component {
  static propTypes = {
    error: PropTypes.string,
    loading: PropTypes.bool.isRequired,
    retrieved: PropTypes.object,
    retrieve: PropTypes.func.isRequired,
    reset: PropTypes.func.isRequired,
    deleteError: PropTypes.string,
    deleteLoading: PropTypes.bool.isRequired,
    deleted: PropTypes.object,
    del: PropTypes.func.isRequired
  };

  componentDidMount() {
    this.props.retrieve(decodeURIComponent(this.props.match.params.id));
  }

  componentWillUnmount() {
    this.props.reset();
  }

  del = () => {
    if (window.confirm('Are you sure you want to delete this item?')) this.props.del(this.props.retrieved);
  };

  render() {
    if (this.props.deleted) return <Redirect to=".."/>;

    const item = this.props.retrieved;

    return (<div>
      <h1>Show {item && item['@id']}</h1>

      {this.props.loading && <div className="alert alert-info" role="status">Loading...</div>}
      {this.props.error && <div className="alert alert-danger" role="alert"><span className="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> {this.props.error}</div>}
      {this.props.deleteError && <div className="alert alert-danger" role="alert"><span className="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> {this.props.deleteError}</div>}

      {item && <div className="table-responsive">
        <table className="table table-striped table-hover">
          <thead>
            <tr>
              <th>Field</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>numero</td>
              <td>{item['numero']}</td>
            </tr>
            <tr>
              <td>date</td>
              <td>{item['date']}</td>
            </tr>
            <tr>
              <td>tva</td>
              <td>{item['tva']}</td>
            </tr>
            <tr>
              <td>acompte</td>
              <td>{item['acompte']}</td>
            </tr>
            <tr>
              <td>acompteVal</td>
              <td>{item['acompteVal']}</td>
            </tr>
            <tr>
              <td>reference</td>
              <td>{item['reference']}</td>
            </tr>
            <tr>
              <td>lignes</td>
              <td>{item['lignes']}</td>
            </tr>
            <tr>
              <td>telephone</td>
              <td>{item['telephone']}</td>
            </tr>
            <tr>
              <td>ville</td>
              <td>{item['ville']}</td>
            </tr>
            <tr>
              <td>codePostal</td>
              <td>{item['codePostal']}</td>
            </tr>
            <tr>
              <td>adresse2</td>
              <td>{item['adresse2']}</td>
            </tr>
            <tr>
              <td>adresse</td>
              <td>{item['adresse']}</td>
            </tr>
            <tr>
              <td>nom</td>
              <td>{item['nom']}</td>
            </tr>
          </tbody>
        </table>
      </div>
      }
      <Link to=".." className="btn btn-default">Back to list</Link>
      {item && <Link to={`/devis/edit/${encodeURIComponent(item['@id'])}`}>
        <button className="btn btn-warning">Edit</button>
        </Link>
      }
      <button onClick={this.del} className="btn btn-danger">Delete</button>
    </div>);
  }
}

const mapStateToProps = (state) => {
  return {
    error: state.devis.show.error,
    loading: state.devis.show.loading,
    retrieved:state.devis.show.retrieved,
    deleteError: state.devis.del.error,
    deleteLoading: state.devis.del.loading,
    deleted: state.devis.del.deleted,
  };
};

const mapDispatchToProps = (dispatch) => {
  return {
    retrieve: id => dispatch(retrieve(id)),
    del: item => dispatch(del(item)),
    reset: () => {
      dispatch(reset());
      dispatch(error(null));
      dispatch(loading(false));
    },
  }
};

export default connect(mapStateToProps, mapDispatchToProps)(Show);
