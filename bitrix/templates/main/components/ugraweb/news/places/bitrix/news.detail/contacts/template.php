<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach ($arResult["PROPERTIES"]["photos"]["VALUE"] as $v => $Photo):
$arPhoto[$i] = CFile::GetPath($Photo);
$i++;
endforeach;
$foto = CFile::GetPath($arResult["PROPERTIES"]["contacts_photo"]["VALUE"]);
?>
<?$GLOBALS["code"] = $arResult["CODE"];?>
		<section class="content">
			
			<div class="page__c">

				<h1>Контакты йога-лагеря <?=$arResult["NAME"]?></h1>
				<?=htmlspecialcharsBack($arResult["PROPERTIES"]["contacts"]["VALUE"]["TEXT"])?>

	
			</div><!-- page__c -->

		</section><!-- content -->

		
		
		<section class="bg" style="background-image: url(<?=$foto?>);">
			
			<div class="page__c bg__middle">
				
				
			</div><!-- page__c -->

		</section><!-- bg -->
