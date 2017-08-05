<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach ($arResult["PROPERTIES"]["photos"]["VALUE"] as $v => $Photo):
$arPhoto[$i] = CFile::GetPath($Photo);
$i++;
endforeach;?>
<?
$foto = CFile::GetPath($arResult["PROPERTIES"]["reviews_photo"]["VALUE"]);?>
<section class="content">
	
	<div class="page__c">
		
		<p>Здесь вы можете найти попутчика.</p>
		
		<div class="separator"></div>
		
		<div class="content-share">
			
			<? /*<div class="content-share__h">Поделиться с друзьями</div>
			
			<div class="share42init" data-url="http://www.aurayoga.ru<?=$APPLICATION->GetCurPage();?>" data-title="<?=$APPLICATION->GetTitle();?>"></div>
			<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/share42.js"></script>
			<script type="text/javascript">share42('<?=SITE_TEMPLATE_PATH?>/js/')</script>
			<br/>
			*/ ?>
			<div id="vk_comments_news"></div>
			<script type="text/javascript">
			VK.Widgets.Comments("vk_comments_news", {limit: 5, attach: "*", autoPublish: 0});
			</script>
		</div><!-- content-share -->

	</div><!-- page__c -->

</section><!-- content -->