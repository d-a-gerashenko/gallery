define [
  'backbone'
  'bus'
  'entities/list/album'
], (
  Backbone
  Bus
  Album
) ->

  class Albums extends Backbone.Collection
    model : Album,
    url : '/api/albums'

