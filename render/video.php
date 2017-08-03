<?
function video_parse_embedded($v)
{
  $i = intval($v);
  if ($i > 0)
    return '//video.oum.ru/embed/'.$i;

  $m;
  if (!preg_match('@embed\/[0-9]*@', $v, $m))
    return $v;

  return '//video.oum.ru/'.$m[0];
}

function video_make_array($prop, &$any)
{
  $any = false;
  $videos = array();
  $i = 0;
  foreach($prop["VALUE"] as $v)
  {
    $vid = $prop["DESCRIPTION"][$i];
    if (!empty($vid)) $any = true;

    $w = 0;
    $h = 0;
    $f = explode(PHP_EOL, $v);
    if (count($f) > 1)
    {
      $v = $f[0];
      $w = intval($f[1]);
      if (count($f) > 2)
        $h = intval($f[2]);
    }
    else if (strpos($v, 'video.oum.ru') !== false)
    {
      $w = 640;
      $h = 360;
    }

    if (!array_key_exists($vid, $videos)) $videos[$vid] = array();
    $videos[$vid][] = array("ID"=>$i+1, "SRC"=>video_parse_embedded($v), "WIDTH"=>$w, "HEIGHT"=>$h);
    $i++;
  }

  return $videos;
}

function video_split_body($body)
{
  $res = array();
  $parts = explode('<div class="video-', $body);
  if (count($parts) == 1)
  {
    $res[] = array("PID"=>"9998", "TEXT"=>$body);
  }
  else
  {
    $tail = '</div>';
    $t = strlen($tail);
    $c = 0;
    foreach ($parts as $p)
    {
      $c++;
      if (strlen($p) == 0)
        continue;

      $i = intval($p);
      if ($i > 0)
      {
        $x = strlen(strval($i)) + 2;
        $p = ltrim(substr($p, $x), " \n\r");
      }

      $x = 0;
      if (strncasecmp($p, $tail, $t) == 0) $x = $t;
      if ($x > 0) $p = substr($p, $x);

      if ($c == 1) $i = 9998;
      $res[] = array("PID"=>strval($i), "TEXT"=>$p);
    }
  }

  return $res;
}

$vready = false;
foreach ($arResult["DISPLAY_PROPERTIES"] as $arProperty)
{
  if ($arProperty["CODE"] == "videofiles")
    $videos = video_make_array($arProperty, $vready);
}
?>