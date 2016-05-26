define [
  'marionette'
  'text!apps/album/list/templates/album-previews-image.html'
], (
  Marionette
  AlbumPreviewsImageTemplate
) ->

  class ImageView extends  Marionette.ItemView
    template: AlbumPreviewsImageTemplate
    className: 'preview-image'