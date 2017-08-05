<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$placeMark = 2?>
<section class="top-page">
	
	<div class="page__c page__c_lt_map">
				
		<div class="top-page__h-wrap top-page__h-wrap_center-map">
			<div class="top-page__h font-2">Места проведения</div>
		</div>


	</div><!-- page__c -->
	
	
		<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
		<div id="map" style="width: 100%; height: 100%;"></div>
		<script type="text/javascript">
			ymaps.ready(init);
			var myMap;
		
			function init(){     
				myMap = new ymaps.Map ("map", {
					center: [50.356076, 47.718848],
					zoom: 5
				}),

				myMap.controls
					// Кнопка изменения масштаба.
					.add('zoomControl', { left: 5, top: 5 })
					// Список типов карты
					.add('typeSelector', { right: 100, top: 5 })
					// Стандартный набор кнопок
					.add('mapTools', { left: 35, top: 5 }),
				<?foreach($arResult["ITEMS"] as $arItem):?>
				myPlacemark<?=$placeMark?> = new ymaps.Placemark([<?=$arItem["PROPERTIES"]["map"]["VALUE"]?>], {
					// Свойства.
					hintContent: 'Йога-лагерь Аура <?=$arItem["NAME"]?>'
				}, {
					// Опции.
					// Своё изображение иконки метки.
					iconImageHref: '<?=SITE_TEMPLATE_PATH?>/images/map-icon.png',
					// Размеры метки.
					iconImageSize: [26, 27],
					// Смещение левого верхнего угла иконки относительно
					// её "ножки" (точки привязки).
					iconImageOffset: [0, 0]
				});
				<?$placeMark++?>
				<?endforeach;?>
				

				// Добавляем все метки на карту.
				myMap.geoObjects
				<?$placeMark = 2?>
				<?foreach($arResult["ITEMS"] as $arItem):?>
					.add(myPlacemark<?=$placeMark?>)
					<?$placeMark++?>
				<?endforeach;?>

			}
		</script>
	
	<div class="section-nav font-2">
	

	</div><!-- .section-nav -->

</section><!-- top-page -->
<?$map = 1;?>
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
						
							
							<div id="map-<?=$map?>" style="width: 258px; height: 180px; border: 1px solid #fff;"></div>
							<script type="text/javascript">					ymaps.ready(init);
									    var myMap;
									
									    function init(){     
									        myMap = new ymaps.Map ("map-<?=$map?>", {
									            center: [<?=$arItem["PROPERTIES"]["map"]["VALUE"]?>],
									            zoom: 8
									        }),

										    myMap.controls
										        // Кнопка изменения масштаба.
										        .add('zoomControl', { left: 5, top: 5 })
										        // Список типов карты
										        .add('typeSelector', { right: 5, top: 5 })

									        myPlacemark2 = new ymaps.Placemark([<?=$arItem["PROPERTIES"]["map"]["VALUE"]?>], {
									            // Свойства.
									            hintContent: 'Йога-лагерь Аура <?=$arItem["NAME"]?>'
									        }, {
									            // Опции.
									            // Своё изображение иконки метки.
									            iconImageHref: '<?=SITE_TEMPLATE_PATH?>/images/map-icon.png',
									            // Размеры метки.
									            iconImageSize: [26, 27],
									            // Смещение левого верхнего угла иконки относительно
									            // её "ножки" (точки привязки).
									            iconImageOffset: [0, 0]
									        });

										    // Добавляем все метки на карту.
										    myMap.geoObjects
										        .add(myPlacemark2)

									    }
							</script>
							
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="slider__inf-more">Подробнее о месте</a>
					</div>
				</div>
				
			</div><!-- slider__act-in-in -->
		</div><!-- slider__act-in -->
	</div><!-- slider__act slider__act_lt_center -->
</section>
<?$map++;?>
<?endforeach;?>
