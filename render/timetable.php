<?
function str_translit($str)
{
  $converter = array(
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
    'А' => 'A',   'Б' => 'B',   'В' => 'V',
    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
    'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
    'Л' => 'L',   'М' => 'M',   'Н' => 'N',
    'О' => 'O',   'П' => 'P',   'Р' => 'R',
    'С' => 'S',   'Т' => 'T',   'У' => 'U',
    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
    'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
    'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
    'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
  );

  $str = strtr($str, $converter);
  $str = strtolower($str);
  $str = preg_replace('~[^-A-Za-z0-9_]+~u', '-', $str);
  $str = trim($str, '-');

  return $str;
}

function stripTime($date)
{
  if (empty($date)) return $date;
  $date = explode(' ', $date);
  return $date[0];
}

function TimetableDate ($date1, $date2 = '') {
	$d1 = mb_strtolower(FormatDate("j", MakeTimeStamp($date1)));
        $d2 = '';
        if (!empty($date2)) $d2 = mb_strtolower(FormatDate("j", MakeTimeStamp($date2)));
        if ($d2 != $d1 && !empty($d2)) $d1 .= ' - '.$d2;
	return ($d1);
}

function TimetableDays ($date1, $date2 = '') {
	$d1 = mb_strtolower(FormatDate("l", MakeTimeStamp($date1)));
        $d2 = '';
        if (!empty($date2)) $d2 = mb_strtolower(FormatDate("l", MakeTimeStamp($date2)));
        if ($d2 != $d1 && !empty($d2)) $d1 .= ' - '.$d2;
	return ($d1);
}

function TimetableMonth ($date) {
	$months_r = array(
		"1" => "Январь",
		"2" => "Февраль",
		"3" => "Март",
		"4" => "Апрель",
		"5" => "Май",
		"6" => "Июнь",
		"7" => "Июль",
		"8" => "Август",
		"9" => "Сентябрь",
		"10" => "Октябрь",
		"11" => "Ноябрь",
		"12" => "Декабрь"); 
	$date_new = $months_r[FormatDate("n", MakeTimeStamp($date))];
	return ($date_new);

}

function parseDateProperty($prop, $defaultYear = '')
{
  $prop = explode(' ', trim($prop));
  $dt = $prop[0];
  $dta = explode('.', $dt);
  if (count($dta) < 2)
    return '';

  $y = 'Y';
  if (count($dta) == 2)
  {
    if (empty($defaultYear)) $defaultYear = date('Y');
    $dt .= '.'.$defaultYear;
  }
  else if (strlen($dta[2]) == 2)
    $y = strtolower($y);

  return DateTime::createFromFormat('d.m.'.$y, $dt);
}

$now = new DateTime();

function parseDateRange($d, $now)
{
  $di = array("SRC"=>$d, "START"=>'', "END"=>'', "VALUE"=>$d, "COMPLETED"=>'');
  $da = explode('-', $d);
  if (count($da) > 1)
  {
    $d1 = parseDateProperty(trim($da[0]));
    $d2 = parseDateProperty(trim($da[count($da)-1]));
    if ($d1 && $d2)
    {
      $di["START"] = $d1;
      $di["END"] = $d2;
      if ($now > $d2) $di["COMPLETED"] = '<br><span class="completed">(завершён)</span>';
      if (count($da) == 2)
      {
        $d1 = strtolower(FormatDate("d F", MakeTimeStamp($d1->format('d.m.Y'))));
        $d2 = strtolower(FormatDate("d F", MakeTimeStamp($d2->format('d.m.Y'))));
        $di["VALUE"] = $d1.' - '.$d2;
      }
    }
  }
  return $di;
}
?>