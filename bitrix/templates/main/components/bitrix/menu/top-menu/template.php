<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="main-nav__lst">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="main-nav__i main-nav__i_stt_cur"><a href="<?=$arItem["LINK"]?>" class="main-nav__act"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li class="main-nav__i"><a href="<?=$arItem["LINK"]?>" class="main-nav__act"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>

</ul>

<?endif?>