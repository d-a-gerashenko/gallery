define [
  'marionette'
  'text!apps/album/show/templates/album.html'
], (
  Marionette
  AlbumTemplate
) ->

  class AlbumView extends Marionette.LayoutView
    template: AlbumTemplate
    regions:
      pagination: '#pagination'
      images_container: '#images-container'
    