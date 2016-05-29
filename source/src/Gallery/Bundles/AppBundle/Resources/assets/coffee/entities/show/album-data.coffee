define [
  'backbone'
], (
  Backbone
) ->

  class AlbumData extends Backbone.Model
    urlRoot : '/api/album'
