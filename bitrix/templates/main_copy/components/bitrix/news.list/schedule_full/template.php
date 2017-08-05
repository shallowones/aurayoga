<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<table class="custom-table">
	<tr class="custom-table__header">
		<td>Даты занятий</td>
		<td>Йога-лагерь</td>
	</tr>
<?$count = 1;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<tr id="<?=$this->GetEditAreaId($arItem['ID']);?>" <?if ($count%2==0):?>class="custom-table__line"<?endif;?>>
	<?	
			$date_m1 = mb_strtolower(FormatDate("f", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"])));
			$date_m2 = FormatDate("f", MakeTimeStamp($arItem["PROPERTIES"]["date_end"]["VALUE"]));
			$date_d1 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"]));
			$date_d2 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date_end"]["VALUE"]));
		?>
	<?if (($date_d1 == $date_d2) && ($date_m1 == $date_m2)):?>
			<?$date1 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"]));?>
			<?if ($date1{0} == "0"):?>
				<?$date1{0} = "" ?>
			<?endif;?>
			<?$date_m = mb_strtolower(FormatDate("F", MakeTimeStamp($arItem["PROPERTIES"]["date_end"]["VALUE"])))?>
			<td><?=$date1?> <?=$date_m?></td>
		<?elseif ($date_m1 == $date_m2):?>
			<?$date1 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"]));?>
			<?if ($date1{0} == "0"):?>
				<?$date1{0} = "" ?>
			<?endif;?>
			<?$date2 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date_end"]["VALUE"]));?>
			<?if ($date2{0} == "0"):?>
				<?$date2{0} = "" ?>
			<?endif;?>
			<?$date_m = mb_strtolower(FormatDate("F", MakeTimeStamp($arItem["PROPERTIES"]["date_end"]["VALUE"])))?>
			<td><?=$date1?>-<?=$date2?> <?=$date_m?></td>
		
		<?elseif ($arItem["PROPERTIES"]["date_end"]["VALUE"]):?>
			<?$date1 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"]));?>
			<?if ($date1{0} == "0"):?>
				<?$date1{0} = "" ?>
			<?endif;?>
			<?$date2 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date_end"]["VALUE"]));?>
			<?if ($date2{0} == "0"):?>
				<?$date2{0} = "" ?>
			<?endif;?>
			<?$date_m_one = mb_strtolower(FormatDate("F", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"])))?>
			<?$date_m_two = mb_strtolower(FormatDate("F", MakeTimeStamp($arItem["PROPERTIES"]["date_end"]["VALUE"])))?>
			<td><?=$date1?> <?=$date_m_one ?> - <?=$date2?> <?=$date_m_two ?></td>
		<?else:?>
		<?$date1 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"]));?>
			<?if ($date1{0} == "0"):?>
				<?$date1{0} = "" ?>
			<?endif;?>
			<?$date_m_one = mb_strtolower(FormatDate("F", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"])))?>
			<td><?=$date1?> <?=$date_m_one ?></td>
		<?endif?>
		<td><?=$arItem["DISPLAY_PROPERTIES"]["camp"]["DISPLAY_VALUE"]?></td>
	</tr>
	<?$count++?>
<?endforeach;?>
</table>