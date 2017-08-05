<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="content" style="margin-top:-58px;">
	<div class="page__c">
		<h2 class="section-h">Преподаватели</h2>
		<div class="news">
			<ul class="news__lst">
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
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="" class="news__i-img">
						<div class="news__i-h"><?echo $arItem["NAME"]?></div>
					</a>
				</li>			
	<?endforeach;?>
			</ul>
		</div>
	</div>
</section>
</div>
</section>