define [
  'backbone'
  'bus'
  'entities/show/album-image'
], (
  Backbone
  Bus
  AlbumImage
) ->

  class AlbumImages extends Backbone.Collection
    model : AlbumImage,
  ###  url : '/api/album'

  Bus.reqres.setHandler 'album:images:entities', (id) ->
    console.log 'album images entities handler with id', id
    albumImages = new AlbumImages

    albumImages.url += '/'+id
    albumImages.fetch
      reset: true,
      success: (data) ->
        console.log data.albumImages
        console.log 'SUCCESS album images fetch'
    albumImages###