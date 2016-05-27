requirejs.config
  paths:
    backbone: 'vendor/backbone'
    underscore: 'vendor/underscore'
    jquery: 'vendor/jquery'
    bootstrap: 'vendor/bootstrap'
    marionette: 'vendor/marionette'
    'backbone.babysitter': 'vendor/babysitter'
    'backbone.wreqr': 'vendor/wreqr'
    handlebars: 'vendor/handlebars'
    text: 'vendor/text'
    bootstrap: 'vendor/bootstrap'

  shim:
    bootstrap:
      deps: ['jquery']
  urlArgs: "bust=" + (new Date()).getTime()
require [
  'app'
], (App) ->

  App.start()