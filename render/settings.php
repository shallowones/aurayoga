<?

class RenderSettings {

  private static $_instance;
  private $_strings = array();
  private $_defaults = array(
    "usewiki" => false,
    "usehl" => false,
    "usemeta" => false,
    "usefn" => false,
    "usealign" => true,
    "valign" => true,
    "useextra " => true,
    "usetoc" => false,
    "usenav" => true,
    "usenavg" => false,
    "backlink" => true,
    "alllink" => false,
    "alllink2" => false,
    "callink" => false,
    "usesims" => false,
    "useshare" => true,
    "usehelp" => true,
    "usevk" => true,
    "nofirstimg" => false,
    "lightbox_auto" => false,
    "mistakes" => false,
    "bookmarks" => false,
    "reader_mode" => false
  );
  private $_options = null;

  private function __construct($options = null)
  {
    $this->_strings = array(
      "NAV_PREV" => array("s1"=>"Предыдущая", "s2"=>"Previous"),
      "NAV_NEXT" => array("s1"=>"Следующая", "s2"=>"Next"),
      "NAV_ROOT" => array("s1"=>"Оглавление", "s2"=>"Contents"),
      "NAV_BACK" => array("s1"=>"Назад в раздел", "s2"=>"Back to"),
      "NAV_ALL" => array("s1"=>"Все", "s2"=>"All"),
      "SIM_CAP" => array("s1"=>"Материалы по теме:", "s2"=>"See also:"),
      "SHARE_CAP" => array("s1"=>"Поделиться с друзьями", "s2"=>"Share with friends"),
      "HELP_CAP" => array("s1"=>"Ваша помощь проекту", "s2"=>"Your donations"),
      "HELP_LINK" => array("s1"=>"/about/help/", "s2"=>"/en/about/help/"),
      "MSG_MISTAKE" => array("s1"=>"Если вы заметили ошибку на сайте, пожалуйста, выделите её и нажмите", "s2"=>"If you encountered an error, please, select it and press"),
      "MSG_TOGGLE_V" => array("s1"=>"Показать/скрыть", "s2"=>"Toggle visibility"),
      "MODE_WIKI" => array("s1"=>"Словарь", "s2"=>"Wiki mode"),
      "MODE_READER" => array("s1"=>"Режим чтения", "s2"=>"Reader mode"),

      "BM_CAP" => array("s1"=>"Закладки", "s2"=>"Bookmarks"),
      "BM_ADD" => array("s1"=>"Добавить", "s2"=>"Add"),
      "BM_EXISTS" => array("s1"=>"На это месте уже есть закладка", "s2"=>"Bookmark already exists at current position"),
      "BM_NAME" => array("s1"=>"Название закладки", "s2"=>"Bookmark title"),

      "FORM_NAME" => array("s1"=>"ФИО", "s2"=>"Full name"),
      "FORM_NAME_TIP" => array("s1"=>"Образец: Пушкин Александр Сергеевич", "s2"=>"Example: John Smith"),
      "FORM_PHONE" => array("s1"=>"Номер телефона", "s2"=>"Phone number"),
      "FORM_PHONE_PH" => array("s1"=>"Только цифры", "s2"=>"Numbers only"),
      "FORM_PHONE_TIP" => array("s1"=>"Образец: 79991112233", "s2"=>"Example: 79991112233"),
      "FORM_CAP" => array("s1"=>"Защитный код (русские буквы)", "s2"=>"Protection code"),
      "FORM_CAP_ALT" => array("s1"=>"Загрузка кода...", "s2"=>"Loading code..."),
      "FORM_CAP_CHK" => array("s1"=>"Проверка", "s2"=>"Check"),
      "FORM_CAP_CHK_PH" => array("s1"=>"Введите защитный код в это поле", "s2"=>"Enter protection code here"),
      "FORM_CAP_CHK_TIP" => array("s1"=>"Только русские буквы", "s2"=>""),
      "FORM_SEND" => array("s1"=>"Отправить", "s2"=>"Submit"),
      "FORM_SUB_OK" => array("s1"=>"Подписка оформлена. Благодарим.", "s2"=>"You are subscribed. Thank you."),
      "FORM_LAW" => array(
        "s1" => 'Я ознакомился с <a href="/law/agreement/" target="_blank">соглашением</a> и подтверждаю согласие на обработку персональных данных',
        "s2" => 'I have read the <a href="/law/agreement/" target="_blank">agreement</a> and confirm processing my personal data'
      )
    );

    $this->_options = array();
    $this->_options["site_id"] = defined('SITE_ID') ? strval(SITE_ID) : 's1';
    foreach ($this->_defaults as $key => $value)
      $this->_options[$key] = $value;

    if (is_array($options))
      foreach ($options as $key => $value)
        $this->_options[$key] = $value;
  }
    
  static function getInstance($options = null)
  {
    if (!isset(self::$_instance)) {
      self::$_instance = new self($options);
    }
    return self::$_instance;
  }

  public function __set($key, $value)
  {
    $this->_options[$key] = $value;
  }

  public function __get($key)
  {
    if (array_key_exists($key, $this->_options))
      return $this->_options[$key];

    $trace = debug_backtrace();
    trigger_error('Undefined property via __get(): '.$name.' in '.$trace[0]['file'].' on line '.$trace[0]['line'], E_USER_NOTICE);
    return null;
  }

  public function Reset($key)
  {
    if (array_key_exists($key, $this->_options))
      return $this->_options[$key] = $this->_defaults[$key];
  }

  public function GetSiteID()
  {
    return $this->_options['site_id'];
  }

  public function GetString($code)
  {
    if (!array_key_exists($code, $this->_strings))
      return '';

    $sid = $this->GetSiteID();
    $ar = $this->_strings[$code];
    if (is_array($ar))
      return $ar[$sid];

    return '';
  }
}

$settings = RenderSettings::getInstance($options);

?>