<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Test");
$APPLICATION->SetTitle("Test");
?>

<?if (!$USER->IsAdmin()):?>
<?
  CHTTP::SetStatus("404 Not Found");
  include($_SERVER["DOCUMENT_ROOT"]."/404.php");
?>
<?else:?>

<?
//require_once($_SERVER["DOCUMENT_ROOT"].'/render/render.php');
?>

<h2>Test</h2>

<?
CModule::IncludeModule('iblock');

$camps = array();
$arSelect = array("ID", "CODE", "NAME");
$arFilter = array("IBLOCK_ID"=>11, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement())
{ 
 $arFields = $ob->GetFields();  
 $camps[$arFields["ID"]] = $arFields;
}

$count = 0;
$arSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*");
$arFilter = array("IBLOCK_ID"=>5, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement())
{ 
  $arFields = $ob->GetFields();
  $id = $arFields["ID"];
  $arProp = $ob->GetProperty('place');
  $cid = $arProp["VALUE"];
  $arProp = $ob->GetProperty('name');
  $name = array($arProp["VALUE"]);
  $arProp = $ob->GetProperty('surname');
  $name[] = $arProp["VALUE"];
  $u = array(
    "NAME" => '['.$camps[$cid]["NAME"].'] '.$arFields["NAME"],
    "PREVIEW_TEXT" => implode(' ', $name) 
  );
  $element = new CIBlockElement();
  if (!$element->Update($id, $u, false, false, false, false)) echo 'Error: '.$element->LAST_ERROR;
  $count++;
}
echo 'Обработано заявок: '.$count;
?>

<?endif;?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>