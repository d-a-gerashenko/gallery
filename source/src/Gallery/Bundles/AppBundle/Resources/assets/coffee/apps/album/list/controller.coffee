define [
  'marionette'
  'bus'
  'apps/album/list/views/albums'
  'entities/manager'
], (
  Marionette
  Bus
  AlbumsView
) ->

  class ListController extends Marionette.Controller
    initialize: (options = {}) ->
      console.log 'Albums controller init'
      collection = Bus.reqres.request 'albums:entities'

      albumsView = new AlbumsView
        collection: collection

      options.region.show albumsView

      @listenTo albumsView, 'childview:show:album:clicked', (view) ->
        console.log 'album clicked: ', view.model.id
        Bus.commands.execute 'album:show', view.model.id
