<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фото");
?>
<?$APPLICATION->IncludeFile("/materials/photo/inc_text.php",Array(),Array("MODE"=>"html"));?>
<br />
<?$APPLICATION->IncludeComponent("bitrix:photogallery", ".default", array(
	"USE_LIGHT_VIEW" => "Y",
	"IBLOCK_TYPE" => "Media",
	"IBLOCK_ID" => "13",
	"PATH_TO_USER" => "",
	"DRAG_SORT" => "Y",
	"USE_COMMENTS" => "N",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/materials/photo/",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"SET_TITLE" => "N",
	"ALBUM_PHOTO_SIZE" => "120",
	"THUMBNAIL_SIZE" => "100",
	"ORIGINAL_SIZE" => "1280",
	"PHOTO_LIST_MODE" => "Y",
	"SHOWN_ITEMS_COUNT" => "6",
	"USE_RATING" => "N",
	"SHOW_TAGS" => "N",
	"UPLOADER_TYPE" => "flash",
	"UPLOAD_MAX_FILE_SIZE" => "1000",
	"USE_WATERMARK" => "Y",
	"WATERMARK_RULES" => "USER",
	"PATH_TO_FONT" => "default.ttf",
	"WATERMARK_MIN_PICTURE_SIZE" => "800",
	"SHOW_LINK_ON_MAIN_PAGE" => array(
	),
	"SECTION_SORT_BY" => "UF_DATE",
	"SECTION_SORT_ORD" => "DESC",
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "desc",
	"DATE_TIME_FORMAT_DETAIL" => "d.m.Y",
	"DATE_TIME_FORMAT_SECTION" => "d.m.Y",
	"SECTION_PAGE_ELEMENTS" => "15",
	"ELEMENTS_PAGE_ELEMENTS" => "50",
	"PAGE_NAVIGATION_TEMPLATE" => "",
	"JPEG_QUALITY1" => "100",
	"JPEG_QUALITY" => "100",
	"ADDITIONAL_SIGHTS" => array(
	),
	"SHOW_NAVIGATION" => "N",
	"SEF_URL_TEMPLATES" => array(
		"index" => "index.php",
		"section" => "#SECTION_ID#/",
		"section_edit" => "#SECTION_ID#/action/#ACTION#/",
		"section_edit_icon" => "#SECTION_ID#/icon/action/#ACTION#/",
		"upload" => "#SECTION_ID#/action/upload/",
		"detail" => "#SECTION_ID#/#ELEMENT_ID#/",
		"detail_edit" => "#SECTION_ID#/#ELEMENT_ID#/action/#ACTION#/",
		"detail_list" => "list/",
		"search" => "search/",
	)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>