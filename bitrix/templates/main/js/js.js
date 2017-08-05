	$(function() {

		customizeRadioCheckbox (); // кастомизация системных радиокнопок и чекбоксов
		initCustomSelect (); //-- кастомизация дефолтного выпадающего списка
		toTop (); //-- инициализация плагина «наверх»
		fitTopLinkWidth (); //-- подстраивание ширины области клика «наверх» под своодное место слева
		initFadeInOut (); //-- инициализация плагина смены слайдов в шапке
		initLoadArticles (); //-- инициализация загрузки статей
		initLoadNews (); //-- инициализация загрузки новостей
		initMoreTxt (); //-- анимация открытия дополнительного текста для прочтения
		initCarousel (); //-- карусель

		$('.js-accordion').accordion();
	});

    function initCarousel () {

        $('.js-carousel').carouFredSel({
            auto: {
                play: false,
                timeoutDuration: 3000
            },
            scroll: {
                pauseOnHover: true
            },
            infinite: false,
            circular: false,
            align: "left",
            prev: '.carousel .carousel__prev',
            next: '.carousel .carousel__next',
            pagination: ".carousel .carousel__pager",
            width: '100%',
			height: null,
            mousewheel: true,
            swipe: {
                onMouse: true,
                onTouch: true
            }
        });


    }
	
	function initMoreTxt () {

       var par = $( ".js-article-more p" );
       var parNotFirst = par.not( par[0]).not( par[1]).not( par[2]).wrapAll("<div class='article-more__txt'></div>");

        $('.js-article-more-btn').toggle(function(event) {
            event.preventDefault();

            el = $(this);
            el.parents('.js-article-more').find('.article-more__txt').addClass('article-more__txt_stt_open');
            el.html('<span class="dotted__txt">Свернуть</span>');

        }, function(event) {
            event.preventDefault();

            el = $(this);
            el.parents('.js-article-more').find('.article-more__txt').removeClass('article-more__txt_stt_open');
            el.html('<span class="dotted__txt">Читать дальше</span>');
        });


    }

	function toTop () {
		$().UItoBottom({
			easingType: 'easeOutQuart',
			min: 600,
			text: 'Вниз',
			scrollSpeed: 900
		});
		$().UItoTop({
			easingType: 'easeOutQuart',
			min: 195,
			text: 'Наверх',
			scrollSpeed: 900
		});
	}

	function fitTopLinkWidth (){
		var toTopBlock = $('#toTop');
		//var toTopBlockHover = $('#toTopHover');
		var toTopBlockLink = $('#toTop__link');
		var toTopBlockWidth = $('#toTop__width');
		var totalContentWidth = $('.page__center').outerWidth(); // ширина блока с контентом, включая padding
		var totaltoTopBlockWidth = toTopBlockWidth.outerWidth(true)+25; // ширина самой кнопки наверх, включая padding и margin
		var h = $(window).width()/2-totalContentWidth/2-totaltoTopBlockWidth;

		toTopBlock.css({'padding-bottom': $(window).height()});
		// toTopBlock.css({'padding-right': h+'px'}); если необходимо чтобы кликабельно было все свободное место слева страницы.

		if(h<70){
			// если кнопка не умещается, скрываем её
			toTopBlockLink.hide();
			//toTopBlockHover.hide();
		} else {
			toTopBlockLink.show();
			//toTopBlockHover.show();
		}

		//toTopBlock = $('#toBottom');
		//toTopBlockHover = $('#toBottomHover');
		toTopBlockLink = $('#toBottom__link');

		//toTopBlock.css({'padding-bottom': $(window).height()});
		// toTopBlock.css({'padding-right': h+'px'}); если необходимо чтобы кликабельно было все свободное место слева страницы.

		if(h<50){
			// если кнопка не умещается, скрываем её
			toTopBlockLink.hide();
			//toTopBlockHover.hide();
		} else {
			toTopBlockLink.show();
			//toTopBlockHover.show();
		}
	}

	function customizeRadioCheckbox() {

			if ($('.js-custom-checkbox input').length) {

				$('.js-custom-checkbox').each(function(){
					$(this).removeClass('c-on');
					$(this).append('<span class="custom-checkbox__img"></span>');
				});

				$('.js-custom-checkbox input:checked').each(function(){
					$(this).parent('label').addClass('c-on');
				});
			}

			if ($('.js-custom-radio input').length) {

				$('.js-custom-radio').each(function(){
					$(this).removeClass('r-on');
					$(this).append('<span class="custom-radio__img"></span>');
				});

				$('.js-custom-radio input:checked').each(function(){
					$(this).parent('label').addClass('r-on');
				});
			}

		
		$('.js-custom-checkbox input, .js-custom-radio input').click(function(){
			
			if ($('.js-custom-checkbox input').length) {

				$('.js-custom-checkbox').each(function(){
					$(this).removeClass('c-on');
				});

				$('.js-custom-checkbox input:checked').each(function(){
					$(this).parent('label').addClass('c-on');
				});
			}

			if ($('.js-custom-radio input').length) {

				$('.js-custom-radio').each(function(){
					$(this).removeClass('r-on');
				});

				$('.js-custom-radio input:checked').each(function(){
					$(this).parent('label').addClass('r-on');
				});
			}
			
		});

	} // customizeRadioCheckbox ()


	function initCustomSelect () {

		$('.js-custom-select').customSelect();
		

	} // initCustomSelect ()


	function initFadeInOut () {

		$.featureList(
			$(".main-img-changer__tabs li"),
			$(".main-img-changer__output li"), {
				start_item	:	0,
				pause_on_hover: true,
				transition_interval: 5000,
				transition_duration: 800
			}
		);

	} // initFadeInOut ()

	function initLoadArticles() {
		$('.articles').click(function() {
			var last_news_id = $('.articles').attr('last_news_id');
			if(last_news_id > 0) {
				$(".articles").hide();
				$("#load_process_materials").show();
				runLoadArticles(last_news_id);
			}

		});	
	}
	
	// Непосредственно загрузка материалов
	function runLoadArticles(last_news_id) {
		$.ajax({  
			url: "/bitrix/templates/main/components/bitrix/news/articles/bitrix/news.list/.default/load_news_ajax.php?last_news_id="+last_news_id,
			cache: false,  
			success: function(html){				
				$('#inner_materials').append(html);
				var inner_id = $('.find_articles:last').attr('inner_id');
				$('.articles').attr("last_news_id",inner_id);
				$("#load_process_materials").hide();
				$(".articles").show();
			},
		});
	}
	
	function initLoadNews() {
		$('.newsweek').click(function() {
			var last_new_id = $('.newsweek').attr('last_new_id');
			if(last_new_id > 0) {
				$(".newsweek").hide();
				$("#load_process_materials").show();
				runLoadNews(last_new_id);
			}

		});	
	}
	
	// Непосредственно загрузка материалов
	function runLoadNews(last_new_id) {
		$.ajax({  
			url: "/bitrix/templates/main/components/bitrix/news/news/bitrix/news.list/.default/load_news_ajax.php?last_new_id="+last_new_id,
			cache: false,  
			success: function(html){				
				$('#inner_news').append(html);
				var inner_id = $('.find_news:last').attr('inner_id');
				$('.newsweek').attr("last_new_id",inner_id);
				$("#load_process_materials").hide();
				$(".newsweek").show();
			},
		});
	}

/*!
 * jQuery Accordion widget
 * http://nefariousdesigns.co.uk/projects/widgets/accordion/
 * 
 * Source code: http://github.com/nefarioustim/jquery-accordion/
 *
 * Copyright © 2010 Tim Huegdon
 * http://timhuegdon.com
 */
 
(function($) {
    var debugMode = false;
    
    function debug(msg) {
        if (!debugMode) { return; }
        if (window.console && window.console.log){
            window.console.log(msg);
        } else {
            alert(msg);
        }
    }
    
    $.fn.accordion = function(config) {
        var defaults = {
            "handle": ".accordion__h",
            "panel": ".panel",
            "speed": 200,
            "easing": "swing",
            "canOpenMultiple": false,
            "canToggle": false,
            "activeClassPanel": "open",
            "activeClassLi": "active",
            "lockedClass": "locked",
            "loadingClass": "loading"
        };
        
        if (config) {
            $.extend(defaults, config);
        }
        
        this.each(function() {
            var accordion   = $(this),
                reset       = {
                    height: 0,
                    marginTop: 0,
                    marginBottom: 0,
                    paddingTop: 0,
                    paddingBottom: 0
                },
                panels      = accordion.find(">li>" + defaults.panel)
                                .each(function() {
                                    var el = $(this);
                                    el
                                        .removeClass(defaults.loadingClass)
                                        .css("visibility", "hidden")
                                        .data("dimensions", {
                                            marginTop:      el.css("marginTop"),
                                            marginBottom:   el.css("marginBottom"),
                                            paddingTop:     el.css("paddingTop"),
                                            paddingBottom:  el.css("paddingBottom"),
                                            height:         this.offsetHeight - parseInt(el.css("paddingTop")) - parseInt(el.css("paddingBottom"))
                                        })
                                        .bind("panel-open.accordion", function(e, clickedLi) {
                                            var panel = $(this);
                                            clickedLi.addClass(defaults.activeClassLi);
                                            panel
                                                .css($.extend({overflow: "hidden"}, reset))
                                                .addClass(defaults.activeClassPanel)
                                                .show()
                                                .animate($.browser.msie && parseInt($.browser.version) < 8 ? panel.data("dimensions") : $.extend({opacity: 1}, panel.data("dimensions")), {
                                                    duration:   defaults.speed,
                                                    easing:     defaults.easing,
                                                    queue:      false,
                                                    complete:   function(e) {
                                                        if ($.browser.msie) {
                                                            this.style.removeAttribute('filter');
                                                        }
                                                        $(this).removeAttr("style");
                                                    }
                                                });
                                        })
                                        .bind("panel-close.accordion", function(e) {
                                            var panel = $(this);
                                            panel.closest("li").removeClass(defaults.activeClassLi);
                                            panel
                                                .removeClass(defaults.activeClassPanel)
                                                .css({
                                                    overflow: "hidden"
                                                })
                                                .animate($.browser.msie && parseInt($.browser.version) < 8 ? reset : $.extend({opacity: 0}, reset), {
                                                    duration:   defaults.speed,
                                                    easing:     defaults.easing,
                                                    queue:      false,
                                                    complete:   function(e) {
                                                        if ($.browser.msie) {
                                                            this.style.removeAttribute('filter');
                                                        }
                                                        panel.hide();
                                                    }
                                                });
                                        })
                                        .hide()
                                        .css("visibility", "visible");
                                    
                                    return el;
                                }),
                handles     = accordion.find(
                                " > li > "
                                + defaults.handle
                            )
                                .wrapInner('<a class="accordion-opener dotted" href="#open-panel"><span class="dotted__txt"></span></a>');
            
            accordion
                .find(
                    " > li."
                    + defaults.activeClassLi
                    + " > "
                    + defaults.panel
                    + ", > li."
                    + defaults.lockedClass
                    + " > "
                    + defaults.panel
                )
                .show()
                .addClass(defaults.activeClassPanel);
            
            var active = accordion.find(
                " > li."
                + defaults.activeClassLi
                + ", > li."
                + defaults.lockedClass
            );
            
            if (!defaults.canToggle && active.length < 1) {
                accordion
                    .find(" > li")
                    .first()
                    .addClass(defaults.activeClassLi)
                    .find(" > " + defaults.panel)
                    .addClass(defaults.activeClassPanel)
                    .show();
            }
            
            accordion.delegate(".accordion-opener", "click", function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                
                var clicked     = $(this),
                    clickedLi   = clicked.closest("li"),
                    panel       = clickedLi.find(">" + defaults.panel).first(),
                    open        = accordion.find(
                        " > li:not(."
                        + defaults.lockedClass
                        + ") > "
                        + defaults.panel
                        + "."
                        + defaults.activeClassPanel
                    );
                
                if (!clickedLi.hasClass(defaults.lockedClass)) {
                    if (panel.is(":visible")) {
                        if (defaults.canToggle) {
                            panel.trigger("panel-close");
                        }
                    } else {
                        panel.trigger("panel-open", [clickedLi]);
                        if (!defaults.canOpenMultiple) {
                            open.trigger("panel-close");
                        }
                    }
                }
            });
        });
        
        return this;
    };



})(jQuery);
