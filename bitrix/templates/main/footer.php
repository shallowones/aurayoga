<? if ((!defined("X_HOME_PAGE")) || (!defined("X_PLACE"))): ?>
    <?
    $dir_temp = $APPLICATION->GetCurDir();
    $temp_exhibitors = substr_count($dir_temp, "exhibitors");
    $temp_philanthropists = substr_count($dir_temp, "philanthropists");
    if ($temp_exhibitors > 0 || $temp_philanthropists > 0):
        ?>
        <br/>
        <div class="content-share">
            <div class="content-share__h">Поделиться с друзьями</div>
            <div class="share42init" data-url="http://www.aurayoga.ru<?= $APPLICATION->GetCurPage(); ?>"
                 data-title="<?= $APPLICATION->GetTitle(); ?>"></div>
            <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/share42.js"></script>
            <script type="text/javascript">share42('<?=SITE_TEMPLATE_PATH?>/js/')</script>
            <br/>
            <div id="vk_comments_news"></div>
            <script type="text/javascript">
              VK.Widgets.Comments('vk_comments_news', {limit: 5, attach: '*', autoPublish: 0})
            </script>
        </div>
    <? endif; ?>
    </div>
    </section>
<? endif; ?>
<section class="content">

    <div class="page__c">
        <? if ((!defined("X_NEWS")) && (!defined("X_FORUM"))): ?>
            <? $APPLICATION->IncludeComponent("bitrix:news.list", "news_mainpage", array(
                "IBLOCK_TYPE" => "lenta",
                "IBLOCK_ID" => "2",
                "NEWS_COUNT" => "3",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "TIMESTAMP_X",
                "SORT_ORDER2" => "DESC",
                "FILTER_NAME" => "",
                "FIELD_CODE" => array(
                    0 => "DATE_CREATE",
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
            ); ?>
            <?
            $dir_temp = $APPLICATION->GetCurDir();
            $temp_about = substr_count($dir_temp, "about");
            if ($temp_about > 0):
                ?>
                <div class="separator"></div>
                <div class="content-share">
                    <div class="content-share__h">Поделиться с друзьями</div>
                    <div class="share42init" data-url="http://www.aurayoga.ru<?= $APPLICATION->GetCurPage(); ?>"
                         data-title="<?= $APPLICATION->GetTitle(); ?>"></div>
                    <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/share42.js"></script>
                    <script type="text/javascript">share42('<?=SITE_TEMPLATE_PATH?>/js/')</script>
                    <br/>
                    <div id="vk_comments_news"></div>
                    <script type="text/javascript">
                      VK.Widgets.Comments('vk_comments_news', {limit: 5, attach: '*', autoPublish: 0})
                    </script>
                </div>
            <? endif; ?>
        <? endif; ?>
        <div class="separator"></div>

        <h2 class="h-color-2 font-2">Наши друзья</h2>
        <div class="carousel">
            <ul class="carousel__lst js-carousel">
                <? $APPLICATION->IncludeComponent("bitrix:news.list", "carousel", array(
                    "IBLOCK_TYPE" => "lenta",
                    "IBLOCK_ID" => "14",
                    "NEWS_COUNT" => "100",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ACTIVE_FROM",
                    "SORT_ORDER2" => "DESC",
                    "FILTER_NAME" => "",
                    "FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "url",
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
                ); ?>
            </ul>
            <div class="clearfix-blok"></div>
            <div class="carousel__prev"></div>
            <div class="carousel__next"></div>
            <div class="carousel__pager"></div>
        </div>
    </div><!-- page__c -->

</section><!-- content -->


</div><!-- page -->

<footer class="footer">

    <section class="contacts">

        <div class="footer__c">

            <div class="contacts__col contacts__col_tp_1">
                <h2 id="contact-list" class="contacts__h">Контакты</h2>
                <? //$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH. "/inc/ftr_contacts.php",Array(),Array("MODE"=>"html"));?>
                <? $APPLICATION->IncludeComponent("bitrix:news.list", "contacts", array(
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
                        0 => "contacts",
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
            </div>
            <div class="contacts__col contacts__col_tp_2">
                <a id="contacts"></a>
                <h2 id="askform" class="contacts__h form-space-label">Отправить заявку</h2>
                <?
                $APPLICATION->IncludeComponent("ugraweb:ask.form", "aura_reg", array(
	"EMAIL_TO" => "aura@oum.ru",
	"OK_TEXT" => "Ваша заявка принята, благодарим!",
	"USE_CAPTCHA" => "Y",
	"IBLOCK_ID" => "5"
	),
	false
);
                ?>
                <div class="social">
                    <h2 class="contacts__h">Мы в социальных сетях</h2>
                    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/inc/ftr_social.php", Array(), Array("MODE" => "php")); ?>
                </div>
            </div>

            <div class="clearfix-block"></div>

        </div>

    </section>

    <section class="footer-nav">

        <div class="footer__c footer-bottom">

            <? $APPLICATION->IncludeComponent("bitrix:menu", "down-menu", array(
                "ROOT_MENU_TYPE" => "down",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => array(),
                "MAX_LEVEL" => "2",
                "CHILD_MENU_TYPE" => "left",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N"
            ),
                false
            ); ?>

            <div class="copyright">
                © 2012 - <?= date("Y"); ?> <a href="/">aurayoga.ru</a><br/><br/>
                <!--LiveInternet counter-->
                <script type="text/javascript"><!--
                  document.write('<a href=\'http://www.liveinternet.ru/click\' ' +
                    'target=_blank><img src=\'//counter.yadro.ru/hit?t14.3;r' +
                    escape(document.referrer) + ((typeof(screen) == 'undefined') ? '' : ';s' + screen.width + '*' + screen.height + '*' + (screen.colorDepth ? screen.colorDepth : screen.pixelDepth)) + ';u' + escape(document.URL) +
                    ';' + Math.random() +
                    '\' alt=\'\' title=\'LiveInternet: показано число просмотров за 24' +
                    ' часа, посетителей за 24 часа и за сегодня\' ' +
                    'border=\'0\' width=\'88\' height=\'31\' style=\'display:none;\'><\/a>')
                  //--></script><!--/LiveInternet-->
                <!-- Yandex.Metrika informer -->
                <? /*
					<a href="https://metrika.yandex.ru/stat/?id=24884984&;amp;from=informer"
					target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/24884984/3_0_FFFFFFFF_FFFFFFFF_0_pageviews"
					style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:24884984,lang:'ru'});return false}catch(e){}"/></a>
*/ ?>
                <!-- /Yandex.Metrika informer -->

                <!-- Yandex.Metrika counter -->
                <script type="text/javascript">
                  (function (d, w, c) {
                    (w[c] = w[c] || []).push(function () {
                      try {
                        w.yaCounter24884984 = new Ya.Metrika({
                          id: 24884984,
                          webvisor: true,
                          clickmap: true,
                          trackLinks: true,
                          accurateTrackBounce: true
                        })
                      } catch (e) { }
                    })

                    var n = d.getElementsByTagName('script')[0],
                      s = d.createElement('script'),
                      f = function () { n.parentNode.insertBefore(s, n) }
                    s.type = 'text/javascript'
                    s.async = true
                    s.src = (d.location.protocol == 'https:' ? 'https:' : 'http:') + '//mc.yandex.ru/metrika/watch.js'

                    if (w.opera == '[object Opera]') {
                      d.addEventListener('DOMContentLoaded', f, false)
                    } else { f() }
                  })(document, window, 'yandex_metrika_callbacks')
                </script>
                <noscript>
                    <div><img src="//mc.yandex.ru/watch/24884984" style="position:absolute; left:-9999px;" alt=""/>
                    </div>
                </noscript>
                <!-- /Yandex.Metrika counter -->
            </div><!-- copyright -->


        </div><!-- footer__c -->

    </section>

</footer><!-- footer -->
<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r
    i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date()
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0]
    a.async = 1
    a.src = g
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga')

  ga('create', 'UA-64280347-2', 'auto')
  ga('send', 'pageview')

</script>
</body>
</html>