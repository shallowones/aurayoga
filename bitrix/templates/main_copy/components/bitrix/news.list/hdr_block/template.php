<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<h1 id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="section-h"><?=$arItem["NAME"]?></h1>
	<p><?echo $arItem["PREVIEW_TEXT"]?></p>
	<?if ($arItem["CODE"]):?>
<p class="more"><a href="<?=$arItem["CODE"]?>">Подробнее</a></p>
	<?endif;?>
<?endforeach;?>
