<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */

foreach ($arResult['ITEMS'] as $key => $item) {
    // ставим линк на schedule
    $arResult['ITEMS'][$key]['SCHEDULE'] = [
        'NAME' => $item['PROPERTIES']['scheduleName']['VALUE'],
        'LINK' => "/places/{$item['CODE']}/schedule/"
    ];
}