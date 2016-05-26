define [
  'marionette'
  'text!apps/album/show/templates/image.html'

], (
  Marionette
  ImageTemplate
) ->

  class ImageView extends Marionette.ItemView
    template: ImageTemplate
    className: 'image'