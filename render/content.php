<?
require_once($_SERVER["DOCUMENT_ROOT"].'/render/render.php');

if (empty($body)) $body = $arResult["DETAIL_TEXT"];
if (empty($body)) $body = $arResult["PREVIEW_TEXT"];

if (!empty($body))
{
  //lightbox
  //require_once($_SERVER["DOCUMENT_ROOT"].'/render/lightbox.php');

  //alignment
  $a = '';
  if ($settings->usealign) $a = ' aligned';
  $settings->Reset('usealign');

  //wrap
  $body = '<div class="rendered rendered-content'.$a.'">'.$body.'</div>';
  
  //video
  require_once($_SERVER["DOCUMENT_ROOT"].'/render/video.php');
  if (is_array($videos))
  {
    $ar = '';
    $ba = video_split_body($body);
    foreach ($ba as $b)
    {
      if ($vready)
      {
        $video = $videos[$b["PID"]];
        if (is_array($video))
        {
          $videoIndex = $b["PID"];
          include $_SERVER["DOCUMENT_ROOT"].'/render/video_html.php';
          $ar .= $html;
        }
      }
      $ar .= $b["TEXT"];
    }
    $body = $ar;
  }
  $settings->Reset('valign');

  //anchor
  if (!empty($anchor))
  {
    echo '<a id="'.$anchor.'"></a>';
    $anchor = '';
  }

  //caption
  if (!empty($caption))
  {
    $body = '<div class="rendered rendered-caption">'.$caption.'</div>'.$body;
    $caption = '';
  }

  echo $body;
  $body = '';
}
?>