<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?$total = 0;?>
<div class="footer-nav__in">
<ul class="footer-nav__lst">
<?foreach($arResult as $arItem):?>
<?if ($arItem["DEPTH_LEVEL"] == 3):?>
<?$total++?>
<?endif;?>
<?endforeach;?>

<?
$count = 0;
$previousLevel = 0;
foreach($arResult as $arItem):?>
	
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>
	
	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="footer-nav__i"><a href="<?=$arItem["LINK"]?>" class="footer-nav__act"><?=$arItem["TEXT"]?></a>
				<ul class="footer-nav__sub-lst">
		<?else:?>
			<?if (($count == 15 || $count == 30 ) && ($count != $total)):?>
				<ul class="footer-nav__lst">
					<li class="footer-nav__i"> </li>
					<li class="footer-nav__i">
					<ul class="footer-nav__sub-lst">
			<?endif;?>
			<li class="footer-nav__sub-i"><a href="<?=$arItem["LINK"]?>" class="footer-nav__sub-act"><?=$arItem["TEXT"]?></a>
				<ul class="footer-nav__sub-sub-lst">
				
		<?endif?>

	<?else:?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<?if ($count == $total):?>
			<?$count = 0;?>
			</ul>
			<ul class="footer-nav__lst">
			<?endif;?>
			<li class="footer-nav__i"><a href="<?=$arItem["LINK"]?>" class="footer-nav__act"><?=$arItem["TEXT"]?></a></li>
		<?elseif ($arItem["DEPTH_LEVEL"] == 3):?>
			<?$count++?>
			<li class="footer-nav__sub-sub-i"><a href="<?=$arItem["LINK"]?>" class="footer-nav__sub-sub-act"><?=$arItem["TEXT"]?></a></li>
			<?if ($count == 15 || $count == 30):?>
				</ul></li></ul>
			<?endif;?>
		<?else:?>
			<li class="footer-nav__sub-i"><a href="<?=$arItem["LINK"]?>" class="footer-nav__sub-act"><?=$arItem["TEXT"]?></a></li>
		<?endif?>


	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
</div>
<?endif?>