define [
  'marionette'
  'apps/album/show/views/image'
  'text!apps/album/show/templates/images.html'
],(
  Marionette
  ImageView
  ImagesTemplate
) ->

  class ImagesView extends Marionette.CollectionView
    template: ImagesTemplate
    childView: ImageView
    className: 'images'
