<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="content" style="margin-top:-58px;">
	<div class="page__c">
		<h2 class="section-h">Преподаватели</h2>

<?
$tutors = array();
$tutors_active = array();
$arS = array("ID", "IBLOCK_ID");
$arF = array("IBLOCK_ID"=>12, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(array("ID"=>"ASC"), $arF, false, false, $arS);
while($ob = $res->GetNextElement())
{
  $arProp = $ob->GetProperty("CAMP");
  $c = $arProp["VALUE"];
  if (!array_key_exists($c, $tutors)) $tutors[$c] = array();

  $arProp = $ob->GetProperty("TEACHER");
  $ta = $arProp["VALUE"];
  if (!is_array($ta)) $ta = array($ta);
  foreach ($ta as $t) { $tutors[$c][] = $t; $tutors_active[] = $t; }
}

$camps = array();
$arS = array("ID", "IBLOCK_ID", "NAME");
$arF = array("IBLOCK_ID"=>11, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(array("ID"=>"ASC"), $arF, false, false, $arS);
while($ob = $res->GetNextElement()) $camps[] = $ob->GetFields();
if (count($camps) > 0)
{
  echo '<script type="text/javascript" src="'.CUtil::GetAdditionalFileURL('/render/js/isotope.min.js').'"></script>';
  echo '<div id="camp-filter"><button class="is-checked" data-filter="*">Все</button>';
  foreach ($camps as $c) echo '<button data-filter=".camp-'.$c["ID"].'">'.$c["NAME"].'</button>';
  echo '</div><span class="rendered separator"></span>';
}
$camps_used = array();
?>

		<div class="news">
			<ul class="news__lst">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
<?
if (!in_array($arItem["ID"], $tutors_active)) continue;
?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
<?
$tc = '';
foreach ($tutors as $k => $ta) if (in_array($arItem["ID"], $ta)) { $tc .= ' camp-'.$k; $camps_used[] = $k; }
$img = $arItem["PREVIEW_PICTURE"]["SRC"];
if (empty($img)) $img = '/images/placeholder_300x225.png';
?>
				<li class="news__i tutor<?=$tc;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news__i-act">
						<img src="<?=$img;?>" alt="" class="news__i-img">
						<div class="news__i-h"><?echo $arItem["NAME"]?></div>
					</a>
				</li>			
	<?endforeach;?>
			</ul>
<?
echo '<div id="camps-empty" style="display:none;"><ul>';
foreach ($camps as $c)
{
  if (!in_array($c["ID"], $camps_used)) echo '<li>.camp-'.$c["ID"].'</li>';
}
echo '</ul></div>';
?>
		</div>
	</div>
</section>
</div>
</section>