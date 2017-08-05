<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?$APPLICATION->RestartBuffer();?>

<?
$last_news_id = intval($_GET["last_news_id"]);
if (CModule::IncludeModule("iblock") && $last_news_id > 0)
{

	$arResult = Array();
	$arSelect = Array("IBLOCK_ID","ID","NAME","DATE_ACTIVE_FROM","PREVIEW_PICTURE","DETAIL_PAGE_URL","PREVIEW_TEXT");
	$arFilter = Array("IBLOCK_ID"=>1,"ACTIVE"=>"Y","<ID"=>$last_news_id);
	$rsMaterials = CIBlockElement::GetList(Array("ID"=>"DESC"), $arFilter, false, Array("nTopCount"=>9), $arSelect);
	
	while($obMaterials = $rsMaterials->GetNextElement()):
		$arFields = $obMaterials->GetFields();
		$arProps = $obMaterials->GetProperties();
				
		$pic = intval($arFields["PREVIEW_PICTURE"]) > 0 ? CFile::GetPath($arFields["PREVIEW_PICTURE"]) : "";		
		$arDate = explode(" ", $arFields["DATE_ACTIVE_FROM"]);	
		
		?>
		<li class="news__i find_articles" inner_id="<?=$arFields["ID"]?>">
		<a href="<?=$arFields["DETAIL_PAGE_URL"]?>" class="news__i-act">
			<img src="<?=$pic?>" alt="" class="news__i-img">
			<div class="news__i-h"><?=$arFields["NAME"]?></div>
		</a>
		<div class="news__i-txt">
			<?echo strip_tags($arFields["PREVIEW_TEXT"]);?></div>
		</li>
		
		<?
	endwhile;
}
?>