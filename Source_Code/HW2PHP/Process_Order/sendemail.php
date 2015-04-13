<?php
// put your code here
require_once 'Mail.php';
require_once 'Mail/RFC822.php';
$from = 'hima.unadkat@gmail.com';
$head = "From:" . $from;
$subject = filter_input(INPUT_POST, 'subject');
$text = filter_input(INPUT_POST, 'message');
$smtp = array();
$smtp['host'] = 'ssl://smtp.gmail.com';
$smtp['port'] = 465;
$smtp['auth'] = true;
$smtp['username'] = 'hima.unadkat@gmail.com';
$smtp['password'] = 'myPassword';
$mailer = Mail::factory('smtp', $smtp);
$recipients = array();
// Set the headers
$headers = array();
$headers['From'] = 'hima.unadkat@gmail.com';
$em = $_POST['emailid'];
$to = $em;
$msg = "".$text;
$headers['To'] = $to;
$headers['Subject'] = $subject;
$recipients = $to;
$mailer->send($recipients, $headers, $msg, $head);
echo 'Email sent to: ' . $to . '<br />'. '<br />';
?>