define [
  'backbone'
  'entities/list/album-previews-image'
], (
  Backbone
  AlbumPreviewsImage
) ->

  class AlbumPreviews extends Backbone.Collection
    model: AlbumPreviewsImage
