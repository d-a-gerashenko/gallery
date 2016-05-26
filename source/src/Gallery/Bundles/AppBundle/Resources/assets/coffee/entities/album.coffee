define [
  'backbone',
  'entities/album-previews'
], (
  Backbone
  AlbumPreviews
) ->

  class Album extends Backbone.Model
    initialize: ->
      previews = @get('previews')
      @set('previews', new AlbumPreviews previews)

    