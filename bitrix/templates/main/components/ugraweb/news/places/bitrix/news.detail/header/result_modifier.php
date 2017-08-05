<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->__component->SetResultCacheKeys(array("CACHED_TPL"));?>
<?
$arFilter = array("IBLOCK_ID" => $arResult['IBLOCK_ID'], "ACTIVE"=>"Y");
if (CModule::IncludeModule("iblock"))
{
$rs = CIBlockElement::GetList(array("SORT"=>"ASC"),$arFilter,false,false,array('ID','NAME','DETAIL_PAGE_URL'));
$i=0;
while ($ar = $rs -> GetNext()) {
   $arNavi[$i] = $ar;
   if ($ar['ID'] == $arResult['ID']) $iCurPos = $i;
   $i++;
}
$count = count($arNavi);
$arResult['LINK'] = array();
$arResult['LINK']['PREVIOUS'] = isset($arNavi[$iCurPos - 1]) ? $arNavi[$iCurPos - 1] : $arNavi[$count-1];
$arResult['LINK']['NEXT'] = isset($arNavi[$iCurPos+1]) ? $arNavi[$iCurPos+1] : $arNavi[0];
?>
<?$i = 0;
}
?>