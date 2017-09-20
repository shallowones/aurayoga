<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
require_once($_SERVER["DOCUMENT_ROOT"].'/render/timetable.php');
$now = new DateTime();
CModule::IncludeModule('iblock');
$ranges = array();
$nuts = array();
$accs = array();
$arSelect = array("ID", "CODE", "NAME", "PROPERTY_PERIOD", "PROPERTY_NUTRITION", "PROPERTY_ACCOMODATION");
$arFilter = array("IBLOCK_ID"=>11, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement())
{
  $arFields = $ob->GetFields();
  $id = $arFields["ID"];
  $ranges[$id] = parseDateRange($arFields["PROPERTY_PERIOD_VALUE"], $now);
  $nuts[$id] = $arFields["PROPERTY_NUTRITION_VALUE"];
  $accs[$id] = $arFields["PROPERTY_ACCOMODATION_VALUE"];
}
?>

<?// Вывод формы для вопроса?>

<form action="#askform" method="post" id="form-ask">
	<?// Вывод сообщение об успешной отправке?>
	<?if($_SESSION['SEND_REQUEST_OK']):?>
		<div class="form-success-request"><?=$arParams['OK_TEXT']?></div>
		<?$_SESSION['SEND_REQUEST_OK'] = 0;?>
	<?endif;?>
	<?
	// Вывод ошибок, если есть
	if (count($arResult["Error"]) > 0):?>
		<div class="form-fail-request">
		<?echo implode("<br />", $arResult["Error"]);?>
		</div>
	<?endif;
	?>

	<div class="form-line">
		<label for="form-name" class="form-label form-label_width_same">ФИО:<span class="required-mark">*</span></label>
		<input type="text" name="question-name" id="c-name" class="custom-input" value="<?=$arResult["question-name"]?>" required>
	</div><!-- form-line -->
	<!--<div class="form-line">
		<label for="form-surname" class="form-label form-label_width_same">Фамилия:<span class="required-mark">*</span></label>
		<input type="text" name="question-surname" value="<?=$arResult["question-surname"]?>" class="custom-input" required>
	</div>-->
	<div class="form-line">
		<label for="form-email" class="form-label form-label_width_same">E-mail:<span class="required-mark">*</span></label>
		<!--<input type="text" name="question-email" value="<?=$arResult["question-email"]?>" class="custom-input" required>-->
                <input type="email" name="question-email" value="<?=$arResult["question-email"]?>" class="custom-input" required>
                <!--pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />-->
	</div>
	<div class="form-line">
		<label for="form-phone" class="form-label form-label_width_same">Телефон:<span class="required-mark">*</span></label>
		<input type="text" name="question-phone" value="<?=$arResult["question-phone"]?>" class="custom-input" required>
	</div>
        <div class="form-line">
		<label for="form-city" class="form-label form-label_width_same">Город:<span class="required-mark">*</span></label>
		<input type="text" name="question-city" id="c-city" class="custom-input" value="<?=$arResult["question-city"]?>" required>
	</div>
        <div class="form-line form-label-left-space field-type-place">
		<label for="form-place" class="form-label form-label_width_same">Место проведения йога-лагеря:<span class="required-mark">*</span></label>
		<select id="place" name="question-place" class="custom-select js-custom-select" onchange="SwitchNutrition()" >
			<option <?if(empty($arResult["question-place"])):?>selected=""<?endif?> value="" default disabled>- не выбрано -</option>
			<?foreach($arResult["place"] as $key => $value):?>
<?
$min = $ranges[$key]["START"]->format('d.m.Y');
$max = $ranges[$key]["END"]->format('d.m.Y');
$completed = $ranges[$key]["COMPLETED"] ? ' (лагерь завершён)' : '';
$selected = (!empty($arResult["question-place"]) && $arResult["question-place"] == $key) ? 'selected' : '';
$disabled = $ranges[$key]["COMPLETED"] ? ' disabled' : '';
$nut = $nuts[$key];
$acc = $accs[$key];
?>
			<option <?=$selected.$disabled;?> value="<?=$key?>" data-email="<?=$value["EMAIL"]?>" data-min="<?=$min;?>" data-max="<?=$max;?>" data-comp="<?=$completed;?>" data-nut="<?=$nut;?>" data-acc="<?=$acc;?>"><?=$value["NAME"]?><?=$completed;?></option>
			<?endforeach?>
		</select>
                <input type="hidden" id="place-email" name="place-email" value="aura@oum.ru">
	</div>
        <div class="form-line field-type-date">
		<label for="form-date" class="form-label form-label_width_same">Предполагаемые даты участия: с<span class="required-mark">*</span></label>
		<input type="text" id="datepicker1" name="question-date" value="<?=$arResult["question-date"]?>" min="<?=$arResult["question-date-min"]?>" max="<?=$arResult["question-date-max"]?>" class="custom-input date-range" required>
                <span class="hint">образец: 01.06.<?=date('Y');?></span>
                <label for="form-date" class="form-label form-label_width_same">по<span class="required-mark">*</span></label>
                <input type="text" id="datepicker2" name="question-date-2" value="<?=$arResult["question-date-2"]?>" min="<?=$arResult["question-date-min"]?>" max="<?=$arResult["question-date-max"]?>" class="custom-input date-range" required>
                <span class="hint">образец: 05.06.<?=date('Y');?></span>
                <input type="hidden" name="question-date-min" value="<?=$arResult["question-date-min"]?>" class="date-range-min">
                <input type="hidden" name="question-date-max" value="<?=$arResult["question-date-max"]?>" class="date-range-max">
	</div>

	<div class="form-line field-type-nutrition" <?if(empty($arResult["question-place"]) || !$nut):?>style="display:none;"<?endif?>>
	  <label for="form-nutrition" class="form-label form-label_width_same">Тип питания:</label>
          <select id="nutrition" name="question-nutrition" class="custom-select js-custom-select">
                        <option <?if(empty($arResult["question-nutrition"])):?>selected=""<?endif?> value="" default disabled>- не выбрано -</option>
			<?foreach($arResult["nutrition"] as $key => $value):?>
			<option <?if(!empty($arResult["question-nutrition"]) && $arResult["question-nutrition"] == $key):?>selected=""<?endif?> value="<?=$key?>"><?=$value?></option>
			<?endforeach?>
	  </select>
	</div>

	<div class="form-line field-type-accomodation" <?if(empty($arResult["question-place"]) || !$acc):?>style="display:none;"<?endif?>>
	  <label for="form-accomodation" class="form-label form-label_width_same">Размещение:</label>
          <select id="accomodation" name="question-accomodation" class="custom-select js-custom-select">
                        <option <?if(empty($arResult["question-accomodation"])):?>selected=""<?endif?> value="" default disabled>- не выбрано -</option>
			<?foreach($arResult["accomodation"] as $key => $value):?>
			<option <?if(!empty($arResult["question-accomodation"]) && $arResult["question-accomodation"] == $key):?>selected=""<?endif?> value="<?=$key?>"><?=$value?></option>
			<?endforeach?>
	  </select>
	</div>
	
        <!--
	<div class="form-line form-label-left-space">
		<label for="region2" class="form-label form-label_width_same">Вид участия<span class="required-mark">*</span></label>
		<select id="role" name="question-role" class="custom-select js-custom-select" required>
			<option value="">- не выбрано -</option>
			<?foreach($arResult["role"] as $key => $value):?>
			<option <?if(!empty($arResult["question-role"]) && $arResult["question-role"] == $key):?>selected=""<?endif?> value="<?=$key?>"><?=$value?></option>
			<?endforeach?>
		</select>
	</div>
        -->
	<div class="form-line">
		<label for="form-comments" class="form-label form-label_width_same">Вопросы и пожелания</label>
		<!--<input type="text" name="question-comments" value="<?=$arResult["question-comments"]?>" class="custom-input">-->
                <textarea cols="40" rows="8" name="question-comments" class="custom-input"><?=$arResult["question-comments"]?></textarea>
	</div>
	<?if($arResult["use_captcha"] == "Y"):?>
	<div class="form-line">
		<label class="form-label form-label_width_same" for="text-1"> </label>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["captcha_code"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["captcha_code"]?>" width="300" height="60" alt="CAPTCHA">
	</div>
	<div class="form-line">
		<label for="captcha" class="form-label form-label_width_same">Введите код с картинки<span class="required-mark">*</span> </label>
		<input type="text" id="form-position" class="custom-input" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?><!-- form-line -->

<?
require_once($_SERVER["DOCUMENT_ROOT"].'/render/settings.php');
if (empty($settings)) $settings = RenderSettings::getInstance();
?>
<div class="form-line">
  <input type="checkbox" name="law" id="law" required checked>
  <span class="required-mark">*</span>
  <span><?=$settings->GetString('FORM_LAW');?></span>
</div>

	<div class="to-right">
		<p><span class="required-mark">*</span> — поля, обязательные для заполнения</p>
	</div>
	<div class="to-right">
		<input type="submit" id="sub" name="submit-ask" value="Отправить" class="button button_space_right <?if($_SESSION['SEND_REQUEST_OK']) echo 'success';?>">
    </div>
	<?if($_SESSION['SEND_REQUEST_OK']):?>
		<div class="form-success-request"><?=$arParams['OK_TEXT']?></div>
            <script>
            $(window).load(function() {
              yaCounter24884984.reachGoal('zayvka');
            });
            </script>
		<?$_SESSION['SEND_REQUEST_OK'] = 0;?>
	<?endif;?>


    <hr>
    <div class="to-right infobox">
        <p><b>Если у вас возникли проблемы с отправкой заявки</b>, пожалуйста, продублируйте её на почту куратору соответствующего лагеря<br>(адреса слева от формы).<br>Если возможно, приложите к письму скриншот (копию экрана)<br>с формой заявки или укажите данные, которые вы вводили в форму.<br>ОМ</p>
    </div>

</form>

