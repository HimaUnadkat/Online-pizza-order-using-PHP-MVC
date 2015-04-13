<?php

?>
<html>
    <head>
  <title>Pizza</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href=" ../styles/Templatestyle.css" />
  
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
</head>
    <body>
<div id="main">
    <div id="header">
     <?php include '../includes/header.inc.php'; ?>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
           <li><a href="../index.php">Home</a></li>
           <li><a href="../Order_Pizza/order.php">Order Pizza</a></li>
           <li class="selected"><a href="">CheckOut</a></li>
          
       
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Useful Links</h3>
        <ul>
           <li class="selected"><a href="../index.php">Home</a></li>
           <li><a href="../Order_Pizza/order.php">Order Pizza</a></li>
          <li><a href="">Process Order</a></li>
          
        </ul>
      </div>
      <div id="content">
          <h3>Provide your contact detail</h3>
 <form method="post" action="index.php">
 <label>First name</label>
 <input type="text" name="fname" id="fname" value="<?php if(isset($fname)){echo $fname;}?>">
 <span class="error" >* <?php if (isset($fnameErr)) {
    echo $fnameErr;
} ?>   </span>


<label>Last name</label>
 <input type=text name=lname id="lname" value="<?php if(isset($lname)){echo $lname;}?>">
 <span class="error" >* <?php if (isset($lnameErr)) {
    echo $lnameErr;
} ?>   </span>
 
 <label>Address</label>
  <input type=text name=address value="<?php if(isset($address)){echo $address;}?>">
   <span class="error" >* <?php if (isset($addressErr)) {
    echo $addressErr;
} ?>   </span>
  
  <label>Email</label>
 <input type=text name=email value="<?php if(isset($email)){echo $email;}?>">
   <span class="error" >* <?php if (isset($emailErr)) {
    echo $emailErr;
} ?>   </span>
 
 <label>Telephone</label>
 <input type=text name=phone placeholder="format 888-888-8888"  value="<?php if(isset($phone)){echo $phone;}?>">
  <span class="error" >* <?php if (isset($phoneErr)) {
    echo $phoneErr;
} ?>   </span>

<label>Select Type</label>

<input type="radio" name="payment" id="cash" value="cash" <?php if(isset($_POST['payment']) && $_POST['payment'] == 'cash') echo ' checked="checked"'?> class="hide" >Cash 
<input type="radio" name="payment" id="credit" value="credit" <?php if (isset($_POST['payment']) && $_POST['payment'] == 'credit') echo ' checked="checked"'?>  class="show" >Credit
 <span class="error" >* <?php if (isset($paymentErr)) {
    echo $paymentErr;
} ?>   </span>

      <br><br>
     
      <div class="hidethis">
      <label>Credit card Type</label>
      
                  <input type="radio" name="type" value="ax"  <?php if(isset($_POST['type']) && $_POST['type'] == 'ax') echo ' checked="checked"'?> >American Express
                  &nbsp; &nbsp;
                  <input type="radio" name="type" value="v"  <?php if(isset($_POST['type']) && $_POST['type'] == 'v') echo ' checked="checked"'?>>Visa
                  <br><br>
                  <label>Card Number</label>
                   <span class="error" >* <?php if (isset($typeErr)) {
    echo $typeErr;
} ?>   </span>
                  
                  <input type="text" name="cardnumber" value="<?php if(isset($cardnumber)){echo $cardnumber;}?>">
               <span class="error" >* <?php if (isset($cardnumErr)) {
    echo $cardnumErr;
} ?>   </span>
                  <br>
                  <label>expiration date</label><br><select name='expireMM' id='expireMM'>
    <option value=''>Month</option>
    <option value='01'>Janaury</option>
    <option value='02'>February</option>
    <option value='03'>March</option>
    <option value='04'>April</option>
    <option value='05'>May</option>
    <option value='06'>June</option>
    <option value='07'>July</option>
    <option value='08'>August</option>
    <option value='09'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
</select> 
<select name='expireYY' id='expireYY'>
    <option value=''>Year</option>
    <option value='2014'>2014</option>
    <option value='2015'>2015</option>
    <option value='2016'>2016</option>
</select> 
                  <span class="error" >* <?php if (isset($monthErr)) {
    echo $monthErr;
} ?>   </span>
      </div>
                  <br><label><br>sales amount</label>
                 
                   <label  style="color: #ff3333">
   <?php if (isset($final_price)) {
    echo "<strong> $final_price</strong> ";
    } ?></label><br><br>
    
  <p>
      <input type=submit name=action value="Finaliza_Now" id="checkout">
      <input type=reset name=reset value="Reset" id="reset">
  </p>
  <input type="hidden" name="finalprice" value="<?php echo $final_price?>">
  <input type="hidden" name="size" value="<?php echo $size?>">
  <input type="hidden" name="pizza" value="<?php echo $pizza?>">
  <input type="hidden" name="extra" value="<?php echo $extra?>">
   <input type="hidden" name="quantity" value="<?php echo $quantity?>">
 
  </form>
    </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
    <?php include '../includes/footer.inc.php';?>
    
    </div>
  </div>
</body>
</html>
