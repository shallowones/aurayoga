<!DOCTYPE HTML>
<!--[if IE 7 ]> <html lang="ru-RU" class="ie7 no-js"> <![endif]-->
<!--[if IE 8 ]> <html lang="ru-RU" class="ie8 no-js"> <![endif]-->
<!--[if IE 9 ]> <html lang="ru-RU" class="ie9 no-js"> <![endif]-->
<!---[if (gt IE 9)|!(IE)]><!-->
<html lang="ru-RU" class="no-js">
<!--<![endif]-->
<head> 
       <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/normalize.css">
	<?$APPLICATION->ShowHead();?>
	<title>Site name</title>
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" href="styles.css">
	<!--[if lt IE 9]> <script src="js/html5.js"></script><![endif]-->
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/jquery.customselect.js"></script>
	<script src="js/easing.js"></script>
	<script src="js/jquery.ui.totop.js"></script>
	<script src="js/jquery.featureList.js"></script>

    <script src="js/slider/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="js/slider/jquery.mousewheel.min.js"></script>
    <script src="js/slider/jquery.touchSwipe.min.js"></script>
    <script src="js/slider/jquery.transit.min.js"></script>
    <script src="js/slider/jquery.ba-throttle-debounce.min.js"></script>
	
	<script src="js/js.js"></script>
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
</head>

<body>
	
	<div class="page">
	
		<header class="header">
			<div class="header__c">

				<div class="header-l-nav">
					<ul class="header-l-nav__lst font-1">
						<li class="header-l-nav__i"><a href="#" charset="header-l-nav__act">Контакты</a></li>
						<li class="header-l-nav__i"><a href="#" charset="header-l-nav__act">Форум</a></li>
					</ul>
				</div>
				
				<a href="#" class="logo-link">
					<div class="logo-link__txt">Измени себя — <br>изменится мир вокруг</div>
					<img src="images/logo.png" alt="" class="logo-link__img">
				</a>
				
				<div class="small-icons">
					<ul class="small-icons__lst">
						<li class="small-icons__i"><a href="#" title="На главную" class="small-icons__act"><img src="images/home.gif" alt=""></a></li>
						<li class="small-icons__i"><a href="mailto:oum@oum.ru" title="Напишите нам" class="small-icons__act"><img src="images/mail.gif" alt=""></a></li>
					</ul>
				</div>
					
				<form action="#" method="post" class="search-form">
					<input type="text" name="search" id="search" value="" placeholder="Поиск" class="search-form-input"><!-- 
				 --><input type="submit" value="" class="search-form-submit">
				</form>
					
				<div class="auth">
					<ul class="auth__lst font-1">
						<li class="auth__i"><a href="#" class="auth__act">Войти</a></li>
						<!--<li class="auth__i"><a href="#" class="auth__act">Регистрация</a></li>-->
					</ul>
				</div>

			</div><!-- header__c -->
		</header><!-- header -->
		
		<div class="main-nav font-2">
		
			<ul class="main-nav__lst">
				<li class="main-nav__i"><a href="#" class="main-nav__act">Места проведения</a></li>
				<li class="main-nav__i"><a href="#" class="main-nav__act">Преподаватели</a></li>
				<li class="main-nav__i"><a href="#" class="main-nav__act">Участникам</a></li>
				<li class="main-nav__i main-nav__i_stt_cur"><a href="#" class="main-nav__act">Благотворителям</a></li>
				<li class="main-nav__i"><a href="#" class="main-nav__act">Материалы</a></li>
			</ul>
                                                                                        
		</div><!-- .main-nav -->
		<div class="clearfix-block"></div>
		
		<section class="slider" style="background-image: url(images/slider-1.jpg);">
			
			<div class="slider__act slider__act_lt_left">
				<div class="slider__act-in">
					<div class="slider__act-in-in">
						
						<a href="#" class="slider__inf font-2">
							<div class="slider__inf-h">Йога-лагерь Аура</div>
							<div class="slider__inf-sub-h slider__inf-sub-h_stl_u">Ярославская область</div>
						</a>
						
					</div><!-- slider__act-in-in -->
				</div><!-- slider__act-in -->
			</div><!-- slider__act -->
			
			<div class="slider__act slider__act_lt_center">
				<div class="slider__act-in">
					<div class="slider__act-in-in">
						
						<div class="slider__inf font-2">
							<div class="slider__inf-h">Йога-лагерь Аура</div>
							<a href="#" class="slider__inf-sub-h">Краснодарский край</a>
							<div class="font-1">
								<div class="slider__inf-small">20 км от Геленджика <br> поселок Возрождение</div>
								<div class="slider__inf-date">с 1 июня по 25 сентября</div>
								
									<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
									<div id="map" style="width: 258px; height: 180px; border: 1px solid #fff;"></div>
									<script type="text/javascript">
									    ymaps.ready(init);
									    var myMap;
									
									    function init(){     
									        myMap = new ymaps.Map ("map", {
									            center: [44.570295, 38.374509],
									            zoom: 8
									        }),

										    myMap.controls
										        // Кнопка изменения масштаба.
										        .add('zoomControl', { left: 5, top: 5 })
										        // Список типов карты
										        .add('typeSelector', { right: 5, top: 5 })

									        myPlacemark2 = new ymaps.Placemark([44.681837, 38.342711], {
									            // Свойства.
									            hintContent: 'Йога-лагерь Аура на Жане'
									        }, {
									            // Опции.
									            // Своё изображение иконки метки.
									            iconImageHref: 'images/map-icon.png',
									            // Размеры метки.
									            iconImageSize: [26, 27],
									            // Смещение левого верхнего угла иконки относительно
									            // её "ножки" (точки привязки).
									            iconImageOffset: [0, 0]
									        });

										    // Добавляем все метки на карту.
										    myMap.geoObjects
										        .add(myPlacemark2)

									    }
									</script>
								
								
								<a href="#" class="slider__inf-more">Подробнее о месте</a>
							</div>
						</div>
						
					</div><!-- slider__act-in-in -->
				</div><!-- slider__act-in -->
			</div><!-- slider__act -->
			
			<div class="slider__act slider__act_lt_right">
				<div class="slider__act-in">
					<div class="slider__act-in-in">
						
						<a href="#" class="slider__inf font-2">
							<div class="slider__inf-h">Йога-лагерь Аура</div>
							<div class="slider__inf-sub-h slider__inf-sub-h_stl_u">Ярославская область</div>
						</a>
						
					</div><!-- slider__act-in-in -->
				</div><!-- slider__act-in -->
			</div><!-- slider__act -->
			
			
			<div class="page__c">
				
				
				
			</div><!-- page__c -->

		</section><!-- bg -->

		
		<section class="content">
			
			<div class="page__c">
				
				<h1 class="section-h">Празднование Купалы</h1>
				
				<p>20 июня приглашаем вас в йога-лагерь Аура на празднование Купалы - дня летнего солнцестояния.
				Купала относится к числу самых древних славянских праздников. Это день летнего солнцеворота. Самые длинные дни, самые короткие ночи: полное торжество света, жизни на земле. Великий день года!</p>
				
				<p class="more"><a href="#">Подробнее</a></p>

			
			</div><!-- page__c -->

		</section><!-- content -->

		<section class="bg" style="background-image: url(images/fix-1.jpg);">
			
			<div class="page__c bg__middle">
				
				<div class="bg__middle-in">
					<div class="bg__h-wrap">
						<div class="bg__h font-2">Зачем ехать в йога лагерь?</div>
					</div>
				</div><!-- bg__middle-in -->
				
			</div><!-- page__c -->

		</section><!-- bg -->
		
		<section class="content">
			
			<div class="page__c">
				
				<div class="two-cols">
					
					<div class="two-cols__col-1">
						
<!-- 						<p>
							<iframe width="640" height="360" src="//www.youtube.com/embed/R1PaPafNVQ8" frameborder="0" allowfullscreen></iframe>
						</p>

						<p>
							<iframe width="640" height="480" src="//www.youtube.com/embed/YdvU3mmV-0A" frameborder="0" allowfullscreen></iframe>
						</p> -->
						
						<p class="to-right"><a href="#">Посмотреть все видео ролики</a></p>
						
					</div><!-- two-cols__col-1 -->
					<div class="two-cols__col-2">
						
						<p>Это чистое место - йога лагерь Аура. В йога лагере перед вами открываются широкие возможности.</p>
						<p><a href="#">Для участников</a>:</p>
						<ul class="custom-list-bullet">
							<li>изучить основы йоги</li>
							<li>совершенствовать свою практику</li>
							<li>заняться духовным развитием и самосовершенствованием</li>
						</ul>
						<p><a href="#">для преподавателей</a>:</p>
						<ul class="custom-list-bullet">
							<li>поделиться своими знаниями</li>
							<li>усовершенствовать преподавательские навыки</li>
							<li>получить опыт личной практики в горах</li>
							<li>углубить свои знания</li>
						</ul>
						
					</div><!-- two-cols__col-2 -->
					
					<div class="clearfix-block"></div>
					
				</div><!-- two-cols -->
				

				
			</div><!-- page__c -->

		</section><!-- content -->
		
		
		<section class="bg" style="background-image: url(images/fix-2.jpg);">
			
			<div class="page__c bg__middle">
				
				<div class="bg__middle-in">
					<div class="bg__h-wrap">
						<div class="bg__h font-2"><a href="#">Фотографии</a> с мест <br> проведения йога лагеря</div>
					</div>
				</div><!-- bg__middle-in -->
				
			</div><!-- page__c -->

		</section><!-- bg -->
		

		<section class="content">
			
			<div class="page__c">
				
				<div class="news">
					
					<h2 class="news__h font-2"><a href="#" class="news__h-act">Новости</a></h2>
					
					<ul class="news__lst">
						<li class="news__i">
							<a href="#" class="news__i-act">
								<img src="images/content/teaser-1.jpg" alt="" class="news__i-img">
								<div class="news__i-h">Йога лагерь в КЦ Аура, Ярославская область, начнет свою работу с 1 мая</div>
							</a>
							<div class="news__i-date">24.03.14</div>
						</li>
						<li class="news__i">
							<a href="#" class="news__i-act">
								<img src="images/content/teaser-2.jpg" alt="" class="news__i-img">
								<div class="news__i-h">Йога лагерь в КЦ Аура, Ярославская область, начнет свою работу с 1 мая</div>
							</a>
							<div class="news__i-date">24.03.14</div>
						</li>
						<li class="news__i">
							<a href="#" class="news__i-act">
								<img src="images/content/teaser-3.jpg" alt="" class="news__i-img">
								<div class="news__i-h">Йога лагерь в КЦ Аура, Ярославская область, начнет свою работу с 1 мая</div>
							</a>
							<div class="news__i-date">24.03.14</div>
						</li>
					</ul>
					
				</div><!-- news -->
				
				<div class="separator"></div>
				
				<h2 class="h-color-2 font-2">Дружественные сайты</h2>
				
				
				<div class="carousel">
					<ul class="carousel__lst js-carousel">
						<li class="carousel__i">
							<a href="#" class="carousel__act" target="_blank">
								<img src="images/content/friend-1.jpg" alt="">
							</a><!-- sub-category -->
						</li>
						<li class="carousel__i">
							<a href="#" class="carousel__act" target="_blank">
								<img src="images/content/friend-2.jpg" alt="">
							</a><!-- sub-category -->
						</li>
						<li class="carousel__i">
							<a href="#" class="carousel__act" target="_blank">
								<img src="images/content/friend-3.jpg" alt="">
							</a><!-- sub-category -->
						</li>
						<li class="carousel__i">
							<a href="#" class="carousel__act" target="_blank">
								<img src="images/content/friend-4.jpg" alt="">
							</a><!-- sub-category -->
						</li>
						<li class="carousel__i">
							<a href="#" class="carousel__act" target="_blank">
								<img src="images/content/friend-4.jpg" alt="">
							</a><!-- sub-category -->
						</li>
						<li class="carousel__i">
							<a href="#" class="carousel__act" target="_blank">
								<img src="images/content/friend-3.jpg" alt="">
							</a><!-- sub-category -->
						</li>
						<li class="carousel__i">
							<a href="#" class="carousel__act" target="_blank">
								<img src="images/content/friend-2.jpg" alt="">
							</a><!-- sub-category -->
						</li>
						<li class="carousel__i">
							<a href="#" class="carousel__act" target="_blank">
								<img src="images/content/friend-1.jpg" alt="">
							</a><!-- sub-category -->
						</li>
						<li class="carousel__i">
							<a href="#" class="carousel__act" target="_blank">
								<img src="images/content/friend-4.jpg" alt="">
							</a><!-- sub-category -->
						</li>
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
					<h2 class="contacts__h">Мы в социальных сетях</h2>
					
					<div class="social">
						
						<ul class="social__lst">
							<li class="social__i"><a href="#" class="social__act"><img src="images/vk.png" alt="" class="social__img"></a></li>
							<li class="social__i"><a href="#" class="social__act"><img src="images/fb.png" alt="" class="social__img"></a></li>
							<li class="social__i"><a href="#" class="social__act"><img src="images/ok.png" alt="" class="social__img"></a></li>
						</ul>
						
					</div><!-- social -->
					
					<h2 class="contacts__h">Контакты</h2>
					
					<div class="contacts__i">
						<a href="mailto:info@aurayoga.ru">info@aurayoga.ru</a>
					</div><!-- contacts__i -->
					
					<div class="contacts__i">
						<div class="contacts__i-h">Дежурный по йога лагерю КЦ Аура:</div>
						
						<a href="mailto:kk@aurayoga.ru">kk@aurayoga.ru</a> <br>
						тел.: (903) 222-22-22 (Билайн)
					</div><!-- contacts__i -->
					
					<div class="contacts__i">
						<div class="contacts__i-h">Дежурный по йога лагерю на Жане:</div>
						
						<a href="mailto:yo@aurayoga.ru">yo@aurayoga.ru</a> <br>
						тел.: (926) 555-55-55 (Мегафон)
					</div><!-- contacts__i -->
					
					<div class="contacts__i">
						<div class="contacts__i-h">Дежурный по йога лагерю на Пшаде:</div>
						
						<a href="mailto:ii@aurayoga.ru">ii@aurayoga.ru</a> <br>
						тел.: (926) 555-55-55 (Мегафон)
					</div><!-- contacts__i -->
					
					<div class="contacts__i">
						<div class="contacts__i-h">Дежурный по йога лагерю на Урале:</div>

						тел.: (926) 555-55-55 (Мегафон)
					</div><!-- contacts__i -->
					
					
				</div><!-- contacts__col_tp_1 -->
				<div class="contacts__col contacts__col_tp_2">
					<h2 class="contacts__h form-space-label">Отправить заявку</h2>
					
					
					<form action="#">
					
						<div class="form-line">
							<label for="c-name" class="form-label form-label_width_same">Имя:</label>
							<input type="text" name="c-name" id="c-name" class="custom-input">
						</div><!-- form-line -->
						
						<div class="form-line">
							<label for="c-surname" class="form-label form-label_width_same">Фамилия:</label>
							<input type="text" name="c-surname" id="c-surname" class="custom-input">
						</div><!-- form-line -->
						
						<div class="form-line">
							<label for="c-e-mail" class="form-label form-label_width_same">E-mail:</label>
							<input type="text" name="c-e-mail" id="c-e-mail" class="custom-input">
						</div><!-- form-line -->
						
						<div class="form-line">
							<label for="c-phone" class="form-label form-label_width_same">Телефон:</label>
							<input type="text" name="c-phone" id="c-phone" class="custom-input">
						</div><!-- form-line -->
					
						<div class="form-line">
							<label for="role" class="form-label form-label_width_same">Вид участия:</label>
							<select id="role" name="role" class="custom-select js-custom-select">
								<option value="1">Участник</option>
								<option value="2">Зритель</option>
								<option value="3">Тренер</option>
							</select>
						</div><!-- form-line -->
						
						<div class="form-line">
							<label for="region1" class="form-label form-label_width_same">Место проведения йога-лагеря:</label>
							<select id="region1" name="region1" class="custom-select js-custom-select">
								<option value="1">Ярославская область</option>
								<option value="2">Москва</option>
								<option value="3">Санкт-Петербург</option>
								<option value="4">Новосибирск</option>
								<option value="5">Екатеринбург</option>
								<option value="6">Нижний Новгород</option>
								<option value="7">Самара</option>
								<option value="8">Казань</option>
								<option value="9">Омск</option>
								<option value="10">Челябинск</option>
								<option value="11">Ростов-на-Дону</option>
								<option value="12">Уфа</option>
								<option value="13">Волгоград</option>
								<option value="14">Пермь</option>
								<option value="15">Красноярск</option>
								<option value="16">Воронеж</option>
							</select>
						</div><!-- form-line -->

						<div class="form-line">
							<label for="c-date" class="form-label form-label_width_same">Предполагаемые даты участия:</label>
							<input type="text" name="c-date" id="c-date" class="custom-input">
						</div><!-- form-line -->
						
						<div class="form-line">
							<label for="c-comments" class="form-label form-label_width_same">Комментарии:</label>
							<input type="text" name="c-comments" id="c-comments" class="custom-input">
						</div><!-- form-line -->
						
						<div class="form-line">
							<label for="c-comments" class="form-label form-label_stl_top form-label_width_same">ведите проверочный код в поле внизу справа:</label>
							<span class="captcha"><img src="images/captcha.jpg" alt=""></span>
						</div><!-- form-line -->
						
						<div class="to-right">
							<input type="button" value="Отправить" class="button button_space_right">
						</div>

					
				</div><!-- contacts__col_tp_2 -->
				
				<div class="clearfix-block"></div>
				
			</div><!-- footer__c -->
			
		</section>
		
		<section class="footer-nav">
			
			<div class="footer__c">
				
				<div class="footer-nav__in">
					
					<ul class="footer-nav__lst">
						<li class="footer-nav__i">
							<a href="#" class="footer-nav__act">Места проведения</a>
							<ul class="footer-nav__sub-lst">
								<li class="footer-nav__sub-i">
									<a href="#" class="footer-nav__sub-act">Культурный Центр Аура</a>
									<ul class="footer-nav__sub-sub-lst">
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">О месте</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Как добраться</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Расписание</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Отзывы</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Контакты</a></li>
									</ul>
								</li>
								<li class="footer-nav__sub-i">
									<a href="#" class="footer-nav__sub-act">Лагерь на Жане</a>
									<ul class="footer-nav__sub-sub-lst">
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">О месте</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Как добраться</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Расписание</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Отзывы</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Контакты</a></li>
									</ul>
								</li>
								<li class="footer-nav__sub-i">
									<a href="#" class="footer-nav__sub-act">Лагерь на Жане</a>
									<ul class="footer-nav__sub-sub-lst">
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">О месте</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Как добраться</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Расписание</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Отзывы</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Контакты</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
					
					<ul class="footer-nav__lst">
						<li class="footer-nav__i">
							<ul class="footer-nav__sub-lst">
								<li class="footer-nav__sub-i">
									<a href="#" class="footer-nav__sub-act">Лагерь на Жане</a>
									<ul class="footer-nav__sub-sub-lst">
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">О месте</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Как добраться</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Расписание</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Отзывы</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Контакты</a></li>
									</ul>
								</li>
								<li class="footer-nav__sub-i">
									<a href="#" class="footer-nav__sub-act">Лагерь на Урале</a>
									<ul class="footer-nav__sub-sub-lst">
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">О месте</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Как добраться</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Расписание</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Отзывы</a></li>
										<li class="footer-nav__sub-sub-i"><a href="#" class="footer-nav__sub-sub-act">Контакты</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
					
					<ul class="footer-nav__lst">
						<li class="footer-nav__i"><a href="#" class="footer-nav__act">Преподаватели</a></li>
						<li class="footer-nav__i"><a href="#" class="footer-nav__act">Участникам</a></li>
						<li class="footer-nav__i"><a href="#" class="footer-nav__act">Благотворителям</a></li>
						<li class="footer-nav__i">
							<a href="#" class="footer-nav__act">Материалы</a>
							<ul class="footer-nav__sub-lst">
								<li class="footer-nav__sub-i"><a href="#" class="footer-nav__sub-act">Статьи</a></li>
								<li class="footer-nav__sub-i"><a href="#" class="footer-nav__sub-act">Фото</a></li>
								<li class="footer-nav__sub-i"><a href="#" class="footer-nav__sub-act">Видео</a></li>
								<li class="footer-nav__sub-i"><a href="#" class="footer-nav__sub-act">Аудио</a></li>
							</ul>
						</li>
						<li class="footer-nav__i"><a href="#" class="footer-nav__act">Новости</a></li>
						<li class="footer-nav__i"><a href="#" class="footer-nav__act">Форум</a></li>
					</ul>
					
				</div><!-- footer-nav__in -->
				
				<div class="copyright">
					© 2014 <a href="#">aurayoga.ru</a>
				</div><!-- copyright -->
				
				
			</div><!-- footer__c -->
			
		</section>

	</footer><!-- footer -->
	
</body>
</html>
