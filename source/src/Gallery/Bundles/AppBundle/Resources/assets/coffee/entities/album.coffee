define [
  'backbone',
  'entities/album-previews'
], (
  Backbone
  AlbumPreviews
) ->

  class Album extends Backbone.Model
    initialize: ->
      albumImages = @get('albumImages')
      @set('albumImages', new AlbumPreviews albumImages)

    