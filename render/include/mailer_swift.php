<?
require_once($_SERVER["DOCUMENT_ROOT"].'/render/include/swiftmailer/swift_required.php');
 
function custom_mail($to, $subject, $msg, $additionalHeaders = '')
{
     if(strpos($additionalHeaders, 'text/plain') !== false){
        $text_type = 'text/plain'; 
     }
     else{
        $text_type = 'text/html';
     }
    $toList = explode(',', $to);
     
    Swift_Preferences::getInstance()->setCharset('utf-8');
     
    $transport = Swift_SmtpTransport::newInstance('mail.oum.ru')
        ->setPort(587)
        ->setUsername('mailer@oum.ru')
        ->setPassword('JmUk81h*vu3p')
    ;
     
    $mailer = Swift_Mailer::newInstance($transport);
     
    $message = Swift_Message::newInstance($subject)
        ->setFrom(array('mailer@oum.ru' => 'OUM.RU Mail Sevice'))
        ->setTo($toList)
        ->setBody($msg, $text_type)
    ;
     
    return $mailer->send($message); 
  
}
?>