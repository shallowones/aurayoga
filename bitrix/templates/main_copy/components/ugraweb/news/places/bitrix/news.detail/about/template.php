<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach ($arResult["PROPERTIES"]["photos"]["VALUE"] as $v => $Photo):
$arPhoto[$i] = CFile::GetPath($Photo);
$i++;
endforeach;?>
<?$foto1 = CFile::GetPath($arResult["PROPERTIES"]["about_photo_1"]["VALUE"]);
$foto2 = CFile::GetPath($arResult["PROPERTIES"]["about_photo_2"]["VALUE"]);?>
<section class="content">
	
	<div class="page__c">
		<div class="article-more js-article-more">
		
		<?echo $arResult["DETAIL_TEXT"];?>
		
		<div class="more article-more__btn"><a class="dotted js-article-more-btn"><span class="dotted__txt">Читать дальше</span></a></div>

	</div><!-- page__c -->

</section>
<section class="bg" style="background-image: url(<?=$foto1?>);">
	
	<div class="page__c bg__middle">
	</div><!-- page__c -->

</section>
<section class="content">
	
	<div class="page__c">
		
		<h1>Условия участия</h1>
		
		<?=htmlspecialcharsBack($arResult["PROPERTIES"]["terms"]["VALUE"]["TEXT"]);?>
		
	</div><!-- page__c -->

</section>
<section class="bg" style="background-image: url(<?=$foto2?>);">
	
	<div class="page__c bg__middle">
		
		
	</div><!-- page__c -->

</section>
<section class="content">
	
	<div class="page__c">
		
		<h1>Как добраться</h1>
		
		<?=htmlspecialcharsBack($arResult["PROPERTIES"]["way_short"]["VALUE"]["TEXT"]);?>
		
		<p class="more"><a href="../way/">Подробнее</a></p>
		
		
	</div><!-- page__c -->

</section>
<section class="map">
	
	<div class="map__c">
		
	</div><!-- map__c -->
	
		<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
		<div id="map" style="width: 100%; height: 100%;"></div>
		<script type="text/javascript">
				    ymaps.ready(init);
				    var myMap;
				
				    function init(){     
				        myMap = new ymaps.Map ("map", {
				            center: [<?=$arResult["PROPERTIES"]["map"]["VALUE"]?>],
				            zoom: 10
				        }),

					    myMap.controls
					        // Кнопка изменения масштаба.
					        .add('zoomControl', { left: 5, top: 5 })
					        // Список типов карты
					        .add('typeSelector', { right: 100, top: 5 })
					        // Стандартный набор кнопок
					        .add('mapTools', { left: 35, top: 5 }),

				        myPlacemark2 = new ymaps.Placemark([<?=$arResult["PROPERTIES"]["map"]["VALUE"]?>], {
				            // Свойства.
				            hintContent: 'Йога-лагерь Аура <?=$arResult["NAME"]?>'
				        }, {
				            // Опции.
				            // Своё изображение иконки метки.
				            iconImageHref: '<? echo SITE_TEMPLATE_PATH?>/images/map-icon.png',
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

</section><!-- bg -->
