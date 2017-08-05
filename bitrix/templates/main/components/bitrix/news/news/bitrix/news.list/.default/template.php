<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news">
	<ul class="news__lst" id="inner_news">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?><br />
	<?endif;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<li class="news__i" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news__i-act">
				<img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="" class="news__i-img" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"/>
				<div class="news__i-h"><?=$arItem["NAME"]?></div>
			</a>
		<div class="news__i-date"><?echo  ($arItem['TIMESTAMP_X'])?></div>
		<?$last_new_id = $arItem["ID"];?>
	<?endforeach;?>
	</ul>
</div>
<div class="news__more">
	<a class="button newsweek" last_new_id="<?=$last_new_id?>">Посмотреть еще</a>
	<div id="load_process_materials" style="display:none;width:100%;text-align:center;">Загрузка...</div>
</div>