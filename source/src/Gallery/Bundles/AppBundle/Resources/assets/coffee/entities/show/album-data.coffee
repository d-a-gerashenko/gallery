define [
  'backbone'
], (
  Backbone
) ->

  class AlbumData extends Backbone.Model
    urlRoot : '/api/album'
    url: ->
      @page ?= 1
      @urlRoot+'/'+@id+'/'+@page
