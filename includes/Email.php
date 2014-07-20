<?php

require_once("includes/config.php");

class Email  {

  // send an email
  static public function sendEmail($to, $subject, $message, $from="no-reply@dcmclaims.com", $html=false) {

    global $config;

    $headers = 'From: '.$from . "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    if ($html) {
      $headers .= "\r\nMIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    }

    if ($config['in_production'] === false) {
      $to = $config['support_email'];
    }

    if (mail($to, $subject, $message, $headers)) {
      return true;
    }

    return false;

  }

  // contact email
  static public function contactEmail($to, $subject, $body, $from) {

    return Email::sendEmail($to, $subject, $body, $from);

  }

  // forgot password email
  static public function forgotEmail($to, $subject, $body, $from) {

    return Email::sendEmail($to, $subject, $body, $from);

  }

}

?>
