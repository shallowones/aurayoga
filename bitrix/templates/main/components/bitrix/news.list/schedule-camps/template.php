<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
require_once($_SERVER["DOCUMENT_ROOT"].'/render/timetable.php');
$now = new DateTime();
?>

<h1 id="camp-<?=$arResult["ITEMS"][0]["PROPERTIES"]["camp"]["VALUE"];?>"></h1>
<p></p>
<div class="camp">
<table class="custom-table caption">
	<tr class="custom-table__header">
		<td colspan="3" width="50%">Даты занятий</td>
		<td width="50%">Преподаватель</td>
	</tr></table>

<?
$count = 1;
$prev_m = '';
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

        $dt = parseDateProperty($arItem["PROPERTIES"]["date"]["VALUE"]);
        $dte = parseDateProperty($arItem["PROPERTIES"]["date_end"]["VALUE"]);
        if (!empty($dte)) $dt = $dte;

	$comment = $arItem["PROPERTIES"]["comment"]["VALUE"];
	if (!empty($comment)) $comment = ' ('.$comment.')';

	if ($arItem["PROPERTIES"]["date"]["VALUE"]):
			$date_1 = $arItem["PROPERTIES"]["date"]["VALUE"];
			$date_m1 = TimetableMonth($date_1);
	endif;

	if ($arItem["PROPERTIES"]["date_end"]["VALUE"]):
			$date_2 = $arItem["PROPERTIES"]["date_end"]["VALUE"];
			$date_m2 = TimetableMonth($date_2);
	endif;

if ($date_m1 != $prev_m)
{
  if (!empty($prev_m)) echo '</table></div>';
  $mref = str_translit($date_m1);
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
			<?if ($arItem["PROPERTIES"]["date"]["VALUE"] == $arItem["PROPERTIES"]["date_end"]["VALUE"]):?>
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
	<?$count++ ?>
<?endforeach;?>

<?if($count > 1):?>
  </table></div>
<?else:?>
  <p>в процессе формирования</p>
<?endif;?>
</div>

<script type="text/javascript" src="<?=CUtil::GetAdditionalFileURL('/render/js/timetable.js');?>"></script>