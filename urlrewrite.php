<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/materials/articles/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/materials/articles/index.php",
	),
	array(
		"CONDITION" => "#^/places/([a-z]+)/.*#",
		"RULE" => "page=\$1",
		"ID" => "",
		"PATH" => "/places/index.php",
	),
	array(
		"CONDITION" => "#^/materials/photo/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery",
		"PATH" => "/materials/photo/index.php",
	),
	array(
		"CONDITION" => "#^/teachers/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/teachers/index.php",
	),
	array(
		"CONDITION" => "#^/places/#",
		"RULE" => "",
		"ID" => "ugraweb:news",
		"PATH" => "/places/index.php",
	),
	array(
		"CONDITION" => "#^/forum/#",
		"RULE" => "",
		"ID" => "bitrix:forum",
		"PATH" => "/forum/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
	array(
		"CONDITION" => "#^/law/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/law/index.php",
	),
);

?>