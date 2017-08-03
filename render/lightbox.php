<link rel="stylesheet" href="/render/css/magnific-popup.css">
<script src="/render/js/jquery.magnific-popup.min.js"></script>

<script>
$(document).ready(function() {
  $('.lightbox').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile mfp-zoom-in',
    tLoading: '',
    removalDelay: 500,
    callbacks: {
      imageLoadComplete: function() {
        var self = this;
        setTimeout(function() {
          self.wrap.addClass('mfp-image-loaded');
        }, 16);
      },
      close: function() {
        this.wrap.removeClass('mfp-image-loaded');
      },
    },
    image: {
      verticalFit: false
    }
  });
  $('.lightbox-text').magnificPopup({
    type:'inline',
    removalDelay: 300,
    mainClass: "mfp-zoom-in"
  });
  $('.lightbox-dynamic').magnificPopup({
    type:'ajax'
  });
});
</script>

<?
if (empty($galleries)) $galleries = array(0);
$gcs = array();
foreach ($galleries as $g)
{
  $c = '".popup-gallery';
  if ($g > 0) $c .= '-'.$g;
  $c .= '"';
  $gcs[] = $c;
}
 
echo '<script>
  $(document).ready(function() { ['. implode(', ', $gcs).'].forEach(function(e, i, a) {
    $(e).magnificPopup({ delegate: "a", type: "image", mainClass: "mfp-img-mobile", gallery: { enabled: true, navigateByImgClick: true } });
    });
  });
  </script>';
?>

