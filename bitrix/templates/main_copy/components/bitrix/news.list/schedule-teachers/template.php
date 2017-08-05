<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?function TimetableDate ($date, $zero) {
	$date_new = FormatDate("j", MakeTimeStamp($date));
	return ($date_new);
}

function TimetableMonth ($date) {
	$date_new = mb_strtolower(FormatDate("F", MakeTimeStamp($date)));
	return ($date_new);

}?>
<?$res = CIBlockElement::GetByID($arResult["ITEMS"][0]["PROPERTIES"]["camp"]["VALUE"]);?>
<?$prop = $db_props = CIBlockElement::GetProperty(11, $arResult["ITEMS"][0]["PROPERTIES"]["camp"]["VALUE"], array("sort" => "asc"), Array("CODE"=>"schedule_text"));?>
<?$ar_res = $res->GetNext();?>
<?$ar_prop = $prop->Fetch();?>
<?if ($ar_res["ACTIVE"] == "Y"):?>
	<a style="text-decoration:none;" href="/places/<?=$ar_res["CODE"]?>/"><h1>Йога лагерь "Аура - <?=strip_tags($arResult["ITEMS"][0]["DISPLAY_PROPERTIES"]["camp"]["DISPLAY_VALUE"])?>"</h1></a>
<?else:?>
	<h1>Йога лагерь "Аура - <?=strip_tags($arResult["ITEMS"][0]["DISPLAY_PROPERTIES"]["camp"]["DISPLAY_VALUE"])?>"</h1>
<?endif;?>
<?if ($ar_prop["VALUE"]["TEXT"]):?>
<p><?=htmlspecialcharsBack($ar_prop["VALUE"]["TEXT"])?>
	<br /></p>
<?endif;?>
<table class="custom-table">
	<tr class="custom-table__header">
		<td>Даты занятий</td>
		<td>Преподаватель</td>
	</tr>
<?$previous_camp = $arResult["ITEMS"][0]["PROPERTIES"]["camp"]["VALUE"];?>
<?$count = 1;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?$camp = $arItem["PROPERTIES"]["camp"]["VALUE"]?>
	<?if ($previous_camp !== $camp):?>
		<?$previous_camp = $camp;?>
		</table>
		<?$res = CIBlockElement::GetByID($arItem["PROPERTIES"]["camp"]["VALUE"]);?>
		<?$ar_res = $res->GetNext();?>
		<?$prop = $db_props = CIBlockElement::GetProperty(11, $arItem["PROPERTIES"]["camp"]["VALUE"], array("sort" => "asc"), Array("CODE"=>"schedule_text"));?>
		<?$ar_prop = $prop->Fetch();?>
		<?if ($ar_res["ACTIVE"] == "Y"):?>
			<a style="text-decoration:none;" href="/places/<?=$ar_res["CODE"]?>/"><h1>Йога лагерь "Аура - <?=strip_tags($arItem["DISPLAY_PROPERTIES"]["camp"]["DISPLAY_VALUE"])?>"</h1></a>
		<?else:?>
			<h1>Йога лагерь "Аура - <?=strip_tags($arItem["DISPLAY_PROPERTIES"]["camp"]["DISPLAY_VALUE"])?>"</h1>
		<?endif;?>
		<?if ($ar_prop["VALUE"]["TEXT"]):?>
		<p><?=htmlspecialcharsBack($ar_prop["VALUE"]["TEXT"])?>
			<br /></p>
		<?endif;?>
		<table class="custom-table">
			<tr class="custom-table__header">
				<td>Даты занятий</td>
				<td>Преподаватель</td>
			</tr>
	<?endif;?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<tr id="<?=$this->GetEditAreaId($arItem['ID']);?>" <?if ($count%2==0):?>class="custom-table__line"<?endif;?>>
	<?
	if ($arItem["PROPERTIES"]["date"]["VALUE"]):
			$date_1 = $arItem["PROPERTIES"]["date"]["VALUE"];
			$date_m1 = TimetableMonth($date_1);
			$date_d1 = TimetableDate($date_1, false);
	endif;

	if ($arItem["PROPERTIES"]["date_end"]["VALUE"]):
			$date_2 = $arItem["PROPERTIES"]["date_end"]["VALUE"];
			$date_m2 = TimetableMonth($date_2);
			$date_d2 = TimetableDate($date_2, false);
	endif;

		?>
		<td>
		<?if ($arItem["PROPERTIES"]["date_end"]["VALUE"]):?>
			<?if ($arItem["PROPERTIES"]["date"]["VALUE"] == $arItem["PROPERTIES"]["date_end"]["VALUE"]):?>
				<?=$date_d1?> <?=$date_m1?>
			<?elseif ($date_m1 == $date_m2):?>
				<?=$date_d1?> - <?=$date_d2?> <?=$date_m2?>
			<?else:?>
				<?=$date_d1?> <?=$date_m1?> - <?=$date_d2?> <?=$date_m2?>
			<?endif;?>
		<?else:?>
			<?=$date_d1?> <?=$date_m1 ?>
		<?endif?>
		</td>
		<td><?=$arItem["DISPLAY_PROPERTIES"]["teacher"]["DISPLAY_VALUE"]?></td>
	</tr> 
	<?$count++ ?>
<?endforeach;?>
</table>