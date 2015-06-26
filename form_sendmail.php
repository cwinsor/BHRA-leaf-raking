<?php

//////////////////////
// reference
// http://www.open-emr.org/wiki/index.php/Mercury_Mail_Configuration_in_Windows

// $recipient="username@localhost";
// $subject="Test Email";
// $mail_body="Nobody is going to get this email but me.";


ini_set('display_errors', 1); 
error_reporting(E_ALL);

//$rtn = mail('cwinsor@gmail.com', 'Mercury test mail', 'If you can read this, everything was fine!');
//$rtn = mail('cwinsor@gmail.com', 'test', 'this is a test', '', "-fboston_102030@yahoo.com");
//$rtn = mail('cwinsor@gmail.com', 'test', 'this is a test', '', '-fpostmaster@localhost');


//$to = "cwinsor@gmail.com";
//$subject = "Hello";
//$message = "How are you ?";
//$from = "cwinsor@gmail.com";
//$headers = "From:" . $from;
//$rtn = mail($to,$subject,$message,$headers);



//$to      = 'cwinsor@gmail.com';
//$subject = 'the subject';
//$message = 'hello';
//$headers = 'From: cwinsor@gmail.com' . "\n" .
//    'Reply-To: cwinsor@gmail.com' . "\n" .
//    'X-Mailer: PHP/' . phpversion();
//$rtn = mail($to, $subject, $message, $headers, '-femail.address@example.com'); 
$rtn = mail('cwinsor@gmail.com', 'Subject3', 'Body3', 'From: cwinsor@gmail.com', '-f user@example.org');


if ($rtn) {
echo "accepted for delivery4..." . $rtn;
} else {
	echo "failed..." . $rtn;
}
 ?>

