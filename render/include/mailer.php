<?
require_once($_SERVER["DOCUMENT_ROOT"].'/render/include/mailer_php.php');
 
function custom_mail($to, $subject, $msg, $additionalHeaders = '')
{
  $mailer = new PHPMailer();
  $mailer->CharSet = 'utf-8';
  $mailer->From = 'mailer@oum.ru';
  $mailer->FromName = 'OUM.RU Mail Sevice';
  $mailer->IsHTML(true);
  $mailer->Subject = $subject;
  $mailer->Body = $msg;
  $mailer->AddAddress($to);

  return $mailer->Send();
}
?>