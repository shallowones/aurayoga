$.fn.extend({
  scrollToAnchor: function(offset) {
    var dest = 0;
    if (offset === undefined) offset = 0;
    var h = this[0].hash;
    var t = $(h === undefined ? '#'+$(this).attr('id') : h).offset().top - offset;
    if (t > $(document).height() - $(window).height()) {
      dest = $(document).height() - $(window).height();
    } else {
      dest = t;
    }
    //if ($('.main-nav').hasClass('sticking')) dest -= 59;
    $('html,body').animate({ scrollTop: dest-59 }, 1200, 'swing');
    return false;
  }
});

function reverseItems(parent, childSelector) {
  var ls = [];
  parent.find(childSelector).each(function() {
    $(this).detach();
    ls.push($(this));
  });
  ls.reverse();
  ls.forEach(function(e, i, a) {
    parent.append(e);
  });
}

$(document).ready(function () {

  //align video and remove background
  $('.rendered iframe[src*="video"]').each(function() {
    var f = $(this);
    if (!f.hasClass('rendered-video') && !f.parent().hasClass('rendered-video')) f.wrap('<div class="rendered-video aligned"></div>');
    //f.before('<i class="fa fa-cog fa-spin"></i>');
    f[0].onload = function() {
      f.parent().css({ border: '1px solid white', background: 'none' });
      f.fadeIn(2000);
      //f.prev().remove();
    };
  });

  //footer menu
  /*
  var ul1 = $('.footer-nav__in .footer-nav__lst').eq(0);
  var ul2 = $('.footer-nav__in .footer-nav__lst').eq(1);
  ul1.detach().insertAfter(ul2);

  var cap = ul1.find('li.footer-nav__i a.footer-nav__act');
  cap.detach();
  ul2.find('li.footer-nav__i ul.footer-nav__sub-lst').before(cap);
  cap = ul2.find('li.footer-nav__i').first();
  cap.detach();
  ul1.find('li.footer-nav__i').first().before(cap);

  reverseItems(ul2.find('ul.footer-nav__sub-lst'), 'li.footer-nav__sub-i');
  reverseItems(ul1.find('ul.footer-nav__sub-lst'), 'li.footer-nav__sub-i');
  */

  //transform menu
  reverseItems($('ul.footer-nav__sub-lst').eq(0), 'li.footer-nav__sub-i');
  $('.footer-nav__sub-lst > li > a').each(function() {
    if ($(this).next('ul').length > 0) {
      $(this).append('<span class="arrow">  &#9660;</span>');
      $(this).click(function() { return false; });
    }
  });
  $('.footer-nav__sub-lst > li > ul').addClass('sub-menu');
  $('.footer-nav__sub-lst').addClass('clearfix').wrap('<nav class="menu"></nav>');
  $('.nav.menu').wrap('<div class="menu-wrap"></div>');

});

$(window).load(function() {
  //set anchors
  $('.main-nav a[href="#askform"]').click(function() { $(this).scrollToAnchor(); });
  //reveal sticky
  $(window).trigger('scroll');
});