<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h1><?=$arResult["NAME"]?></h1>
	<?endif;?>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img class="content-img content-img_lt_left" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" />
	<?endif?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
<div class="clearfix-block"></div>
	<p class="to-right"><a href="/materials/articles/">Все статьи</a></p>
	<div class="separator"></div>		
	<div class="content-share">
		<div class="content-share__h">Поделиться с друзьями</div>
<div class="share42init" data-url="http://www.aurayoga.ru<?=$APPLICATION->GetCurPage();?>" data-title="<?=$APPLICATION->GetTitle();?>"></div>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/share42.js"></script>
<script type="text/javascript">share42('<?=SITE_TEMPLATE_PATH?>/js/')</script>
<br/>
<div id="vk_comments_news"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments_news", {limit: 5, attach: "*", autoPublish: 0});
</script>
	</div>