<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Участникам");
?>
    <h2> Йога-лагеря предлагают совершить йога-тур на уникальных условиях! </h2>

    <p>В йога-лагере Аура предоставляется возможность познакомиться с йогой и практиковать в чистом месте.</p>

    <ul>
        <li>Опытные преподаватели.</li>

        <li>Любая продолжительность пребывания в лагере.</li>

        <li>Свободный график заездов.</li>

        <li>Групповые и индивидуальные программы работы над собой.</li>

        <li>Возможно участие с любым уровнем подготовки.</li>

        <li>Пребывание в уникальных чистых уголках природы открывает ранее недоступные вершины в практике.</li>

        <li>Практика, лекции-беседы, общение с единомышленниками в режиме нон-стоп.</li>

        <li>Атмосфера доброжелательности, спокойствия, радости постоянно окружает участников лагеря.</li>

        <li>Возможность заниматься йогой по индивидуальной программе.</li>

        <li>Получить компетентные рекомендации по составлению индивидуальной программы.</li>

        <li>Благодарность преподавателям за занятия в форме свободных пожертвований.</li>
    </ul>

    <p>Приглашаем всех, кто стремится к развитию.</p>

    <p>Для участия в йога-лагере просьба заполнить и <b><a href="#askform" charset="header-l-nav__act">отправить
                заявку</a></b>.</p>

    <p>
    <hr/></p>

    <h2>Примерное расписание практик на каждый день:</h2>

    <table style="border-collapse: collapse;" class="custom-table">
        <tbody>
        <tr>
            <td style="border-image: initial;"> 06 : 00 - 07 : 00</td>
            <td style="border-image: initial;"> Утренняя медитация</td>
        </tr>

        <tr>
            <td style="border-image: initial;"> 07 : 00 - 09 : 00</td>
            <td style="border-image: initial;"> Практика Хатха-йоги</td>
        </tr>

        <tr>
            <td style="border-image: initial;"> 10 : 00 - 11 : 00</td>
            <td style="border-image: initial;"> Завтрак</td>
        </tr>

        <tr>
            <td style="border-image: initial;"> 11 : 00 - 12 : 00</td>
            <td style="border-image: initial;"> Чтение литературы (йога, питание, самосовершенствование)</td>
        </tr>

        <tr>
            <td style="border-image: initial;"> 13 : 00 - 15 : 00</td>
            <td style="border-image: initial;"> Беседы-лекции</td>
        </tr>

        <tr>
            <td style="border-image: initial;"> 15 : 30 - 17 : 00</td>
            <td style="border-image: initial;"> Практика Хатха-йоги</td>
        </tr>

        <tr>
            <td style="border-image: initial;"> 17 : 00 - 18 : 00</td>
            <td style="border-image: initial;"> Ужин</td>
        </tr>

        <tr>
            <td style="border-image: initial;"> 18 : 00 - 20 : 00</td>
            <td style="border-image: initial;"> Просмотр развивающих фильмов</td>
        </tr>

        <tr>
            <td style="border-image: initial;"> 20 : 00 - 21 : 00</td>
            <td style="border-image: initial;">Практика мантры &quot;ОМ&quot;</td>
        </tr>
        </tbody>
    </table>
    <hr>
    <h2> Посмотреть график участия преподавателей: </h2>
<? $APPLICATION->IncludeComponent("bitrix:news.list", "schedule-line", array(
    "IBLOCK_TYPE" => "camps",
    "IBLOCK_ID" => "11",
    "NEWS_COUNT" => "50",
    "SORT_BY1" => "SORT",
    "SORT_ORDER1" => "ASC",
    "SORT_BY2" => "ID",
    "SORT_ORDER2" => "DESC",
    "FILTER_NAME" => "",
    "FIELD_CODE" => array(
        0 => "",
        1 => "",
    ),
    "PROPERTY_CODE" => array(
        0 => "scheduleName",
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
    "INCLUDE_SUBSECTIONS" => "N",
    "PAGER_TEMPLATE" => ".default",
    "DISPLAY_TOP_PAGER" => "N",
    "DISPLAY_BOTTOM_PAGER" => "N",
    "PAGER_TITLE" => "Новости",
    "PAGER_SHOW_ALWAYS" => "N",
    "PAGER_DESC_NUMBERING" => "N",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    "PAGER_SHOW_ALL" => "Y",
    "AJAX_OPTION_ADDITIONAL" => ""
),
    false
); ?>
    <hr>
    <h2>Условия участия:</h2>

<? $APPLICATION->IncludeComponent("bitrix:news.list", "terms", array(
    "IBLOCK_TYPE" => "camps",
    "IBLOCK_ID" => "11",
    "NEWS_COUNT" => "50",
    "SORT_BY1" => "SORT",
    "SORT_ORDER1" => "ASC",
    "SORT_BY2" => "ID",
    "SORT_ORDER2" => "DESC",
    "FILTER_NAME" => "",
    "FIELD_CODE" => array(
        0 => "",
        1 => "",
    ),
    "PROPERTY_CODE" => array(
        0 => "pay",
        1 => "eat",
        2 => "house",
        3 => "tent",
        4 => "",
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
    "INCLUDE_SUBSECTIONS" => "N",
    "PAGER_TEMPLATE" => ".default",
    "DISPLAY_TOP_PAGER" => "N",
    "DISPLAY_BOTTOM_PAGER" => "N",
    "PAGER_TITLE" => "Новости",
    "PAGER_SHOW_ALWAYS" => "N",
    "PAGER_DESC_NUMBERING" => "N",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    "PAGER_SHOW_ALL" => "Y",
    "AJAX_OPTION_ADDITIONAL" => ""
),
    false
); ?>

<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    ".default",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "AREA_FILE_RECURSIVE" => "",
        "EDIT_TEMPLATE" => "",
        "COMPONENT_TEMPLATE" => ".default",
        "PATH" => SITE_TEMPLATE_PATH . "/inc/exh_terms.html"
    ),
    false
); ?>

    <hr>
    <h2>Рекомендуемые вещи, краткий перечень:</h2>

    <ul>
        <li>палатка (желательно, на одного человека 2х-3х местная)</li>

        <li>спальник</li>

        <li>пенка или коврик для йоги</li>

        <li>куртка, желательно с капюшоном на время утренних практик</li>

        <li>кроссовки (для пеших прогулок по достопримечательностям)</li>

        <li>головной убор (шляпа с широкими полями, кепка и т.п.)</li>

        <li>туалетные принадлежности (туалетная бумага, средства для чистки зубов, мыло и пр.)</li>

        <li>часы-будильник на батарейках, фонарик, верёвка для сушки белья, средство от комаров.</li>

        <li>чашка, ложка, перочинный нож, кружка &mdash; небьющиеся.</li>

        <li>сланцы, резиновые сапоги или калоши, дождевик, небольшой тент над палаткой (на случай дождя)</li>

        <li>небольшой сухой паёк (орехи, мюсли и т.п. на случай непредвиденных обстоятельств)</li>
    </ul>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>