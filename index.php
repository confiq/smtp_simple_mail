<?php
/* 
 * simple testing smtp server
 * 
 */
require_once "Mail.php"; //you must have "pear Mail" installed :(
//conf
$from = 'somebody.from@confiq.org';
$to = 'webmail.com@confiq.org';
$subject = 'test mail from php';
$content = php_uname().date('r');
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

$mail = $smtp->send($to,$headers,$content);
if (PEAR::isError($mail)) {
    echo $mail->getMessage();
} else {
    echo 'Success :P';
}


?>
