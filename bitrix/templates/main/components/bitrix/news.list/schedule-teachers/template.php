<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
require_once($_SERVER["DOCUMENT_ROOT"].'/render/timetable.php');
?>

<?$camp = $arResult["ITEMS"][0]["PROPERTIES"]["camp"]["VALUE"];?>
<?$res = CIBlockElement::GetByID($camp);?>
<?$prop = $db_props = CIBlockElement::GetProperty(11, $arResult["ITEMS"][0]["PROPERTIES"]["camp"]["VALUE"], array("sort" => "asc"), Array("CODE"=>"schedule_text"));?>
<?$ar_res = $res->GetNext();?>
<?$ar_prop = $prop->Fetch();?>
<?if ($ar_res["ACTIVE"] == "Y"):?>
	<h1 id="camp-<?=$camp;?>" class="camp-caption"><a style="text-decoration:none;" href="/places/<?=$ar_res["CODE"]?>/">Йога лагерь "Аура - <?=strip_tags($arResult["ITEMS"][0]["DISPLAY_PROPERTIES"]["camp"]["DISPLAY_VALUE"])?>"</a><span class="arrow"></span></h1>
<?else:?>
	<h1 class="camp-caption">Йога лагерь "Аура - <?=strip_tags($arResult["ITEMS"][0]["DISPLAY_PROPERTIES"]["camp"]["DISPLAY_VALUE"])?>"<span class="arrow"></span></h1>
<?endif;?>
<p><?=htmlspecialcharsBack($ar_prop["VALUE"]["TEXT"])?>
	<br /></p>
<div class="camp">
<table class="custom-table caption">
	<tr class="custom-table__header">
		<td colspan="3" width="50%">Даты занятий</td>
		<td width="50%">Преподаватель</td>
	</tr></table>
<?
$previous_camp = $arResult["ITEMS"][0]["PROPERTIES"]["camp"]["VALUE"];
$prev_m = '';
?>
<?$count = 1;$total=0;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?$camp = $arItem["PROPERTIES"]["camp"]["VALUE"]?>
	<?if ($previous_camp !== $camp):?>
		<?$previous_camp = $camp;$prev_m = '';?>
		</table></div></div>
		<?$res = CIBlockElement::GetByID($arItem["PROPERTIES"]["camp"]["VALUE"]);?>
		<?$ar_res = $res->GetNext();?>
		<?$prop = $db_props = CIBlockElement::GetProperty(11, $arItem["PROPERTIES"]["camp"]["VALUE"], array("sort" => "asc"), Array("CODE"=>"schedule_text"));?>
		<?$ar_prop = $prop->Fetch();?>
		<?if ($ar_res["ACTIVE"] == "Y"):?>
			<h1 id="camp-<?=$camp;?>" class="camp-caption inner"><a style="text-decoration:none;" href="/places/<?=$ar_res["CODE"]?>/">Йога лагерь "Аура - <?=strip_tags($arItem["DISPLAY_PROPERTIES"]["camp"]["DISPLAY_VALUE"])?>"</a><span class="arrow"></span></h1>
		<?else:?>
			<h1 class="camp-caption inner">Йога лагерь "Аура - <?=strip_tags($arItem["DISPLAY_PROPERTIES"]["camp"]["DISPLAY_VALUE"])?>"<span class="arrow"></span></h1>
		<?endif;?>
		<p><?=htmlspecialcharsBack($ar_prop["VALUE"]["TEXT"])?>
			<br /></p>
		<div class="camp">
		<table class="custom-table caption">
			<tr class="custom-table__header">
				<td colspan="3" width="50%">Даты занятий</td>
				<td width="50%">Преподаватель</td>
			</tr></table>
	<?endif;?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
        <?
        $dt = parseDateProperty($arItem["PROPERTIES"]["date"]["VALUE"]);
        $dte = parseDateProperty($arItem["PROPERTIES"]["date_end"]["VALUE"]);
        if (!empty($dte)) $dt = $dte;

	$comment = $arItem["PROPERTIES"]["comment"]["VALUE"];
	if (!empty($comment)) $comment = ' ('.$comment.')';
	if ($arItem["PROPERTIES"]["date"]["VALUE"]):
			$date_1 = stripTime($arItem["PROPERTIES"]["date"]["VALUE"]);
			$date_m1 = TimetableMonth($date_1);
	endif;

	if ($arItem["PROPERTIES"]["date_end"]["VALUE"]):
			$date_2 = stripTime($arItem["PROPERTIES"]["date_end"]["VALUE"]);
			$date_m2 = TimetableMonth($date_2);
	endif;

if ($date_m1 != $prev_m)
{
  if (!empty($prev_m)) echo '</table></div>';
  $mref = $ar_res["CODE"].'-'.str_translit($date_m1);
  echo '<p class="month"><a id="'.$mref.'" href="#'.$mref.'" onclick="return false;">'.$date_m1.'</a><span class="arrow"></span></p>';
  echo '<div><table class="custom-table month">';
  $prev_m = $date_m1;
  $count = 1;
}
echo '<tr id="'.$this->GetEditAreaId($arItem['ID']).'"';
$class = '';
if ($dt < $now) $class = ' past';
if ($count % 2 == 0) $class .= ' custom-table__line';
if (!empty($class)) echo 'class="'.$class.'"';
echo '>';
?>
		<?if ($arItem["PROPERTIES"]["date_end"]["VALUE"]):?>
			<?if ($date_1 == $date_2):?>
				<td></td>
<td class="date-s" data-date="<?=$date_1;?>"><?=TimetableDate($date_1, $date_2);?></td>
<td class="date-e" data-date="<?=$date_2;?>"><?=TimetableDays($date_1, $date_2);?></td>
			<?else:?>
				<td></td>
<td class="date-s" data-date="<?=$date_1;?>"><?=TimetableDate($date_1, $date_2);?></td>
<td class="date-e" data-date="<?=$date_2;?>"><?=TimetableDays($date_1, $date_2);?></td>
			<?endif;?>
		<?else:?>
			<td></td>
<td class="date-s" data-date="<?=$date_1;?>"><?=TimetableDate($date_1);?></td>
<td class="date-e" data-date="<?=$date_1;?>"><?=TimetableDays($date_1);?></td>
		<?endif?>
		<td>
<?
$t = $arItem["DISPLAY_PROPERTIES"]["teacher"]["DISPLAY_VALUE"];
if (is_array($t)) $t = implode(', ', $t);
echo $t.$comment;
?>
</td>
	</tr> 
	<?$count++;$total++;?>
<?endforeach;?>

<?if($total > 0):?>
  </table></div>
<?else:?>
  <p>в процессе формирования</p>
<?endif;?>

<script type="text/javascript" src="<?=CUtil::GetAdditionalFileURL('/render/js/timetable.js');?>"></script>