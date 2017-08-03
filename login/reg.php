<?
define ("X_NOT_SHOW","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"",
	Array(
		"USER_PROPERTY_NAME" => "",
		"SHOW_FIELDS" => array(),
		"REQUIRED_FIELDS" => array(),
		"AUTH" => "Y",
		"USE_BACKURL" => "Y",
		"SUCCESS_PAGE" => "",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => array()
	),
false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>