import React, { Component } from 'react';
import { Field, reduxForm } from 'redux-form';

class Form extends Component {
  renderField(data) {
    const hasError = data.meta.touched && !!data.meta.error;
    if (hasError) {
      data.input['aria-describedby'] = `facture_${data.input.name}_helpBlock`;
      data.input['aria-invalid'] = true;
    }

    return <div className={`form-group${hasError ? ' has-error' : ''}`}>
      <label htmlFor={`facture_${data.input.name}`} className="control-label">{data.input.name}</label>
      <input {...data.input} type={data.type} step={data.step} required={data.required} placeholder={data.placeholder} id={`facture_${data.input.name}`} className="form-control"/>
      {hasError && <span className="help-block" id={`facture_${data.input.name}_helpBlock`}>{data.meta.error}</span>}
    </div>;
  }

  render() {
    const { handleSubmit } = this.props;

    return <form onSubmit={handleSubmit}>
      <Field component={this.renderField} name="numero" type="text" placeholder="Le numéro de devis au format YY001." />
      <Field component={this.renderField} name="date" type="text" placeholder="TODO // Format final :  ORM\Column(name='date', type='date', nullable=false)" />
      <Field component={this.renderField} name="tva" type="number" step="0.1" placeholder="" />
      <Field component={this.renderField} name="acompte" type="number" step="0.1" placeholder="Pourcentage d'acompte." />
      <Field component={this.renderField} name="acompteVal" type="number" step="0.1" placeholder="Valeur de l'acompte." />
      <Field component={this.renderField} name="reference" type="text" placeholder="" />
      <Field component={this.renderField} name="lignes" type="text" placeholder="" />
      <Field component={this.renderField} name="telephone" type="text" placeholder="" />
      <Field component={this.renderField} name="ville" type="text" placeholder="" />
      <Field component={this.renderField} name="codePostal" type="text" placeholder="" />
      <Field component={this.renderField} name="adresse2" type="text" placeholder="" />
      <Field component={this.renderField} name="adresse" type="text" placeholder="" />
      <Field component={this.renderField} name="nom" type="text" placeholder="" />

        <button type="submit" className="btn btn-primary">Submit</button>
      </form>;
  }
}

export default reduxForm({form: 'facture', enableReinitialize: true, keepDirtyOnReinitialize: true})(Form);
