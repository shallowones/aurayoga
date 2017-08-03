<?
function parseIDParam($param)
{
  if (!isset($_GET[$param]))
    return '';

  return $_GET[$param];
}

$id = parseIDParam('id');
if (empty($id))
{
  echo 'Not found';
  exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$data = '';
if(CModule::IncludeModule("iblock"))
{
  $res = CIBlockElement::GetByID($id);
  if($res = $res->GetNextElement())
  {
    $ar = $res->GetFields();
    $n = $ar["NAME"];
    $t = $ar["DETAIL_TEXT"];
    $t = preg_replace("/<.*?>/", " ", htmlspecialchars_decode($t));
    //if (strlen($t) > 600) $t = substr($t, 0, 600).'…';
    $i = CFile::GetFileArray($ar["DETAIL_PICTURE"]);
    $u = $ar["DETAIL_PAGE_URL"];

    $data = '
    <div class="ajax-text-and-image zoom-anim-dialog" style="height: 300px !important;">
      <div class="ajcol">
        <img src="'.$i["SRC"].'" onclick="$.magnificPopup.close();" />
      </div>
      <div class="ajcol" style="line-height: 1.231;">
        <div style="padding: 1em">
          <h1>'.$n.'</h1>
          <p>'.$t.'</p>
          <a href="'.$u.'">Читать дальше...</a>
        </div>
      </div>
      <div style="clear:both; line-height: 0;"></div>
    </div>';
  }
}

echo $data;
?>