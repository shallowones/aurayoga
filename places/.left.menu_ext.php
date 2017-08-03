<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
 
global $APPLICATION;
 
if(CModule::IncludeModule("iblock")) {
	$i = 0;
    $IBLOCK_ID = 11; // указываем инфоблок с элементами
 
    $arOrder = Array("SORT"=>"DESC");
    $arSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
 
    while($ob = $res->GetNextElement()) // наполняем массив меню пунктами меню
    {
        $arFields = $ob->GetFields();
        $aMenuLinksExt[$i] = Array(
            $arFields['NAME'],
            $arFields['DETAIL_PAGE_URL'],
            Array(),
            Array("FROM_IBLOCK" => 11, "DEPTH_LEVEL" => 1, "IS_PARENT" => true),
            ""
        );
		$aMenuLinksExt[$i+1] = Array(
            "О месте",
            $arFields['DETAIL_PAGE_URL']."/about/",
            Array(),
            Array("FROM_IBLOCK" => 11, "DEPTH_LEVEL" => 2),
            ""
        );
		$aMenuLinksExt[$i+2] = Array(
            "Расписание",
            $arFields['DETAIL_PAGE_URL']."/schedule/",
            Array(),
            Array("FROM_IBLOCK" => 11, "DEPTH_LEVEL" => 2),
            ""
        );
		$aMenuLinksExt[$i+3] = Array(
            "Условия",
            $arFields['DETAIL_PAGE_URL']."/terms/",
            Array(),
            Array("FROM_IBLOCK" => 11, "DEPTH_LEVEL" => 2),
            ""
        );
		$aMenuLinksExt[$i+4] = Array(
            "Отзывы",
            $arFields['DETAIL_PAGE_URL']."/reviews/",
            Array(),
            Array("FROM_IBLOCK" => 11, "DEPTH_LEVEL" => 2),
            ""
        );
		$aMenuLinksExt[$i+5] = Array(
            "Попутчики",
            $arFields['DETAIL_PAGE_URL']."/travel/",
            Array(),
            Array("FROM_IBLOCK" => 11, "DEPTH_LEVEL" => 2),
            ""
        );
		$aMenuLinksExt[$i+6] = Array(
            "Как добраться",
            $arFields['DETAIL_PAGE_URL']."/way/",
            Array(),
            Array("FROM_IBLOCK" => 11, "DEPTH_LEVEL" => 2),
            ""
        );
		$aMenuLinksExt[$i+7] = Array(
            "Контакты",
            $arFields['DETAIL_PAGE_URL']."/contacts/",
            Array(),
            Array("FROM_IBLOCK" => 11, "DEPTH_LEVEL" => 2),
            ""
        );
		$i = $i+8;
    }   
}
 
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks); // меню сформировано
?>