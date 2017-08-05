<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>   

<?

if(count($arResult["ITEMS"] > 1))
    //$arResult["MID"] = round(count($arResult["ITEMS"])/2)-1;
	$arResult["MID"] = 0;
else
    $arResult["MID"] = 0;
    
//используется для формирования JS объекта    
$arResult["JS_ITEMS"] = array();

require_once($_SERVER["DOCUMENT_ROOT"].'/render/timetable.php');
foreach($arResult["ITEMS"] as $k=>&$arItem){
    #gG($arItem["DISPLAY_PROPERTIES"],1,"props");
    //массив, 
    $tmpItem = array();
    //индекс в объекте (для вставки в DOM)
    $arItem["JS_ID"] = $k;
    $tmpItem["NAME"] = $arItem["NAME"];
	$tmpItem["PLACE"] = $arItem["DISPLAY_PROPERTIES"]["place_lenta"]["DISPLAY_VALUE"];
	$d = parseDateRange($arItem["DISPLAY_PROPERTIES"]["period"]["DISPLAY_VALUE"], $now);
	$tmpItem["PERIOD"] = $d["VALUE"].$d["COMPLETED"];
	$arCoords = explode(",",$arItem["PROPERTIES"]["map"]["VALUE"]);
	$tmpItem["X"] = $arCoords[0];
	$tmpItem["Y"] = $arCoords[1];
    //$tmpItem["MAP2"] =  str_replace('style="height: 500px; width: 600px;"', 'style="width: 258px; height: 180px; border: 1px solid #fff;"',  $arItem["DISPLAY_PROPERTIES"]["map"]["DISPLAY_VALUE"]);
    //$arItem["DISPLAY_PROPERTIES"]["map"]["DISPLAY_VALUE"] =  str_replace('style="height: 500px; width: 600px;"', 'style="width: 258px; height: 180px; border: 1px solid #fff;"',  $arItem["DISPLAY_PROPERTIES"]["map"]["DISPLAY_VALUE"]);
	$arItem["DISPLAY_PROPERTIES"]["map"]["ARR_VALUES"] =  explode(",",$arItem["PROPERTIES"]["map"]["VALUE"]);
	$tmpItem["URL"] = $arItem["DETAIL_PAGE_URL"];
	$tmpItem["SRC"] = $arItem["PREVIEW_PICTURE"]["SRC"];
	
    //индекс в объекте 
    $tmpItem["ID"] = $k;
    $arResult["JS_ITEMS"][$k] = $tmpItem;
}
