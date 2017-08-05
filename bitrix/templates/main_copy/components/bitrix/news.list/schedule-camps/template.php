<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<table class="custom-table">
	<tr class="custom-table__header">
		<td>Преподаватель</td>
		<td>Даты занятий</td>
	</tr>
<?$temp_teacher = 0;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<?$count = 0;
$count_two = 0;
$i = 0;?>
<?if ($temp_teacher != $arItem["PROPERTIES"]["teacher"]["VALUE"]):?>
<?$temp_teacher = $arItem["PROPERTIES"]["teacher"]["VALUE"]?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<tr>
		<td><?=$arItem["DISPLAY_PROPERTIES"]["teacher"]["DISPLAY_VALUE"]?></td>
		<?	
			$date_m1 = mb_strtolower(FormatDate("f", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"])));
			$date_m2 = mb_strtolower(FormatDate("f", MakeTimeStamp($arItem["PROPERTIES"]["date_end"]["VALUE"])));
			$date_d1 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"]));
			$date_d2 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date_end"]["VALUE"]));
		?>
		<?if (($arItem["PROPERTIES"]["date"]["VALUE"] == $arItem["PROPERTIES"]["date_end"]["VALUE"]) || (!$arItem["PROPERTIES"]["date_end"]["VALUE"])):?>
			<?$date1 = FormatDate("d", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"]));?>
			<?if ($date1{0} == "0"):?>
				<?$date1{0} = "" ?>
			<?endif;?>
			<?$date_m = mb_strtolower(FormatDate("F", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"])))?>
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
		
		<?else:?>
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
		<?endif?>
	</tr>
<?endif;?>
<?endforeach;?>

</table>