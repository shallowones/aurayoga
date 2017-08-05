<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach ($arResult["PROPERTIES"]["photos"]["VALUE"] as $v => $Photo):
$arPhoto[$i] = CFile::GetPath($Photo);
$i++;
endforeach;?>
<?
$foto = CFile::GetPath($arResult["PROPERTIES"]["reviews_photo"]["VALUE"]);?>
<section class="content">
	
	<div class="page__c">
		
		<h1>Условия участия</h1>
		
		<?=htmlspecialcharsBack($arResult["PROPERTIES"]["terms"]["VALUE"]["TEXT"]);?>

	</div><!-- page__c -->

</section><!-- content -->