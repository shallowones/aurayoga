(function ($) {
  $(function () {

    $('#menu-icon').on('click', function (e) {
      e.preventDefault()
      const $this = $(e.currentTarget)
      const $mobileMenu = $($this.val())
      $this.toggleClass('open')
      $mobileMenu.slideToggle()
    })

  })
})(jQuery)