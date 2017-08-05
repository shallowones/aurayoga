<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<div class="section-nav__in">
<ul class="section-nav__lst">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
<?$code = substr_count($arItem["LINK"], $GLOBALS["code"]);?>
	<?if (($arItem["DEPTH_LEVEL"]>1) && ($code>0) && ($GLOBALS["code"])):?>
	<?if($arItem["SELECTED"]):?>
		<li class="section-nav__i section-nav__i_stt_cur"><a href="<?=$arItem["LINK"]?>" class="section-nav__act"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li class="section-nav__i"><a class="section-nav__act" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	<?$i++;?>
	<?elseif (!$GLOBALS["code"]):?>
	<?if($arItem["SELECTED"]):?>
		<li class="section-nav__i section-nav__i_stt_cur"><a href="<?=$arItem["LINK"]?>" class="section-nav__act"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li class="section-nav__i"><a class="section-nav__act" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	<?endif;?>
<?endforeach?>

</ul>
</div><!-- section-nav__in -->
<div class="clearfix-block"></div>
<?endif?>