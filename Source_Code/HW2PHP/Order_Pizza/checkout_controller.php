<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "calculate.php";
require('../model/db_connect.php');

if (empty($_POST["email"])) {
    $emailErr = "Required";
   // $valid = true;
} else {
   $email = $_POST['email'];
   $email= checkEmail($email);
   if($email==true){
    //   echo $email;
    //   $email= checkEmail($email);
     //  $valid = false;
   }
    else{
      $emailErr= "$email is Invalid email address";
      }
}

if(empty ($_POST['fname'])){
    $fnameErr="Required";
   // $valid=true;
}else{
    $fname=$_POST['fname'];
    $fname=checkFirstName($fname);
    if($fname!=false){
       // echo $fname;
     //   $valid=false;
        
    }else{
       echo $fnameErr="First Name must be between 1 and 20";
      // $valid=true;
    }
  
}

if(empty ($_POST['lname'])){
    $lnameErr="Required";
   // $valid=true;
}else{
    $lname=$_POST['lname'];
    $lname=  checkLastName($lname);
    if($lname!=false){
     //   echo $lname;
      //  $valid=false;
        
    }else{
       echo $lnameErr= "Last Name must be between 1 to 25";
      // $valid=TRUE;
    }
}
if(empty ($_POST['address'])){
    $addressErr="Required";
  //  $valid=true;
}else{
    $address=$_POST['address'];
  
}

    if(empty ($_POST['phone'])){
    $phoneErr="Required";
  //  $valid=true;
}else{
    $phone=$_POST['phone'];
    $phone= checkPhone($phone);
    if($phone!=false){
    //    echo $phone;
     //   $valid=FALSE;
    }else{
       echo $phoneErr= "Invalid Phone number";
      // $valid=true;
    }
}
if(empty($_POST['payment'])){
    $paymentErr="Please select the Payment Method";
}else{
$payment=$_POST['payment'];
if($payment=="credit"){
            if(empty($_POST['type'])){
                $typeErr="Please select the type of credit";
            }else{
            $type=$_POST['type'];
           // echo "TYPE=$type";
            if($type=="ax"){   //american Express
                if(empty($_POST['cardnumber'])){
                    $cardnumErr="Required";
                 //   $valid=true;
                }else{
                $cardnumber=$_POST['cardnumber'];
                $cardnumber=checkCardNumber($cardnumber);
                if($cardnumber!=FALSE){
                  //  echo $cardnumber;
                 //   $valid=FALSE;
                }else{
                    echo $cardnumErr="Invalid Americal Express Card Number";
                  //  $valid=true;
                }
                }
                if($_POST['expireMM'] =="Month" || $_POST['expireYY']=="Year"){
                    $monthyearErr="Required";
                }
                else{
                $expireMM=$_POST['expireMM'];
                $expireYY=$_POST['expireYY'];
                $currentMonth= date("m");
                $currentYear=date("Y");
                if($expireMM<$currentMonth){
                    $monthErr= "Invalid Expiry Date";
                  //  $valid=true;
                }
                }
            }
            if($type=="v"){
                  if(empty($_POST['cardnumber'])){
                    $cardnumErr="Required";
                   // $valid=true;
                }else{
                $cardnumber=$_POST['cardnumber'];
                $cardnumber=checkVisaCardNumber($cardnumber);
                if($cardnumber!=false){
                  //  echo $cardnumber;
                  //  $valid=FALSE;
                }else{
                    echo $cardnumErr="Invalid Visa Card Number";
                  //  $valid=true;
                }
                }
                 $expireMM=$_POST['expireMM'];
                $expireYY=$_POST['expireYY'];
                $currentMonth= date("m");
                $currentYear=date("Y");
                if($expireMM<$currentMonth){
                    $monthErr= "Invalid Expiry Date";
                   // $valid=true;
                }
            }
            }
}
}
include 'checkout.php';
?>