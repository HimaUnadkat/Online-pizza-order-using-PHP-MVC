<?php

require "calculate.php";
require('../model/db_connect.php');
require('../model/order_repository.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'Order_Pizza';
}

if (empty($_POST["quantity"])) {
    $quantityErr = "Required";
    $valid = true;
} else {
    $quantity = $_POST['quantity'];
    $valid = false;
}

if (isset($_POST['pizza'])) {
    $pizza = $_POST['pizza'];
} else {
    $pizzatype = "Required";
    $valid = true;
}
if (isset($_POST['extra'])) {
    $extra = $_POST['extra'];
} else {
    $extra = 'no';
}
if (isset($_POST['size']) && $_POST['size'] != "") {
    $size = $_POST['size'];
} else {
    $valid = true;
    $sizeErr = "Required";
}

//echo "Quantity=$quantity<br>Pizza=$pizza<br>Size=$size<br>Extra=$extra";

if ($action == "Calculate") {

    $final_price = calculatePizzaPrice($size, $pizza, $extra, $quantity);
    if ($valid == "true") {
        header("Location:order.php?quantityErr=$quantityErr&pizzatype=$pizzatype&sizeErr=$sizeErr");
    } else {
        //header("Location:order.php?final_price=$final_price&quantity=$quantity");
        include 'order.php';
    }
} else if ($action == "Finalize") {

    if ($valid == "true") {
        header("Location:order.php?quantityErr=$quantityErr&pizzatype=$pizzatype&sizeErr=$sizeErr");
    } else {
        $final_price = calculatePizzaPrice($size, $pizza, $extra, $quantity);
        //add_order($size, $pizza, $extra, $quantity,$final_price);
        include 'checkout.php';
    }
}















if ($action == "Finaliza_Now") { //checkout action
    $final_price = calculatePizzaPrice($size, $pizza, $extra, $quantity);
    echo "Actino=$action";
    if (empty($_POST["email"])) {
        $emailErr = "Required";
         $valid = true;
    } else {
        $email = $_POST['email'];
        $email = checkEmail($email);
        if ($email == true) {
            //   echo $email;
            //   $email= checkEmail($email);
            //  $valid = false;
        } else {
            $emailErr = "$email is Invalid email address";
            $valid=true;
        }
    }

    if (empty($_POST['fname'])) {
        $fnameErr = "Required";
        $valid=true;
    } else {
        $fname = $_POST['fname'];
        $fname = checkFirstName($fname);
        if ($fname != false) {
            // echo $fname;
            //   $valid=false;
        } else {
            echo $fnameErr = "First Name must be between 1 and 20";
             $valid=true;
        }
    }

    if (empty($_POST['lname'])) {
        $lnameErr = "Required";
        $valid=true;
    } else {
        $lname = $_POST['lname'];
        $lname = checkLastName($lname);
        if ($lname != false) {
            //   echo $lname;
            //  $valid=false;
        } else {
            echo $lnameErr = "Last Name must be between 1 to 25";
            $valid=TRUE;
        }
    }
    if (empty($_POST['address'])) {
        $addressErr = "Required";
          $valid=true;
    } else {
        $address = $_POST['address'];
    }

    if (empty($_POST['phone'])) {
        $phoneErr = "Required";
         $valid=true;
    } else {
        $phone = $_POST['phone'];
        $phone = checkPhone($phone);
        if ($phone != false) {
            //    echo $phone;
            //   $valid=FALSE;
        } else {
            echo $phoneErr = "Invalid Phone number";
             $valid=true;
        }
    }
    if (empty($_POST['payment'])) {
        $paymentErr = "Please select the Payment Method";
    } else {
        $payment = $_POST['payment'];
        if ($payment == "credit") {
            if (empty($_POST['type'])) {
                $typeErr = "Please select the type of credit";
                $valid=true;
            } else {
                $type = $_POST['type'];
                // echo "TYPE=$type";
                if ($type == "ax") {   //american Express
                    if (empty($_POST['cardnumber'])) {
                        $cardnumErr = "Required";
                          $valid=true;
                    } else {
                        $cardnumber = $_POST['cardnumber'];
                        $cardnumber = checkCardNumber($cardnumber);
                        if ($cardnumber != FALSE) {
                            //  echo $cardnumber;
                            //   $valid=FALSE;
                        } else {
                            echo $cardnumErr = "Invalid Americal Express Card Number";
                             $valid=true;
                        }
                    }
                    /*if ($_POST['expireMM'] == "Month" || $_POST['expireYY'] == "Year") {
                        $monthyearErr = "Required";
                        $valid=true;
                    } else {
                        $expireMM = $_POST['expireMM'];
                        $expireYY = $_POST['expireYY'];
                        $currentMonth = date("m");
                        $currentYear = date("Y");


                        $input_time = mktime(0, 0, 0, $_POST['expireMM'] + 1, 0, $_POST['expireYY']);

                        if ($input_time < time()) {
                            $monthErr = "Date has elapsed";
                            $valid=true;
                        }
                    }*/
                }
                if ($type == "v") {
                    if (empty($_POST['cardnumber'])) {
                        $cardnumErr = "Required";
                        $valid=true;
                    } else {
                        $cardnumber = $_POST['cardnumber'];
                        $cardnumber = checkVisaCardNumber($cardnumber);
                        if ($cardnumber != false) {
                            //  echo $cardnumber;
                            //  $valid=FALSE;
                        } else {
                            echo $cardnumErr = "Invalid Visa Card Number";
                             $valid=true;
                        }
                    }
                  /*  $expireMM = $_POST['expireMM'];
                    $expireYY = $_POST['expireYY'];
                    $currentMonth = date("m");
                    $currentYear = date("Y");
                    if ($expireMM < $currentMonth) {
                        $monthErr = "Invalid Expiry Date";
                         $valid=true;
                    }*/
                }
            }
            if ($_POST['expireMM'] == "Month" || $_POST['expireYY'] == "Year") {
                        $monthyearErr = "Required";
                        $valid=true;
                    } else {
                        $expireMM = $_POST['expireMM'];
                        $expireYY = $_POST['expireYY'];
                        $currentMonth = date("m");
                        $currentYear = date("Y");


                        $input_time = mktime(0, 0, 0, $_POST['expireMM'] + 1, 0, $_POST['expireYY']);

                        if ($input_time < time()) {
                            $monthErr = "Date has elapsed";
                            $valid=true;
                        }
                    }
        }
    }
    if($valid=="true"){
    include 'checkout.php';
    }else{

    $id=add_order($size, $pizza, $extra, $quantity, $final_price);
  //  echo "<br>last inserted id in order table is :$id<br>";
    $random_number=gen_random_number(8); //generates a number with length 8
   add_customer($id,$fname,$lname,$address,$email,$phone,$payment,$type,$cardnumber,$random_number); 
   
    
       include 'summary.php';
}}
?>