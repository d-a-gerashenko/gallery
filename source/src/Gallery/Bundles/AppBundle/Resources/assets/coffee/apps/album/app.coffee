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
      'album/:id/page/:page' : 'showAlbum'

  API =
    listAlbums: ->
      new ListController
        region: Bus.reqres.request 'main_region'

    showAlbum: (id, page = null) ->
      new ShowController
        id: id
        page: page
        main_region: Bus.reqres.request 'main_region'

  Bus.commands.setHandler 'album:show', (id) ->
    console.log 'album:show:event with id ', id
    Backbone.history.navigate 'album/' + id, trigger: true

  Bus.commands.setHandler 'album:page:show', (id, page) ->
    console.log 'album:show:event with id ', id, ', page ', page
    Backbone.history.navigate 'album/' + id+'/page/'+page, trigger: true


  albumsApp = new Marionette.Application
  
  albumsApp.on 'before:start', ->
    new AlbumsAppRouter
      controller: API
  
  albumsApp