<?
$html = '';
foreach($video as $v)
{
  $src = $v["SRC"];
  if (empty($src))
    continue;

  $size = '';
  if (!empty($v["WIDTH"])) $size .= 'width="'.$v["WIDTH"].'"';
  if (!empty($v["HEIGHT"])) $size .= ' height="'.$v["HEIGHT"].'"';
  
  $va = '';
  if ($settings->valign) $va = ' aligned';
  $html .= '<div id="video-'.$v["ID"].'" class="rendered rendered-video'.$va.'">';
  $html .= '<iframe '.$size.' frameborder="0" src="'.$src.'" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="true"></iframe>';
  $html .= '</div><br>';
}
?>