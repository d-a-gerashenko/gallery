define [
  'marionette'
  'bus'
  'apps/album/show/views/images'
  'entities/album-images'
], (
  Marionette
  Bus
  ImagesView
) ->

  class ShowController extends Marionette.Controller
    initialize: (options = {}) ->
      collection = Bus.reqres.request 'album:images:entities', options.id
      imagesView = new ImagesView
        collection: collection

      options.region.show imagesView