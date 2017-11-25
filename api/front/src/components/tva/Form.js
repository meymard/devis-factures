import React, { Component } from 'react';
import { Field, reduxForm } from 'redux-form';

class Form extends Component {
  renderField(data) {
    const hasError = data.meta.touched && !!data.meta.error;
    if (hasError) {
      data.input['aria-describedby'] = `tva_${data.input.name}_helpBlock`;
      data.input['aria-invalid'] = true;
    }

    return <div className={`form-group${hasError ? ' has-error' : ''}`}>
      <label htmlFor={`tva_${data.input.name}`} className="control-label">{data.input.name}</label>
      <input {...data.input} type={data.type} step={data.step} required={data.required} placeholder={data.placeholder} id={`tva_${data.input.name}`} className="form-control"/>
      {hasError && <span className="help-block" id={`tva_${data.input.name}_helpBlock`}>{data.meta.error}</span>}
    </div>;
  }

  render() {
    const { handleSubmit } = this.props;

    return <form onSubmit={handleSubmit}>
      <Field component={this.renderField} name="tva" type="number" step="0.1" placeholder="" />

        <button type="submit" className="btn btn-primary">Submit</button>
      </form>;
  }
}

export default reduxForm({form: 'tva', enableReinitialize: true, keepDirtyOnReinitialize: true})(Form);
