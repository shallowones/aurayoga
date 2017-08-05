<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
<section class="slider slider_stl_bot-sep" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);" id="<?=$this->GetEditAreaId($arItem['ID']);?>">	
	<div class="slider__act slider__act_lt_center">
		<div class="slider__act-in">
			<div class="slider__act-in-in">
				
				<div class="slider__inf font-2">
					<div class="slider__inf-h">Йога-лагерь Аура</div>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="slider__inf-sub-h"><?=$arItem["NAME"]?></a>
					<div class="font-1">
						<div class="slider__inf-small"><?=htmlspecialcharsBack($arItem["PROPERTIES"]["place_lenta"]["VALUE"]["TEXT"])?></div>
						<div class="slider__inf-date"><?echo $arItem["PROPERTIES"]["period"]["VALUE"]?></div>
						
							
							<div id="map-1" style="width: 258px; height: 180px; border: 1px solid #fff;"></div>
							
							<?=htmlspecialcharsBack($arItem["PROPERTIES"]["map_lenta"]["VALUE"]["TEXT"]);?>
							
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="slider__inf-more">Подробнее о месте</a>
					</div>
				</div>
				
			</div><!-- slider__act-in-in -->
		</div><!-- slider__act-in -->
	</div><!-- slider__act slider__act_lt_center -->
</section>
<?endforeach;?>
