define [
  'backbone'
  'marionette'
  'handlebars'
  'bus'
  'apps/album/app'
], (
  Backbone
  Marionette
  Handlebars
  Bus
  AlbumsApp
) ->

  app = new Marionette.Application

  app.addRegions
    mainRegion: '#main-region'


  app.on 'before:start', ->
    console.log 'before main app start'
    AlbumsApp.start()

  app.on 'start', ->
    Backbone.history.start() unless Backbone.history.started

  Bus.reqres.setHandler 'main_region', ->
    app.mainRegion

  Marionette.Renderer.render = (template, data) ->
    return if template == false
    compiled = Handlebars.default.compile template
    compiled data

  app
