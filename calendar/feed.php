<?
function stripTime($date)
{
  if (empty($date)) return $date;
  $date = explode(' ', $date);
  return $date[0];
}

function parseEventParam($param)
{
  if (!isset($_GET[$param]))
    return '';

  return $_GET[$param];
}

function parseDateParam($param)
{
  if (!isset($_GET[$param]))
    return '';

  return DateTime::createFromFormat('Y-m-d', $_GET[$param]);
}

function parseDateProperty($prop, $defaultYear = '')
{
  $dt = trim($prop);
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

function parseTimeProperty($prop, &$h, &$m)
{
  $ta = explode(':', $prop);
  $h = intval($ta[0]);
  $m = 0;
  if (count($ta) == 2)
    $m = intval($ta[1]);
}

function getDateString($date, $hasTime = '')
{
  if (empty($date))
    return '';

  if ($hasTime) $hasTime = ' H:i';

  return $date->format('Y-m-d'.$hasTime);
}

$start = parseDateParam('start');
$end = parseDateParam('end');
if (empty($start) || empty($end))
{
  echo json_encode(array());
  exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

function processBlock($res, &$data)
{
  $now = new DateTime();
  $camps = array();
  while($ob = $res->GetNextElement())
  {
    $arProp = $ob->GetProperty("DATE");
    $dts = parseDateProperty(stripTime($arProp["VALUE"]));
    if (empty($dts))
      continue;

    $ts = $arProp["DESCRIPTION"];
    $arProp = $ob->GetProperty("DATE_END");
    $dte = parseDateProperty(stripTime($arProp["VALUE"]));
    if (empty($dte)) $dte = $dts;
    $te = $arProp["DESCRIPTION"];

    $t = false;
    if (!empty($ts))
    {
      $hs = 0;
      $ms = 0;
      parseTimeProperty($te, $hs, $ms);
      $he = 0;
      $me = 0;
      parseTimeProperty($te, $he, $me);
      if ($he > $hs)
      {
        $dts->setTime($hs, $ms);
        $dte->setTime($he, $me);
        $t - true;
      }
    }

    $arProp = $ob->GetProperty("TEACHER");
    $t_res = CIBlockElement::GetByID($arProp["VALUE"][0]);
    if(!($t_res = $t_res->GetNext()))
      continue;

    $arProp = $ob->GetProperty("CAMP");
    $cid = $arProp["VALUE"];
    if (!array_key_exists($cid, $camps))
    {
      $c_res = CIBlockElement::GetByID($cid);
      if(!($c_res = $c_res->GetNextElement()))
        continue;

      $c = $c_res->GetProperty("COLOR");
      $camps[$cid] = array("COLOR" => $c["VALUE"]);
    }
    $color = $camps[$cid]["COLOR"];

    $id = $t_res["ID"];
    $n = htmlspecialchars_decode($t_res["NAME"]);
    $u = "http://".$_SERVER['SERVER_NAME']."/calendar/item.php?id=".$id; //$t_res["DETAIL_PAGE_URL"];
    $a = array("id"=>$id, "title"=>$n, "url"=>$u);
    if (!empty($color)) $a["color"] = $color;

    $a["start"] = getDateString($dts, $t);
    $dtc = clone $dte;
    if (!empty($dte)) $dte = $dte->add(new DateInterval('P1D'));
    $a["end"] = getDateString($dte, $t);
    $a["_start"] = $dts;
    $a["_end"] = $dte;
    $class = 'calendar-link lightbox-dynamic';
    if ($dtc < $now) $class = 'fc-past '.$class;
    $a["className"] = $class;
    $data[] = $a;
  }
}

$filtered = array();
if(CModule::IncludeModule("iblock"))
{
  $data = array();

  //$events = parseEventParam('events');
  //if (empty($events)) $events = 'auvg';
  
  $arSelect = array("ID", "IBLOCK_ID", "NAME");
  $arFilter = array("IBLOCK_ID"=>12, "ACTIVE"=>"Y");
  $res = CIBlockElement::GetList(array("ID"=>"ASC"), $arFilter, false, false, $arSelect);
  processBlock($res, $data);

  foreach ($data as $d)
  {
    if ($d["_start"] > $end) continue;
    if ($d["_end"] < $start) continue;

    unset($d["_start"]);
    unset($d["_end"]);
    $filtered[] = $d;
  }
}

echo json_encode($filtered);
?>