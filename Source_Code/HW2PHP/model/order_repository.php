
<?php



function add_order($size, $pizza, $extra, $quantity,$final_price) {
    global $db;
    $query = "INSERT INTO orders
        (o_pizzasize, o_pizzatype, o_extracheese, o_quantity,o_finalprice)
        VALUES
        ('$size', '$pizza', '$extra', '$quantity','$final_price')";
    
    $db->exec($query);
    
    // to get last inserted ID from order table
   $id= $db->lastInsertId();
   print $id;
   return $id;
   
   
}
 

function add_customer($id,$fname,$lname,$address,$email,$phone,$payment,$type,$cardnumber,$random_number){
     global $db;
    $query1 = "INSERT INTO customer
        (o_id, c_fname, c_lname, c_address,c_email,c_phone,c_salestype,c_creditcardtype,c_creditcardno,c_randomnumber)
        VALUES
        ('$id', '$fname', '$lname', '$address','$email','$phone','$payment','$type','$cardnumber','$random_number')";
    
    $db->exec($query1);
  //  var_dump($query1);
}
function getAllOrders(){
    global $db;

 /*$result = $db->prepare("SELECT *
        FROM orders
        ORDER BY o_id");*/
 $result=$db->prepare("select o.o_id,o.o_finalprice,c.c_fname,c.c_lname,c.c_email,c.c_phone from orders o, customer c where c.o_id=o.o_id;");
 return $result;
      /*$result->execute();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $oid=$row["o_id"];
            $extra1=$row["o_extracheese"];
           echo "<br>Order id=$oid<br>Cheese: $extra1";
        }*/
}

function getOrderInformation($hiddenId){
    global $db;
    $result=$db->prepare("select * from orders where o_id=$hiddenId");
    return $result;
}
function getCustomerInformation($hiddenId){
    global $db;
    $result=$db->prepare("select * from customer where o_id=$hiddenId");
    return $result;
}
?>