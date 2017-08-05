<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach ($arResult["PROPERTIES"]["photos"]["VALUE"] as $v => $Photo):
$arPhoto[$i] = CFile::GetPath($Photo);
$i++;
endforeach;?>
<?
$foto = CFile::GetPath($arResult["PROPERTIES"]["way_photo"]["VALUE"]);?>
<section class="map map_stl_big">
			
			<div class="map__c">
				 

				 <div class="map__b">
				 	<div class="map__b-h font-2">Как добраться</div>
				 	
				 	<?=htmlspecialcharsBack($arResult["PROPERTIES"]["way"]["VALUE"]["TEXT"])?>
					<ul class="js-accordion accordion">
						<li class="accordion__i">
							<div class="accordion__h">На машине</div>
							<div class="panel loading">
							<?=htmlspecialcharsBack($arResult["PROPERTIES"]["way_car"]["VALUE"]["TEXT"])?>
							</div>
						</li>
						<li class="accordion__i">
							<div class="accordion__h">На общественном транспорте</div>
							<div class="panel loading">
							<?=htmlspecialcharsBack($arResult["PROPERTIES"]["way_bus"]["VALUE"]["TEXT"])?>
							</div>
						</li>
					</ul>		
				 </div><!-- map__b -->
				
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

				<!-- <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=0-7JPnhJoKhTo4th-M08W7Bx37cd1A0g&width=100%&height=720"></script> -->

		</section><!-- bg -->



<section class="content">
	
	<div class="page__c">
		
		<div class="content-share">
			
			<div class="content-share__h">Поделиться с друзьями</div>
			
			<div class="share42init" data-url="http://www.aurayoga.ru<?=$APPLICATION->GetCurPage();?>" data-title="<?=$APPLICATION->GetTitle();?>"></div>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/share42.js"></script>
<script type="text/javascript">share42('<?=SITE_TEMPLATE_PATH?>/js/')</script>
<br/>
<div id="vk_comments_news"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments_news", {limit: 5, attach: "*", autoPublish: 0});
</script>
			
		</div><!-- content-share -->
		
		
	</div><!-- page__c -->

</section><!-- content -->


<section class="bg" style="background-image: url(<?=$foto?>);">
	
	<div class="page__c bg__middle">
		
		
	</div><!-- page__c -->

</section><!-- bg -->
