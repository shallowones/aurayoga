<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script>
    var itemsObj = <? echo CUtil::PhpToJSObject($arResult["JS_ITEMS"], false, true); ?>;
    $(function(){
        $("a.slider__inf").on('click', function(e){
            var curItem = itemsObj[ parseInt($(this).data("id")) ];
            var centerDOM = $("div.slider__act_lt_center");
            
            centerDOM.hide();
			$("a.slider__inf-sub-h").attr("href", curItem.URL );
            $("div.slider__inf > a.slider__inf-sub-h").text( curItem.NAME );
			$("div.slider__inf-small").html( curItem.PLACE );
			$("div.slider__inf-date").html( curItem.PERIOD );
			$("a.slider__inf-more").attr("href", curItem.URL );
			$(".slider").attr("style", "background-image: url("+curItem.SRC+");");
			$("#map").html(" ");
			ymaps.ready(init);
			var myMap;
			
			function init(){     
				myMap = new ymaps.Map ("map", {
					center: [curItem.X,curItem.Y],
					zoom: 8
				}),

				myMap.controls
					// Кнопка изменения масштаба.
					.add('zoomControl', { left: 5, top: 5 })
					// Список типов карты
					.add('typeSelector', { right: 5, top: 5 })

				myPlacemark2 = new ymaps.Placemark([curItem.X,curItem.Y], {
					// Свойства.
					hintContent: 'Йога-лагерь Аура '+curItem.NAME
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
            centerDOM.fadeIn();
            
            var lefttIndex = parseInt(curItem.ID) - 1;
            if( itemsObj[ lefttIndex ] == undefined){
				lefttIndex = itemsObj.length-1;
			}
				$("div.slider__act_lt_left div.slider_inf-h__item").text( itemsObj[ lefttIndex ].NAME )
                $("div.slider__act_lt_left a.slider__inf").data( 'id', itemsObj[ lefttIndex ].ID )
                $("div.slider__act_lt_left").show();
                //$("div.slider__act_lt_left").fadeOut();
            
            var rightIndex = parseInt(curItem.ID) + 1;
            if( itemsObj[ rightIndex ] == undefined){
				rightIndex = 0;
			}
                //$("div.slider__act_lt_right").fadeOut();
				$("div.slider__act_lt_right div.slider_inf-h__item").text( itemsObj[ rightIndex ].NAME )
                $("div.slider__act_lt_right a.slider__inf").data( 'id', itemsObj[ rightIndex ].ID )
                
                
                $("div.slider__act_lt_right").show();
                //slider__inf-sub-h
                
                
            
            
            console.log(itemsObj.current);
            e.preventDefault();
        })
    })
</script>
<?$total = count($arResult['ITEMS']);?>
<?$leftItem = isset($arResult['ITEMS'][ $arResult["MID"] - 1 ]) ? $arResult['ITEMS'][ $arResult["MID"] - 1 ] : $arResult['ITEMS'][$total-1];?>
<?
require_once($_SERVER["DOCUMENT_ROOT"].'/render/timetable.php');
$midItem = $arResult['ITEMS'][ $arResult["MID"] ]; gG($midItem["DISPLAY_PROPERTIES"],1,"props");
$d = parseDateRange($midItem["DISPLAY_PROPERTIES"]["period"]["DISPLAY_VALUE"], $now);
?>
<section class="slider" style="background-image: url(<?=$midItem["PREVIEW_PICTURE"]["SRC"]?>);">
          
	<div class="slider__act slider__act_lt_left" <?($arResult['ITEMS'][ $arResult["MID"] - 1 ])?"":"style='display:none;'"?>>
		<div class="slider__act-in">
			<div class="slider__act-in-in">
				
				<a href="#" class="slider__inf font-2" data-id="<?=$leftItem["JS_ID"]?>">
					<div class="slider__inf-h">Йога-лагерь Аура</div>
					<div class="slider__inf-h slider_inf-h__item"><?=$leftItem["NAME"]?></div>
				</a>
				
			</div><!-- slider__act-in-in -->
		</div><!-- slider__act-in -->
	</div><!-- slider__act -->
	
	<div class="slider__act slider__act_lt_center">
		<div class="slider__act-in">
			<div class="slider__act-in-in">
				
				<div class="slider__inf font-2">
					<div class="slider__inf-h">Йога-лагерь Аура</div>
					<a href="<?=$midItem["DETAIL_PAGE_URL"]?>" class="slider__inf-sub-h"><?=$midItem["NAME"]?></a>
					<div class="font-1">
						<div class="slider__inf-small"><?=$midItem["DISPLAY_PROPERTIES"]["place_lenta"]["DISPLAY_VALUE"]?></div>
						<div class="slider__inf-date"><?=$d["VALUE"];?><?=$d["COMPLETED"];?></div>
						<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
						<div id="map" style="width: 258px; height: 180px; border: 1px solid #fff;"></div>
						<script type="text/javascript">
						ymaps.ready(init);
							var myMap;
						
							function init(){     
								myMap = new ymaps.Map ("map", {
									center: [<?=$midItem["PROPERTIES"]["map"]["VALUE"]?>],
									zoom: 8
								}),
	
								myMap.controls
									// Кнопка изменения масштаба.
									.add('zoomControl', { left: 5, top: 5 })
									// Список типов карты
									.add('typeSelector', { right: 5, top: 5 })

								myPlacemark2 = new ymaps.Placemark([<?=$midItem["PROPERTIES"]["map"]["VALUE"]?>], {
									// Свойства.
									hintContent: 'Йога-лагерь Аура <?=$midItem["NAME"]?>'
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
	
						<? /*<div class="y-map" >
						<?$map = explode(",",$midItem["PROPERTIES"]["map"]["VALUE"]);
						print_r ($map);
						?>
						<? /*
						<?$APPLICATION->IncludeComponent("bitrix:map.yandex.view", ".default", array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:3:{s:10:\"yandex_lat\";d:44.5937250000206;s:10:\"yandex_lon\";d:38.02503899999998;s:12:\"yandex_scale\";i:10;}",
		"MAP_WIDTH" => "258",
		"MAP_HEIGHT" => "180",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"OPTIONS" => array(
			0 => "ENABLE_DRAGGING",
		),
		"MAP_ID" => ""
		),
		false
	); 
						</div> */?>
							<?#=$midItem["DISPLAY_PROPERTIES"]["map"]["DISPLAY_VALUE"]?>
						
							
						
						
						<a href="<?=$midItem["DETAIL_PAGE_URL"]?>" class="slider__inf-more">Подробнее о месте</a>
					</div>
				</div>
				
			</div><!-- slider__act-in-in -->
		</div><!-- slider__act-in -->
	</div><!-- slider__act -->
	
	<?$rightItem = $arResult['ITEMS'][ $arResult["MID"] + 1 ]?>
	<div class="slider__act slider__act_lt_right" <?=($arResult['ITEMS'][ $arResult["MID"] + 1 ])?"":"style='display:none;'"?>>
		<div class="slider__act-in">
			<div class="slider__act-in-in">
				
				<a href="#" class="slider__inf font-2" data-id="<?=$rightItem["JS_ID"]?>">
					<div class="slider__inf-h">Йога-лагерь Аура</div>
					<div class="slider__inf-h slider_inf-h__item"><?=$rightItem["NAME"]?></div>
				</a>
				
			</div><!-- slider__act-in-in -->
		</div><!-- slider__act-in -->
	</div><!-- slider__act -->
	
	<div class="page__c">
		
		
		
	</div><!-- page__c -->

</section><!-- bg -->
