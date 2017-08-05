<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
<section class="slider">
			
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
							<div class="slider__inf-sub-h">Ярославская область</div>
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
				
				<div class="main-img-changer">
					
					<div class="main-img-changer__tabs-wrapper">
						<ul class="main-img-changer__tabs">
							<li class="main-img-changer__tabs-item">
								<span class="main-img-changer__tabs-item-inner">1</span>
							</li>
							<li class="main-img-changer__tabs-item">
								<span class="main-img-changer__tabs-item-inner">2</span>
							</li>
							<li class="main-img-changer__tabs-item">
								<span class="main-img-changer__tabs-item-inner">3</span>
							</li>
							<li class="main-img-changer__tabs-item">
								<span class="main-img-changer__tabs-item-inner">4</span>
							</li>
							<li class="main-img-changer__tabs-item">
								<span class="main-img-changer__tabs-item-inner">5</span>
							</li>
						</ul>
					</div><!-- main-img-changer__tabs-wrapper -->
					
					<ul class="main-img-changer__output">
						<li class="main-img-changer__output-item">
							<div class="main-img-changer__output-item-img" style="background: url(<?=SITE_TEMPLATE_PATH?>/images/slider-1.jpg) center 0;">
							</div>
						</li>
						<li class="main-img-changer__output-item">
							<div class="main-img-changer__output-item-img" style="background: url(<?=SITE_TEMPLATE_PATH?>/images/slider-2.jpg) center 0;">
							</div>
						</li>
						<li class="main-img-changer__output-item">
							<div class="main-img-changer__output-item-img" style="background: url(<?=SITE_TEMPLATE_PATH?>/images/slider-3.jpg) center 0;">
							</div>
						</li>
						<li class="main-img-changer__output-item">
							<div class="main-img-changer__output-item-img" style="background: url(<?=SITE_TEMPLATE_PATH?>/images/slider-4.jpg) center 0;">
							</div>
						</li>
						<li class="main-img-changer__output-item">
							<div class="main-img-changer__output-item-img" style="background: url(<?=SITE_TEMPLATE_PATH?>/images/slider-5.jpg) center 0;">
							</div>
						</li>
					</ul>
				
				</div><!-- .main-img-changer -->			
				<div class="page__c">
					 
				
					 
					    
					
				</div><!-- page__c -->
				
				<div class="section-nav font-2">
				
					<div class="section-nav__in">
						<ul class="section-nav__lst">
							<li class="section-nav__i"><a href="#" class="section-nav__act">О месте</a></li>
							<li class="section-nav__i"><a href="#" class="section-nav__act">Расписание</a></li>
							<li class="section-nav__i"><a href="#" class="section-nav__act">Отзывы</a></li>
							<li class="section-nav__i section-nav__i_stt_cur"><a href="#" class="section-nav__act">Как добраться</a></li>
							<li class="section-nav__i"><a href="#" class="section-nav__act">Контакты</a></li>
						</ul>
					</div><!-- section-nav__in -->
					            <div class="clearfix-block"></div>
				</div><!-- .section-nav -->

		</section><!-- slider -->
<?endforeach;?>