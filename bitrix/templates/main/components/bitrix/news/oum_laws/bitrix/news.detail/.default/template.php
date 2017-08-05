<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$no_robots = true;
require_once($_SERVER["DOCUMENT_ROOT"].'/render/render.php');
?>

<?
echo $arResult["DETAIL_TEXT"];
?>