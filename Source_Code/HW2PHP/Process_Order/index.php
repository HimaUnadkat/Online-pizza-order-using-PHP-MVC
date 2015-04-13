<?php
require "model.php";
require('../model/db_connect.php');
require('../model/order_repository.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'ListOrder';
}

if($action=="ListOrder"){
   
    $result=getAllOrders();
    $result->execute();
    include 'listorder.php'; 
   // var_dump($result);
    
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $oid=$row["o_id"];
            $extra1=$row["o_extracheese"];
          
}

}
if($action=="send Email"){
    $hiddenId=$_POST['hiddenorderid'];
    echo "Order id is=$hiddenId";
    echo "<br>";
    $resultOrder= getOrderInformation($hiddenId);
   $resultOrder->execute();
   //var_dump($resultOrder);
   while ($row = $resultOrder->fetch(PDO::FETCH_ASSOC)){
$orderId=($row['o_id']);
$pizzatype=($row['o_pizzatype']);
$final_price=($row['o_finalprice']);
}


   $resultCustomer= getCustomerInformation($hiddenId);
   $resultCustomer->execute();
   while ($row = $resultCustomer->fetch(PDO::FETCH_ASSOC)){
$orderId=($row['o_id']);
$fname=($row['c_fname']);
$email=($row['c_email']);
}
    include 'email.php';
   
  
}
if($action=="Send Email Now"){
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
$smtp['password'] = 'MyPassword';
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


include 'emailsent.php';

}
 ?>


