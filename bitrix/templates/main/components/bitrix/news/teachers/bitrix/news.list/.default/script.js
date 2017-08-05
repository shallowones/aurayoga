$(document).ready(function () {

  //remove empty
  var ce = [];
  $('#camps-empty ul li').each(function() {
    ce.push($(this).text());
  });

  if (ce.length > 0) {
    $('#camp-filter button').each(function() {
      if (ce.indexOf($(this).attr('data-filter')) >= 0) $(this).remove();
    });
  }

  //apply isotope
  var $grid = $('.news__lst').first().isotope({
    itemSelector: '.tutor',
    layoutMode: 'fitRows'
  });

  $('#camp-filter').on('click', 'button', function() {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  });

  //handle is-checked
  $('#camp-filter').each(function(i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $(this).addClass('is-checked');
    });
  });

});