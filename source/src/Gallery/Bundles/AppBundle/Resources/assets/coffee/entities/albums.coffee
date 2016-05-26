define [
  'backbone'
  'bus'
  'entities/album'
], (
  Backbone
  Bus
  Album
) ->

  class Albums extends Backbone.Collection
    model : Album,
    url : '/api/albums'

  Bus.reqres.setHandler 'albums:entities', ->
    console.log 'albums entities handler'
    albums = new Albums
    albums.fetch
      reset: true,
      success: (data) ->
        console.log 'SUCCESS albums fetch'
    albums