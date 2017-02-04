var Factures = Backbone.Collection.extend({
  url: app.factures
});
var Devis = Backbone.Collection.extend({
  url: app.devis
});

var factures = new Factures();
factures.fetch();

var devis = new Devis();
devis.fetch();
