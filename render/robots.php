<?
if (!isset($no_robots)) $no_robots = false;
if ($no_robots)
{
  $APPLICATION->SetPageProperty('robots', '');
  $APPLICATION->AddHeadString('<meta name="robots" content="noarchive, nofollow, noimageindex, noindex, noodp, nosnippet, notranslate, noydir" />');
}
?>