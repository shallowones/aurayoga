<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Расписание занятий");
$APPLICATION->SetTitle("Расписание занятий");

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

$defaultDate = parseDateParam('date');
if (empty($defaultDate)) $defaultDate = new DateTime(); //'2016-05-01');
$defaultDate = 'defaultDate: "'.$defaultDate->format("Y-m-d").'",';
$eventType = parseEventParam('events');
if (!empty($eventType)) $eventType = ',data:{events:"'.$eventType.'"}';
?>

<!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>-->
<link rel='stylesheet' href='/render/fonts/fregat/fregat.css' />
<link rel='stylesheet' href='fullcalendar.min.css' />
<link href='fullcalendar.print.css' rel='stylesheet' media='print' />
<style>
  #t-link { float: right; position: relative; top: 3px; right: 5px; }
  #calendar, table.legend { font-family: fregatregular, sans-serif; }
  #calendar h2 { color: #993399; }
  table.legend { margin-top: 12px; }
  table.legend i { margin-left: 15px; font-size: 28px; line-height: 20px; top: 3px; position: relative; }
  table.legend td { cursor: pointer; }
  table.legend .hidden { opacity: 0.25 }
  a.calendar-link { color: #fff; text-decoration: none; }
  a.calendar-link.hidden { display: none; }
  .fc-event.fc-past { background-color: #aaa !important; border-color: #aaa !important; }
  .fc-day-number.fc-today { font-weight: bold; }
  .fc-bg .fc-today { background-color: #fcf8e3 !important; }
  .fc-bg .fc-sat, .fc-bg .fc-sun { background-color: #fff2f5; }
  .throbber { margin-top: 5px; }
  /*.mfp-preloader { width: 43px; height: 20px; background: url("/render/images/loader.gif") no-repeat center; }*/
  .ajax-text-and-image { position:relative; max-width:800px; margin: 0px auto; background: #FFF; padding: 0; line-height: 0; }
  .ajcol { width: 50%; float:left; }
  .ajcol h1, .ajcol h2 { text-align:center; padding-right:30px; margin-bottom: 8px;}
  .ajcol img { width: 100%; height: auto; max-height: 300px; }
  .ajcol p, .ajcol a { font-family: fregatregular,sans-serif; }
  .ajcol p { overflow: hidden; text-overflow: ellipsis; margin-bottom: 0.5em; }
  .ajcol a { margin-right: 20px; position: relative; float: right; }
  @media all and (max-width:30em) { .ajcol { width: 100%; float:none; } }
</style>
<!--<link rel='stylesheet' href='scheduler.min.css' />-->
<!--<script src='lib/jquery.min.js'></script>-->
<script src='lib/moment.min.js'></script>
<script src='fullcalendar.min.js'></script>
<!--<script src='scheduler.min.js'></script>-->
<script src='./lang/ru.js'></script>
<script src="/render/include/throbber/throbber.js"></script>
<script src="<?=CUtil::GetAdditionalFileURL('/render/js/jquery.mobile.swipe.min.js');?>"></script>
<script>
function toggleCalendarEvents(l)
{
  $(l).toggleClass('hidden');
  var e = $(l).children('i').first();
  var c = $(e).css('color');
  $('a.calendar-link').each(function() {
    if ($(this).css('background-color') == c) $(this).toggleClass('hidden');
  });
}
function findLegend(item)
{
  var c = $(item).css('background-color');
  var l = null;
  $('table.legend i').each(function() {
    if ($(this).css('color') == c) l = $(this).parent();
  });
  return l;
}
</script>

<?
$legend = array();
$arSelect = array("ID", "NAME", "PROPERTY_COLOR");
$arFilter = array("IBLOCK_ID"=>11, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
  $arFields = $ob->GetFields();
  $color = $arFields["PROPERTY_COLOR_VALUE"];
  if (empty($color)) $color = '#95268F';
  $legend[$arFields["ID"]] = array("COLOR" => $color, "NAME" => $arFields["NAME"]);
}
?>

<a name="table"></a>
<a href="/timetable/#calendar" title="Посмотреть в таблице"><img src="/calendar/images/table.png" style="float:right;" /><span id="t-link">Таблица</span></a>
<h1>Расписание занятий</h1>

<?if (count($legend) > 0):?>
<table class="legend"><tr>
<?foreach ($legend as $id => $l):?>
<?if ($id != 1440):?>
<td onclick="toggleCalendarEvents(this)"><i class="fa fa-circle" style="color:<?=$l["COLOR"];?>;">●</i> <span><?=$l["NAME"];?></span></td>
<?endif;?>
<?endforeach;?>
</tr></table>
<?endif;?>

<br>
<div id="calendar"></div>
<br>
<p><a href="/timetable/#calendar">Посмотреть в таблице</a></p>

<?
echo '<script>
$(document).ready(function() {
  var throb = Throbber({
    color: "#95268F",
    size: 20,
    strokewidth: 1.8,
    fallback: "ajax-loader.gif",
  });
  var h = new Date().getHours();
  if (h > 0) h--;
  $("#calendar").fullCalendar({
    header: {
      left:   "prevYear,prev,next,nextYear today",
      center: "title",
      right:  "month,agendaWeek" //timelineYear
    },
    views: {
      agendaWeek: {
        allDaySlot: true,
        columnFormat: "ddd D MMM",
        scrollTime: h+":00:00"
      },
      timelineYear: {
        slotDuration: { months: 1}
      }
    },
    firstDay: 1,
    eventColor: "#95268F",
    lang: "ru",
    timeFormat: "H(:mm)",'
    .$defaultDate.'
    loading: function(isLoading, view) {
      if (isLoading)
        throb.start();
      else
        throb.stop();
    },
    eventAfterAllRender: function(view) {
      $(".calendar-link").each(function() {
        var t = $(this).find(".fc-title").text();
        $(this).attr("title", t);
        var l = findLegend(this);
        if (l && l.is(".hidden")) $(this).addClass("hidden");
      });
      $(".lightbox-dynamic").magnificPopup({
        type:"ajax",
        removalDelay: 300,
	mainClass: "mfp-zoom-in",
        callbacks: {
          ajaxContentAdded: function() {
            var h1 = $(".ajcol h1")[0];
            var offset = h1.offsetHeight + h1.offsetTop;
            $(".ajcol p").css("height", 245 - offset);
          }
        }
      });
    },
    eventSources: [
      {
        url: "http://'.$_SERVER['SERVER_NAME'].'/calendar/feed.php"'.$eventType.'
      }
    ]
  });
  throb.elem.className = "throbber";
  throb.appendTo(document.getElementById("calendar").getElementsByClassName("fc-left")[0]);
  $("#calendar .fc-view-container").on("swiperight", function() {
    $("#calendar").fullCalendar("prev");
  });
  $("#calendar .fc-view-container").on("swipeleft", function() {
    $("#calendar").fullCalendar("next");
  });
});
</script>';
?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/render/lightbox.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>