<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if ($arResult["PROPERTIES"]["schedule_text"]["VALUE"]["TEXT"]):?>
<section class="content">
	<div class="page__c">
<?=htmlspecialcharsEx($arResult["PROPERTIES"]["schedule_text"]["VALUE"]["TEXT"]);?>
	</div>
</section>
<?endif;?>
<?ob_start();?>
<?foreach ($arResult["PROPERTIES"]["photos"]["VALUE"] as $v => $Photo):
$arPhoto[$i] = CFile::GetPath($Photo);
$i++;
endforeach;?>
<?
$foto1 = CFile::GetPath($arResult["PROPERTIES"]["schedule_photo_1"]["VALUE"]);
$foto2 = CFile::GetPath($arResult["PROPERTIES"]["schedule_photo_2"]["VALUE"]);?>
<section class="content">
	
	<div class="page__c">
		
		<h1>График участия преподавателей</h1>
		
		<div class="two-cols">
			
			<div class="two-cols__col-1">
				
				#SCHEDULE_<?=$arResult["ID"]?>#
				
			</div><!-- two-cols__col-1 -->
			<div class="two-cols__col-2">
				
				<div class="info-panel">
					<div class="info-panel__h font-2">Период работы йога-лагеря <?=$arResult["NAME"]?>:</div>
					<?=$arResult["PROPERTIES"]["period"]["VALUE"]?>
				</div>
				
			</div><!-- two-cols__col-2 -->
			
			<div class="clearfix-block"></div>
			
		</div><!-- two-cols -->
		
		


	</div><!-- page__c -->

</section>
<section class="bg" style="background-image: url(<?=$foto1?>);">
	
	<div class="page__c bg__middle">
		
		
	</div><!-- page__c -->

</section>
<section class="content">
	
	<div class="page__c">
		
		<div class="content-share">
			
			<h2 class="section-h">Распорядок дня</h2>
			
			<?=htmlspecialcharsBack($arResult["PROPERTIES"]["routine"]["VALUE"]["TEXT"])?>
			

			<div class="separator"></div>

			
			<div class="content-share__h">Поделиться с друзьями</div>
			
			<div class="share42init" data-url="http://www.aurayoga.ru<?=$APPLICATION->GetCurPage();?>" data-title="<?=$APPLICATION->GetTitle();?>"></div>
			<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/share42.js"></script>
			<script type="text/javascript">share42('<?=SITE_TEMPLATE_PATH?>/js/')</script>
			<br/>
			<div id="vk_comments_news"></div>
			<script type="text/javascript">
			VK.Widgets.Comments("vk_comments_news", {limit: 5, attach: "*", autoPublish: 0});
			</script>
			
		</div><!-- content-share -->
		
		
	</div><!-- page__c -->

</section>
<section class="bg" style="background-image: url(<?=$foto2?>);">
	
	<div class="page__c bg__middle">
		
		
	</div><!-- page__c -->

</section>
<?
$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();
?>
