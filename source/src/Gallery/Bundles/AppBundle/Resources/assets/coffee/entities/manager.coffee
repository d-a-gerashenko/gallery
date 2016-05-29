define [
  'backbone'
  'bus'
  'entities/list/albums'
  'entities/show/album-data'
], (
  Backbone
  Bus
  Albums
  AlbumData
) ->



  Bus.reqres.setHandler 'albums:entities', ->
    console.log 'albums entities handler'
    albums = new Albums
    albums.fetch
      reset: true,
      success: (data) ->
        console.log 'SUCCESS albums fetch'
    albums

  Bus.reqres.setHandler 'album:images:entities', (id, page = 1, success) ->
    console.log 'album images entities handler with id', id, ', page', page
    albumData = new AlbumData({
      id: id,
      page: page
    })

    albumData.fetch
      reset: true
      success: success
    albumData