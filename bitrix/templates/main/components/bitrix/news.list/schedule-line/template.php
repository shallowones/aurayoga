<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */
?>

<? if ($arResult['ITEMS']): ?>
    <ul class="custom-list-bullet">
        <? foreach ($arResult['ITEMS'] as $item):
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
            ?>
            <li class="li" id="<? echo $this->GetEditAreaId($item['ID']); ?>">
                <a href="<? echo $item['SCHEDULE']['LINK'] ?>"><? echo $item['SCHEDULE']['NAME'] ?></a>
            </li>
        <? endforeach; ?>
    </ul>
<? endif; ?>