<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?ob_start();?>
<section class="content">
	<div class="page__c">
		<h1 class="section-h"><?=$arResult["NAME"]?></h1>
		<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="" class="content-img content-img_lt_left">
		<p><q><?=$arResult["DISPLAY_PROPERTIES"]["quote"]["DISPLAY_VALUE"]?></q>
		<cite>(<?=$arResult["DISPLAY_PROPERTIES"]["author"]["DISPLAY_VALUE"]?>)</cite></p>
		<p>
		<?if (($arResult["PROPERTIES"]["email"]["VALUE"]) || ($arResult["PROPERTIES"]["phone"]["VALUE"]) || ($arResult["PROPERTIES"]["skype"]["VALUE"])):?>
		<b>Контактные данные:</b><br>
		<?endif;?>
		<?if ($arResult["PROPERTIES"]["email"]["VALUE"]):?>
		E-mail: <?=$arResult["DISPLAY_PROPERTIES"]["email"]["DISPLAY_VALUE"]?><br>
		<?endif;?>
		<?if ($arResult["PROPERTIES"]["phone"]["VALUE"]):?>
		Телефон: <?=$arResult["DISPLAY_PROPERTIES"]["phone"]["DISPLAY_VALUE"]?><br>
		<?endif;?>
		<?if ($arResult["PROPERTIES"]["skype"]["VALUE"]):?>
		Skype: <?=$arResult["DISPLAY_PROPERTIES"]["skype"]["DISPLAY_VALUE"]?>
		<?endif;?>
		</p>
		<div class="clearfix-block"></div>
		<?echo $arResult["DETAIL_TEXT"];?>
		<h2 class="colored">График участия в йога-лагере</h2>
		#SCHEDULE_<?=$arResult["ID"]?>#
</div>
</section>
<?
$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();
?>
