<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
/* Фильтр записей инфоблока 
(если используется рабиение по разделам, 
то к фильтру нужно добавить 
"SECTION_ID" => $arResult['IBLOCK_SECTION_ID']) */
$arFilter = array("IBLOCK_ID" => $arResult['IBLOCK_ID']);
// Выбиреам записи
$rs = CIBlockElement::GetList(array("SORT"=>"ASC"),$arFilter,false,false,array('ID','NAME','DETAIL_PAGE_URL'));
$i=0;
while ($ar = $rs -> GetNext()) {
   $arNavi[$i] = $ar;
        // Если ID полученной записи равен ID новости которая отображается, то запоминаем ее номер
   if ($ar['ID'] == $arResult['ID']) $iCurPos = $i;
   $i++;
}
// Заполняем массив информацией о следующей и предыдущей записи
// Ключ предыдущего элемента будет [$iCurPos - 1]
// Ключ следующего элемента будет [$iCurPos + 1]
// Если элементы массива с этими ключами существуют то сохраняем их, иначе осталяем пустыми
// $arLink - массив со ссылками на след и предыд новости
$arLink = array();
$arLink['PREVIOUS'] = isset($arNavi[$iCurPos - 1]) ? $arNavi[$iCurPos - 1] : '';
$arLink['NEXT'] = isset($arNavi[$iCurPos+1]) ? $arNavi[$iCurPos+1] : '';
?>
<?$i = 0;?>
<?foreach ($arResult["PROPERTIES"]["photos"]["VALUE"] as $v => $Photo):
$arPhoto[$i] = CFile::GetPath($Photo);
$i++;
endforeach;?>
<section class="slider">
			<?if (is_array($arLink['PREVIOUS'])):?>
			<div class="slider__act slider__act_lt_left">
				<div class="slider__act-in">
					<div class="slider__act-in-in">
						
						<a href="<?=$arLink['PREVIOUS']['DETAIL_PAGE_URL']?>" class="slider__inf font-2">
							<div class="slider__inf-h">Йога-лагерь Аура</div>
							<div class="slider__inf-sub-h slider__inf-sub-h_stl_u"><?=$arLink['PREVIOUS']['NAME']?></div>
						</a>
						
					</div><!-- slider__act-in-in -->
				</div><!-- slider__act-in -->
			</div><!-- slider__act -->
			<?endif;?>
			
			<div class="slider__act slider__act_lt_center">
				<div class="slider__act-in">
					<div class="slider__act-in-in">
						
						<div class="slider__inf font-2">
							<div class="slider__inf-h">Йога-лагерь Аура</div>
							<div class="slider__inf-sub-h"><?=$arResult["NAME"]?></div>
						</div>
						
					</div><!-- slider__act-in-in -->
				</div><!-- slider__act-in -->
			</div><!-- slider__act -->
			<?if (is_array($arLink['NEXT'])):?>
			<div class="slider__act slider__act_lt_right">
				<div class="slider__act-in">
					<div class="slider__act-in-in">
						
						<a href="<?=$arLink['NEXT']['DETAIL_PAGE_URL']?>" class="slider__inf font-2">
							<div class="slider__inf-h">Йога-лагерь Аура</div>
							<div class="slider__inf-sub-h slider__inf-sub-h_stl_u"><?=$arLink['NEXT']['NAME']?></div>
						</a>
						
					</div><!-- slider__act-in-in -->
				</div><!-- slider__act-in -->
			</div><!-- slider__act -->
			<?endif;?>	
				<div class="main-img-changer">
					
					<div class="main-img-changer__tabs-wrapper">
						<ul class="main-img-changer__tabs">
							<?$i=1;
							foreach ($arPhoto as $v => $Photo):?>
							
							<li class="main-img-changer__tabs-item">
								<span class="main-img-changer__tabs-item-inner"><?=$i?></span>
							</li>
							<?
							$i++;
							endforeach?>
						</ul>
					</div><!-- main-img-changer__tabs-wrapper -->
					
					<ul class="main-img-changer__output">
						<?foreach ($arPhoto as $v => $Photo):?>
						<li class="main-img-changer__output-item">
							<div class="main-img-changer__output-item-img" style="background: url(<?=$Photo?>) center 0;">
							</div>
						</li>
						<?endforeach;?>
					</ul>
				
				</div><!-- .main-img-changer -->			
				<div class="page__c">
					 
				
					 
					    
					
				</div><!-- page__c -->
				
				<div class="section-nav font-2">
				
					<div class="section-nav__in">
						<ul class="section-nav__lst">
							<li class="section-nav__i"><a href="#" class="section-nav__act">О месте</a></li>
							<li class="section-nav__i"><a href="#" class="section-nav__act">Расписание</a></li>
							<li class="section-nav__i"><a href="#" class="section-nav__act">Отзывы</a></li>
							<li class="section-nav__i section-nav__i_stt_cur"><a href="#" class="section-nav__act">Как добраться</a></li>
							<li class="section-nav__i"><a href="#" class="section-nav__act">Контакты</a></li>
						</ul>
					</div><!-- section-nav__in -->
					            <div class="clearfix-block"></div>
				</div><!-- .section-nav -->

		</section><!-- slider -->
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):?>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			<br />
	<?endforeach;?>
	<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;?>
	<?
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>
