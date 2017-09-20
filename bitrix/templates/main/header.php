<!DOCTYPE HTML>
<!--[if IE 7 ]> <html lang="ru-RU" class="ie7 no-js"> <![endif]-->
<!--[if IE 8 ]> <html lang="ru-RU" class="ie8 no-js"> <![endif]-->
<!--[if IE 9 ]> <html lang="ru-RU" class="ie9 no-js"> <![endif]-->
<!---[if (gt IE 9)|!(IE)]><!-->
<html lang="ru-RU" class="no-js">
<!--<![endif]-->
<head> 

<?
include_once($_SERVER["DOCUMENT_ROOT"]."/render/site_favicon.php");
?>

	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/normalize.css">

	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle();?> - Йога-лагерь "Аура"</title>

	<!--[if lt IE 9]> <script src="<?=SITE_TEMPLATE_PATH?>/js/html5.js"></script><![endif]-->
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.7.2.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.customselect.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/easing.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.ui.totop.js?v4"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.featureList.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/slider/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/slider/jquery.mousewheel.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/slider/jquery.touchSwipe.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/slider/jquery.transit.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/slider/jquery.ba-throttle-debounce.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/js.js?v6"></script>
    <link href="/jquery-ui/jquery-ui.min.css" type="text/css" rel="stylesheet"/>

    <script src="/jquery-ui/jquery-ui.min.js"></script>

    <script src="/jquery-ui/jquery-ui.datepicker-ru.js"></script>
    <script type="application/javascript" src="<?=CUtil::GetAdditionalFileURL('/bitrix/components/ugraweb/ask.form/order_form.js');?>"></script>
<?
include_once($_SERVER["DOCUMENT_ROOT"]."/render/site.php");
?>

	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?112"></script>
	<script type="text/javascript">
	  VK.init({apiId: 4345970, onlyWidgets: true});
	</script>
</head>
<body>
<?CModule::IncludeModule("iblock");?>
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<div class="page">
	
		<header class="header">
			<div class="header__c">

				<div class="header-l-nav">
					<ul class="header-l-nav__lst font-1">
						<li class="header-l-nav__i"><a href="#contacts" charset="header-l-nav__act">Контакты</a></li>
						<li class="header-l-nav__i"><a href="/forum/" charset="header-l-nav__act">Форум</a></li>
					</ul>
				</div>
				
				<a href="/" class="logo-link">
					<div class="logo-link__txt">Измени себя — <br>изменится мир вокруг</div>
					<img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt="" class="logo-link__img">
				</a>
				
				<div class="small-icons">
					<ul class="small-icons__lst">
						<li class="small-icons__i"><a href="/" title="На главную" class="small-icons__act"><img src="<?=SITE_TEMPLATE_PATH?>/images/home.gif" alt=""></a></li>
						<li class="small-icons__i"><a href="mailto:aura@oum.ru" title="Напишите нам" class="small-icons__act"><img src="<?=SITE_TEMPLATE_PATH?>/images/mail.gif" alt=""></a></li>
					</ul>
				</div>
					
				<form action="/search/" class="search-form">
					<input type="text" name="q" id="search" value="" placeholder="Поиск" class="search-form-input"><!-- 
				 --><input type="submit" name="s" value="" class="search-form-submit">
				</form>
					
				<div class="auth">
					<ul class="auth__lst font-1">
						<?global $USER;if ($USER->IsAuthorized()):?>
						<li class="auth__i"><a href="/profile/" class="auth__act">Профиль</a> /</li>
						<li class="auth__i"><a href="/?logout=yes" class="auth__act">Выход</a></li>
						<?else:?>
						<li class="auth__i"><a href="/login/" class="auth__act">Войти</a></li>
						<!--<li class="auth__i"><a href="/login/reg.php?register=yes" class="auth__act">Регистрация</a></li>-->
						<?endif;?>
					</ul>
				</div>

			</div><!-- header__c -->
		</header><!-- header -->
		<div class="main-nav font-2">
		<?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu", Array(
			"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
			"MENU_CACHE_TYPE" => "N",	// Тип кеширования
			"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
			"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
			"MAX_LEVEL" => "1",	// Уровень вложенности меню
			"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
			"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
			"DELAY" => "N",	// Откладывать выполнение шаблона меню
			"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
			),
			false
		);?>
		</div>
		<div class="clearfix-block"></div>
		<?if (defined("X_HOME_PAGE")):?>
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "main.camps", array(
			"IBLOCK_TYPE" => "camps",
			"IBLOCK_ID" => "11",
			"NEWS_COUNT" => "20",
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_BY2" => "ACTIVE_FROM",
			"SORT_ORDER2" => "ASC",
			"FILTER_NAME" => "",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "schedule",
				1 => "way_short",
				2 => "way_map",
				3 => "way",
				4 => "map_lenta",
				5 => "contacts",
				6 => "coords_about",
				7 => "place_lenta",
				8 => "mark_about",
				9 => "reviews",
				10 => "period",
				11 => "place_contacts",
				12 => "routine",
				13 => "terms",
				14 => "map",
				15 => "",
			),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"SET_TITLE" => "Y",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
			"ADD_SECTIONS_CHAIN" => "Y",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"INCLUDE_SUBSECTIONS" => "Y",
			"PAGER_TEMPLATE" => ".default",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"PAGER_TITLE" => "Новости",
			"PAGER_SHOW_ALWAYS" => "Y",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "Y",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"AJAX_OPTION_ADDITIONAL" => ""
			),
			false
		);?>
         
		
		<section class="content">
			
			<div class="page__c">
				
				<?$APPLICATION->IncludeComponent("bitrix:news.list", "hdr_block", array(
	"IBLOCK_TYPE" => "lenta",
	"IBLOCK_ID" => "7",
	"NEWS_COUNT" => "1",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"PAGER_TEMPLATE" => ".default",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?> 

			
			</div><!-- page__c -->

		</section><!-- content -->
		<?
		$pic_1 = CIBlockElement::GetByID(183);
		$ar_pic_1 = $pic_1->GetNext();
		$src_pic_1 = CFile::GetPath($ar_pic_1["DETAIL_PICTURE"]);?>
		<section class="bg" style="background-image: url(<?=$src_pic_1?>);">
			
			<div class="page__c bg__middle">
				
				<div class="bg__middle-in">
					<div class="bg__h-wrap">
						<div class="bg__h font-2">Зачем ехать в йога лагерь?</div>
					</div>
				</div><!-- bg__middle-in -->
				
			</div><!-- page__c -->

		</section><!-- bg -->
		
		<section class="content">
			
			<div class="page__c">
				
				<div class="two-cols">
					
					<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH. "/inc/hdr_main_reason_left.php",Array(),Array("MODE"=>"html"));?>
					<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH. "/inc/hdr_main_reason_right.php",Array(),Array("MODE"=>"html"));?>
					
					<div class="clearfix-block"></div>
					
				</div><!-- two-cols -->
				

				
			</div><!-- page__c -->

		</section><!-- content -->
		
		<?
		$pic_2 = CIBlockElement::GetByID(184);
		$ar_pic_2 = $pic_2->GetNext();
		$src_pic_2 = CFile::GetPath($ar_pic_2["DETAIL_PICTURE"]);?>
		<section class="bg" style="background-image: url(<?=$src_pic_2?>);">
			
			<div class="page__c bg__middle">
				
				<div class="bg__middle-in">
					<div class="bg__h-wrap">
						<div class="bg__h font-2"><a href="/materials/photo/">Фотографии</a> с мест <br> проведения йога лагеря</div>
					</div>
				</div><!-- bg__middle-in -->
				
			</div><!-- page__c -->

		</section><!-- bg -->
		<?elseif (!defined("X_NOT_SHOW")):?>
		<?
			$dir = $APPLICATION->GetCurDir();
			$i = 0;
			CModule::IncludeModule("iblock");
			$arSelect = Array("ID", "CODE", "DETAIL_PICTURE");
			$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y");
			$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
			while($ob = $res->GetNextElement())
			{
			 $arFields[$i] = $ob->GetFields();
			 $arFields[$i]["DETAIL_PICTURE"] = CFile::GetFileArray($arFields[$i]["DETAIL_PICTURE"]);
			 $i++;
			}

			foreach ($arFields as $i => $arCode):
			if ((substr_count($dir, $arCode['CODE']))>0 && (substr_count($dir, $arCode['CODE'])<2)):
			$arFon = $arCode;
			endif;
			endforeach;


		?>
		<section class="top-page" style="background-image: url(<?if($arFon):?><?=$arFon["DETAIL_PICTURE"]["SRC"]?><?else:?><?=SITE_TEMPLATE_PATH?>/images/top-page-1.jpg<?endif;?>);">
			
			<div class="page__c">
				
				<div class="top-page__wrap">
					
					<div class="top-page__in">
						
						<div class="top-page__h-wrap">
							<div class="top-page__h font-2"><?$APPLICATION->ShowTitle();?></div>
						</div>
						
					</div><!-- top-page__in -->
					
				</div><!-- top-page__wrap -->
 

			</div><!-- page__c -->
			
			<div class="section-nav font-2">
			<?$APPLICATION->IncludeComponent("bitrix:menu", "top-sub-menu", Array(
				"ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
				"MAX_LEVEL" => "1",	// Уровень вложенности меню
				"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
				"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
				"DELAY" => "N",	// Откладывать выполнение шаблона меню
				"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
				"MENU_CACHE_TYPE" => "N",	// Тип кеширования
				"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
				"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
				"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
				),
				false
			);?>

			</div><!-- .section-nav -->

		</section>
		<section class="content">
			
			<div class="page__c">
		<?elseif (!defined("X_PLACE")):?>
		<section class="content">
			
			<div class="page__c">
		<?endif;?>
