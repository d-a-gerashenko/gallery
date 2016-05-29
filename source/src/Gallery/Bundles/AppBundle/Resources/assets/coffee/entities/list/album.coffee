define [
  'backbone',
  'entities/list/album-previews'
], (
  Backbone
  AlbumPreviews
) ->

  class Album extends Backbone.Model
    initialize: ->
      previews = @get('albumImages')
      @set('albumImages', new AlbumPreviews previews)

    