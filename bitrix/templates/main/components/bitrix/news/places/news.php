<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arParams["USE_RSS"]=="Y"):?>
	<?
	if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" href="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" />');
	?>
	<a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"]?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
<?endif?>

<?if($arParams["USE_SEARCH"]=="Y"):?>
<?=GetMessage("SEARCH_LABEL")?><?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	Array(
		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
	),
	$component
);?>
<br />
<?endif?>
<?if($arParams["USE_FILTER"]=="Y"):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.filter",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
	),
	$component
);
?>
<br />
<?endif?>
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

				        myPlacemark2 = new ymaps.Placemark([44.581837, 38.242711], {
				            // Свойства.
				            hintContent: 'Йога-лагерь Аура на Жане'
				        }, {
				            // Опции.
				            // Своё изображение иконки метки.
				            iconImageHref: 'images/map-icon.png',
				            // Размеры метки.
				            iconImageSize: [26, 27],
				            // Смещение левого верхнего угла иконки относительно
				            // её "ножки" (точки привязки).
				            iconImageOffset: [0, 0]
				        }),

				        myPlacemark3 = new ymaps.Placemark([56.956628, 38.812296], {
				            // Свойства.
				            hintContent: 'Йога-лагерь Аура, КЦ Аура'
				        }, {
				            // Опции.
				            // Своё изображение иконки метки.
				            iconImageHref: 'images/map-icon.png',
				            // Размеры метки.
				            iconImageSize: [26, 27],
				            // Смещение левого верхнего угла иконки относительно
				            // её "ножки" (точки привязки).
				            iconImageOffset: [0, 0]
				        }),

				        myPlacemark4 = new ymaps.Placemark([44.470533, 38.40137], {
				            // Свойства.
				            hintContent: 'Йога-лагерь Аура на Пшаде'
				        }, {
				            // Опции.
				            // Своё изображение иконки метки.
				            iconImageHref: 'images/map-icon.png',
				            // Размеры метки.
				            iconImageSize: [26, 27],
				            // Смещение левого верхнего угла иконки относительно
				            // её "ножки" (точки привязки).
				            iconImageOffset: [0, 0]
				        });

				        myPlacemark5 = new ymaps.Placemark([55.936706, 61.220748], {
				            // Свойства.
				            hintContent: 'Йога-лагерь Аура'
				        }, {
				            // Опции.
				            // Своё изображение иконки метки.
				            iconImageHref: 'images/map-icon.png',
				            // Размеры метки.
				            iconImageSize: [26, 27],
				            // Смещение левого верхнего угла иконки относительно
				            // её "ножки" (точки привязки).
				            iconImageOffset: [0, 0]
				        });

					    // Добавляем все метки на карту.
					    myMap.geoObjects
					        .add(myPlacemark2)
					        .add(myPlacemark3)
					        .add(myPlacemark4)
					        .add(myPlacemark5)

				    }
				</script>
			
			<div class="section-nav font-2">
			

			</div><!-- .section-nav -->

		</section><!-- top-page -->
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"",
	Array(
		"IBLOCK_TYPE"	=>	$arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"	=>	$arParams["IBLOCK_ID"],
		"NEWS_COUNT"	=>	$arParams["NEWS_COUNT"],
		"SORT_BY1"	=>	$arParams["SORT_BY1"],
		"SORT_ORDER1"	=>	$arParams["SORT_ORDER1"],
		"SORT_BY2"	=>	$arParams["SORT_BY2"],
		"SORT_ORDER2"	=>	$arParams["SORT_ORDER2"],
		"FIELD_CODE"	=>	$arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE"	=>	$arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"DISPLAY_PANEL"	=>	$arParams["DISPLAY_PANEL"],
		"SET_TITLE"	=>	$arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN"	=>	$arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
		"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
		"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER"	=>	$arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER"	=>	$arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE"	=>	$arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE"	=>	$arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS"	=>	$arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING"	=>	$arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME"	=>	$arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"DISPLAY_DATE"	=>	$arParams["DISPLAY_DATE"],
		"DISPLAY_NAME"	=>	"Y",
		"DISPLAY_PICTURE"	=>	$arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT"	=>	$arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN"	=>	$arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT"	=>	$arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS"	=>	$arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS"	=>	$arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME"	=>	$arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL"	=>	$arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES"	=>	$arParams["CHECK_DATES"],
	),
	$component
);?>
