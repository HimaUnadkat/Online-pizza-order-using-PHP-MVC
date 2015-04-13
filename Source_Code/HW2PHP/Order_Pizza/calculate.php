        <?php

function calculatePizzaPrice($size, $pizza, $extra, $quantity) {
    $extraCheese = checkExtraCheese($extra);
    "<br>Return Value=$extraCheese<br>";
    $return_pizzaCost = checkSizeOfPizza($size, $pizza);
      "pizza cost=$return_pizzaCost";
    "<br>pizza size=$size";
    "<br>pizza type=$pizza";
      "<br>Quantity=$quantity    ";
    $finalPrice = ($return_pizzaCost * $quantity) + ($quantity * $extraCheese);
    "<br><br>final Pizza price= $finalPrice";
    return $finalPrice;
}

function checkExtraCheese($extra) {
    if ($extra == 'yes') {
        $result = 2;
        return $result;
    } else {
        $result = 0;
        return $result;
    }
}

function checkSizeOfPizza($size, $pizza) {
    if ($size == 1) {
        $pizzacost = $pizza + 1;
        return $pizzacost;
    } else if ($size == 2) {
        $pizzacost = $pizza + 2;
        return $pizzacost;
    } else {
        $pizzacost = $pizza + 0;
        return $pizzacost;
    }
}

function checkEmail($email) {
    if (!ereg("^[a-z0-9_]+[a-z0-9_.]*@[a-z0-9_-]+[a-z0-9_.-]*\.[a-z]{2,5}$", $email)) {
        return FALSE;
    } else {
        return $email;
    }
}

function checkFirstName($fname) {
    if (strlen($fname) >= 1 && strlen($fname) <= 20) {

        return $fname;
    } else {
        return false;
    }
}

function checkLastName($lname) {
    if (strlen($lname) >= 1 && strlen($lname) <= 25) {

        return $lname;
    } else {
        return false;
    }
}

function checkPhone($phone) {
    if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
        return $phone;
    } else {
        return false;
    }
}
function checkCardNumber($cardnumber){
    //Prefix=34 or 37, Length=15 (Mod10) for american Express
    if(preg_match("/^(3[47][0-9]{13})*$/", $cardnumber)){
        return $cardnumber;
    }else{
        return false;
    }
}
function checkVisaCardNumber($cardnumber){
      
    if(preg_match("/^(4[0-9]{12}(?:[0-9]{3})?)*$/", $cardnumber)){
        return $cardnumber;
    }else{
        return false;
    }
}
function  gen_random_number($length=16)
{
    $chars ="1234567890";
    $final_rand='';
    for($i=0;$i<$length; $i++)
    {
        $final_rand .= $chars[ rand(0,strlen($chars)-1)];
 
    }
    return $final_rand;
}
?>