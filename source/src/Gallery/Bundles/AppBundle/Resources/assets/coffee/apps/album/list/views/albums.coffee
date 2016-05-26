define [
  'marionette'
  'apps/album/list/views/album'
  'text!apps/album/list/templates/albums.html'
],(
  Marionette
  ItemView
  AlbumsTemplate
) ->

  class ListView extends Marionette.CollectionView
    template: AlbumsTemplate
    childView: ItemView
    className: 'albums-list'