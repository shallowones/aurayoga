<?$res = CIBlockElement::GetByID(187);
if($ar_res = $res->GetNext())
	$pic = CFile::GetPath($ar_res["DETAIL_PICTURE"]);?>
<section class="bg" style="background-image: url(<?=$pic?>);">
	<div class="page__c bg__middle"></div>
</section>