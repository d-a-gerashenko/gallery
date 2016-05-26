define [
  'marionette'
  'bus'
  'apps/album/list/controller'
  'apps/album/show/controller'
], (
  Marionette
  Bus
  ListController
  ShowController
) ->

  class AlbumsAppRouter extends Marionette.AppRouter
    appRoutes:
      '' : 'listAlbums'
      'album/:id' : 'showAlbum'

  API =
    listAlbums: ->
      new ListController
        region: Bus.reqres.request 'main_region'

    showAlbum: (id) ->
      new ShowController
        id: id,
        region: Bus.reqres.request 'main_region'

  Bus.commands.setHandler 'album:show', (view) ->
    console.log 'album:show:event with id ', view.id
    Backbone.history.navigate 'album/' + view.id, trigger: true

  albumsApp = new Marionette.Application
  
  albumsApp.on 'before:start', ->
    new AlbumsAppRouter
      controller: API
  
  albumsApp