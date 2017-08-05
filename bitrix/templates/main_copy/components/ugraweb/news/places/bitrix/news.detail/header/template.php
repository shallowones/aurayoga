<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?ob_start();?>
<?foreach ($arResult["PROPERTIES"]["photos"]["VALUE"] as $v => $Photo):
$arPhoto[$i] = CFile::GetPath($Photo);
$i++;
endforeach;?>
<?
$GLOBALS["code"] = $arResult["CODE"];?>
<section class="slider">
			<?if (is_array($arResult['LINK']['PREVIOUS'])):?>
			<div class="slider__act slider__act_lt_left">
				<div class="slider__act-in">
					<div class="slider__act-in-in">

						<a href="<?=$arResult['LINK']['PREVIOUS']['DETAIL_PAGE_URL']?>" class="slider__inf font-2">
							<div class="slider__inf-h">Йога-лагерь Аура</div>
							<div class="slider__inf-h"><?=$arResult['LINK']['PREVIOUS']['NAME']?></div>
						</a>
						
					</div><!-- slider__act-in-in -->
				</div><!-- slider__act-in -->
			</div><!-- slider__act -->
			<?endif;?>
			
			<div class="slider__act slider__act_lt_center">
				<div class="slider__act-in">
					<div class="slider__act-in-in">
						
						<div class="slider__inf font-2">
							<div class="slider__inf-h">Йога-лагерь Аура</div>
							<div class="slider__inf-sub-h"><?=$arResult["NAME"]?></div>
						</div>
						
					</div><!-- slider__act-in-in -->
				</div><!-- slider__act-in -->
			</div><!-- slider__act -->
			<?if (is_array($arResult['LINK']['NEXT'])):?>
			<div class="slider__act slider__act_lt_right">
				<div class="slider__act-in">
					<div class="slider__act-in-in">
						
						<a href="<?=$arResult['LINK']['NEXT']['DETAIL_PAGE_URL']?>" class="slider__inf font-2">
							<div class="slider__inf-h">Йога-лагерь Аура</div>
							<div class="slider__inf-h"><?=$arResult['LINK']['NEXT']['NAME']?></div>
						</a>
						
					</div><!-- slider__act-in-in -->
				</div><!-- slider__act-in -->
			</div><!-- slider__act -->
			<?endif;?>	
				<div class="main-img-changer">
					
					<div class="main-img-changer__tabs-wrapper">
						<ul class="main-img-changer__tabs">
							<?$i=1;
							foreach ($arPhoto as $v => $Photo):?>
							
							<li class="main-img-changer__tabs-item">
								<span class="main-img-changer__tabs-item-inner"><?=$i?></span>
							</li>
							<?
							$i++;
							endforeach?>
						</ul>
					</div><!-- main-img-changer__tabs-wrapper -->
					
					<ul class="main-img-changer__output">
						<?foreach ($arPhoto as $v => $Photo):?>
						<li class="main-img-changer__output-item">
							<div class="main-img-changer__output-item-img" style="background: url(<?=$Photo?>) center 0;">
							</div>
						</li>
						<?endforeach;?>
					</ul>
				
				</div><!-- .main-img-changer -->			
				<div class="page__c">
					 
				
					 
					    
					
				</div><!-- page__c -->

				<div class="section-nav font-2">
				
#MENU_1#
					            <div class="clearfix-block"></div>
				</div><!-- .section-nav -->

		</section><!-- slider -->
		<?
$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();
?>