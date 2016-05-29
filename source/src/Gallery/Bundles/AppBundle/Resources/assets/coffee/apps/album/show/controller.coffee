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
      options.page ?=1
      @options = options
      self = @

      albumData = Bus.reqres.request 'album:images:entities', options.id, options.page, (model)->
        console.log 'show album with model', model
        self.showAlbum(model.get('pagination'), model.get('albumImages'))

    showAlbum: (paginationData, albumImagesData) ->
      @albumView = new AlbumView

      @listenTo @albumView, 'show', ->
        console.log 'album show'
        @showPagination paginationData
        @showImages albumImagesData

      @options.main_region.show @albumView

    showPagination: (paginationData) ->
      console.log 'show pagination'
      pagination = new Pagination paginationData
      paginationView = new PaginationView
        model: new Pagination paginationData
      @albumView.pagination.show paginationView

      # todo: change to pagination collection
      options = @options
      $('.pagination .page').click( ->
        Bus.commands.execute 'album:page:show', options.id, $(@).data('page')
        false
      );

    showImages: (albumImagesData) ->
      # transform object (from paginator) to array
      albumImagesDataArray = (val for key, val of albumImagesData)
      collection = new AlbumImages albumImagesDataArray
      imagesView = new ImagesView
        collection: collection


      @albumView.images_container.show imagesView