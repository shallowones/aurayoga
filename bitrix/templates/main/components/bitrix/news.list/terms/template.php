<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */
?>

<? if ($arResult['ITEMS']): ?>
    <table style="border-collapse: collapse;" class="custom-table">
        <tbody>
        <tr class="custom-table__header">
            <td style="border-image: initial;">Название лагеря</td>
            <td style="border-image: initial;">Оплата за занятия йогой</td>
            <td style="border-image: initial;">Размещение в палатке</td>
            <td style="border-image: initial;">Размещение в доме</td>
            <td style="border-image: initial;">Питание</td>
        </tr>
        <? foreach ($arResult['ITEMS'] as $item): ?>
            <tr>
                <td style="border-image: initial;"><a href="<? echo $item['ABOUT_LINK'] ?>"><? echo $item['NAME'] ?></a></td>
                <td style="border-image: initial;"><? echo $item['PROPERTIES']['pay']['VALUE'] ?></td>
                <td style="border-image: initial;"><? echo $item['PROPERTIES']['tent']['VALUE'] ?></td>
                <td style="border-image: initial;"><? echo $item['PROPERTIES']['house']['VALUE'] ?></td>
                <td style="border-image: initial;"><? echo $item['PROPERTIES']['eat']['VALUE'] ?></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>

<? endif; ?>