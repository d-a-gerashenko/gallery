define [
  'marionette'
  'bus'
  'apps/album/show/views/album'
  'apps/album/show/views/images'
  'apps/album/show/views/pagination'
  'entities/show/album-images'
  'entities/show/pagination'
  'entities/manager'
], (
  Marionette
  Bus
  AlbumView
  ImagesView
  PaginationView
  AlbumImages
  Pagination
) ->

  class ShowController extends Marionette.Controller
    initialize: (options = {}) ->
      self = @
      @options = options
      options.page ?=1
      albumData = Bus.reqres.request 'album:images:entities', options.id, options.page, (model)->
        self.showAlbum(model.get('pagination'), model.get('albumImages'))

    showAlbum: (paginationData, albumImagesData) ->
      @albumView = new AlbumView

      @listenTo @albumView, 'show', ->
        @showPagination paginationData
        @showImages albumImagesData

      @options.main_region.show @albumView

    showPagination: (paginationData) ->
      pagination = new Pagination paginationData
      paginationView = new PaginationView
        model: new Pagination paginationData
      @albumView.pagination.show paginationView

      # todo: change to pagination collection
      $('.pagination .page').click( ->
        Bus.commands.execute 'album:page:show', self.options.id, $(@).data('page')
        false
      );

    showImages: (albumImagesData) ->
      imagesView = new ImagesView
        collection: new AlbumImages albumImagesData
      @albumView.images_container.show imagesView