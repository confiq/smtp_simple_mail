<?php
/**
 * simple testing smtp server
 */
require_once "Mail.php";  //TODO: Check if Pear exist
/*
 * you must have "pear Mail" installed, to install it simply write
 * sudo pear install Mail Net_SMTP
 * in terminal
 */
//conf
$from = 'somebody.from@confiq.org';
$to = 'box.com@confiq.org';
$subject = 'test mail from php';
$body = php_uname().date('r');
$host = 'test.confiq.org';
//code
$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject,
   );
$smtp = Mail::factory('smtp',
        array(
            'host' => $host,
            'auth' => false,
        )
    );

$mail = $smtp->send($to,$headers,$body);

if (PEAR::isError($mail)) {
    echo $mail->getMessage();
} else {
    echo 'Success :P';
}