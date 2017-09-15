<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */

foreach ($arResult['ITEMS'] as $key => $item) {
    // ставим линк на about
    $arResult['ITEMS'][$key]['ABOUT_LINK'] = "/places/{$item['CODE']}/about/";
}