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
