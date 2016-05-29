define [
  'marionette'
  'apps/album/list/views/album-previews-image'
  'text!apps/album/list/templates/album.html'
], (
  Marionette
  AlbumPreviewImage
  AlbumTemplate
) ->

  class AlbumView extends Marionette.CompositeView
    template: AlbumTemplate
    className: 'album-item'
    childView: AlbumPreviewImage

    initialize: ->
      @collection = @model.get("albumImages")

    triggers: ->
      'click': 'show:album:clicked'
