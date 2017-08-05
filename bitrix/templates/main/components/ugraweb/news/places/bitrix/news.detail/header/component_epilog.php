<?
echo preg_replace_callback(
         "/#MENU_([\d]+)#/is".BX_UTF_PCRE_MODIFIER,
         create_function('$matches', 'ob_start();
         $GLOBALS["APPLICATION"]->IncludeComponent("bitrix:menu", "top-sub-menu", array(
			"ROOT_MENU_TYPE" => "left",
			"MENU_CACHE_TYPE" => "N",
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"MENU_CACHE_GET_VARS" => array(
			),
			"MAX_LEVEL" => "2",
			"CHILD_MENU_TYPE" => "left",
			"USE_EXT" => "Y",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N"
			),
			false
		);
         $retrunStr = @ob_get_contents();
         ob_get_clean();
         return $retrunStr;'),
         $arResult["CACHED_TPL"]);
?>