define [
  'marionette'
  'text!apps/album/show/templates/pagination.html'
], (
  Marionette
  PaginationTemplate
) ->

  class ImageView extends Marionette.ItemView
    template: PaginationTemplate
    className: 'pagination'

    triggers: ->
      'click': 'pagination:clicked'