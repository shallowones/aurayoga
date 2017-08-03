<?
if (!defined('RENDER_HEAD'))
{
  //robots
  if (!isset($no_robots)) $no_robots = is_array($arResult['DISPLAY_PROPERTIES']) ? $arResult['DISPLAY_PROPERTIES']['robots']['VALUE'] : false;
  include_once($_SERVER["DOCUMENT_ROOT"].'/render/robots.php');

  //init settings
  require_once($_SERVER["DOCUMENT_ROOT"].'/render/settings.php');

  define('RENDER_HEAD', true);
}
?>