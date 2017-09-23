<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$placeMark = 2?>
<section class="top-page map">
	
	<div class="page__c page__c_lt_map">
				
		<div class="top-page__h-wrap top-page__h-wrap_center-map">
			<div class="top-page__h font-2">Места проведения</div>
		</div>


	</div><!-- page__c -->

<?
include_once($_SERVER["DOCUMENT_ROOT"].'/render/include/ip2locationlite.class.php');
if(!$_COOKIE["geolocation"])
{
  $ipLite = new ip2location_lite;
  $ipLite->setKey('940acc65eead34ae1d02864b1516341024bdb80076e045077fc59beab0bb48cf');
  $location = $ipLite->getCity($_SERVER['REMOTE_ADDR']);
  if ($location['statusCode'] == 'OK') {
    $data = base64_encode(serialize($location));
    setcookie("geolocation", $data, time()+3600*24*7);
  }
}
else
{
  $location = unserialize(base64_decode($_COOKIE["geolocation"]));
}
$point = '';
if (!empty($location) && is_array($location)) $point = '['.$location["latitude"].','.$location["longitude"].']';

require_once($_SERVER["DOCUMENT_ROOT"].'/render/timetable.php');
?>

		<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard,package.geoObjects,package.geoQuery,package.search&lang=ru-RU" type="text/javascript"></script>
		<div id="map" style="width: 100%; height: 100%;"></div>
		<script type="text/javascript">
			ymaps.ready(init);
			var myMap;
		
			function init(){    
var auras = []; 
				myMap = new ymaps.Map ("map", {
					center: [50.356076, 47.718848],
					zoom: 4
				}),

				myMap.controls
					// Кнопка изменения масштаба.
					.add('zoomControl', { left: 5, top: 5 })
					// Список типов карты
					.add('typeSelector', { right: 100, top: 5 })
					// Стандартный набор кнопок
					.add('mapTools', { left: 35, top: 5 }),
				<?foreach($arResult["ITEMS"] as &$i1):?>
				<?$i1["DT"] = parseDateRange($i1["PROPERTIES"]["period"]["VALUE"], $now);?>
				myPlacemark<?=$placeMark?> = new ymaps.Placemark([<?=$i1["PROPERTIES"]["map"]["VALUE"]?>], {
					// Свойства.
					balloonContent: 'Йога-лагерь "Аура" <a href="<?=$i1["DETAIL_PAGE_URL"]?>"><?=$i1["NAME"]?></a> <?=$i1["DT"]["COMPLETED"];?>',
url: 'йога-лагерь "Аура" <a href="<?=$i1["DETAIL_PAGE_URL"]?>"><?=$i1["NAME"]?></a>', completed: '<?=$i1["DT"]["COMPLETED"];?>'
				}, {
					// Опции.
					// Своё изображение иконки метки.
					iconImageHref: '<?=SITE_TEMPLATE_PATH?>/images/map-icon.png',
					// Размеры метки.
					iconImageSize: [26, 27],
					// Смещение левого верхнего угла иконки относительно
					// её "ножки" (точки привязки).
					iconImageOffset: [-13, -13]
				});
auras.push(myPlacemark<?=$placeMark?>);
				<?$placeMark++?>
				<?endforeach;?>
				

				// Добавляем все метки на карту.
				myMap.geoObjects
				<?$placeMark = 2?>
				<?foreach($arResult["ITEMS"] as $i2):?>
					.add(myPlacemark<?=$placeMark?>)
					<?$placeMark++?>
				<?endforeach;?>
<?if(!empty($point)):?>
var auras = ymaps.geoQuery(auras), loc;
loc = ymaps.geoQuery(ymaps.geocode(<?=$point;?>)).then(function() {
  var c = auras.getClosestTo(loc.get(0));
  if (c) {
    myMap.setCenter(c.geometry.getCoordinates());
    c.properties.set({ balloonContent: 'Ближайший '+c.properties.get('url') + c.properties.get('completed') });
    c.balloon.open();
  }
}, function(reason) {
  console.log('Not found: '+reason);
});
<?endif;?>
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
<?
$d = $arItem["DT"];
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
						<div class="slider__inf-date"><?=$d["VALUE"];?><?=$d["COMPLETED"];?></div>
						
							
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
