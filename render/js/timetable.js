function setCampArrow(hcamp) {
  hcamp.children('span.arrow').text(hcamp.hasClass('collapsed') ? '↓':'↑');
}

function setMonthArrow(pmonth) {
  pmonth.children('span.arrow').text(pmonth.hasClass('collapsed') ? '↓':'↑');
}

$('h1.camp-caption').each(function() {
  setCampArrow($(this));
  $(this).children('span.arrow').click(function() {
    var h1 = $(this).parent();
    h1.next().next().slideToggle();
    h1.toggleClass('collapsed');
    setCampArrow(h1);
  });
});

$('p.month').each(function() {
  setMonthArrow($(this));
  $(this).click(function() {
    $(this).next().slideToggle();
    $(this).toggleClass('collapsed');
    setMonthArrow($(this));
  });
});

$('td.date-s, td.date-e').click(function() {
  var c = $(this).closest('table');
  c = c.parent().closest('.camp');
  c = c.prevUntil('h1').last().prev();
  c = c.attr('id').split('-')[1];
  $('#place').val(c).trigger('change');
  var row = $(this).parent();
  $('#datepicker1').val(row.find('.date-s').data('date'));
  $('#datepicker2').val(row.find('.date-e').data('date'));
  $('#askform').scrollToAnchor();
});