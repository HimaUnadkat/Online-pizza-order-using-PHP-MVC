<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET['final_price'])) {
    $final_price = $_GET['final_price'];
}
if (isset($_GET['quantity'])) {
    $quantity = $_GET['quantity'];
}
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
          <li ><a href="../index.php">Home</a></li>
          <li class="selected"><a href="">Order Pizza</a></li>
          <li><a href="../Process_Order">Process Order</a></li>
       
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
             <li><a href="">Order Pizza</a></li>
          <li><a href="../Process_Order">Process Order</a></li>
          
        </ul>
      </div>
      <div id="content">
          <h3>Order Your Pizza</h3>
<form action="index.php" method="post"  id="order_form" name="order_form">
    <label>Size of Pizza:</label>
    <select name="size">
        <option value="">Select Size</option>
        <option value="0">Small</option>
        <option value="1">Medium</option>
        <option value="2">Large</option>

    </select>
   <span class="error" >* <?php if (isset($_GET['sizeErr'])) {
    $sizeErr = $_GET['sizeErr'];
    echo $sizeErr;
} ?>   </span>


    <br><br><br>
    <label>Kind of Pizza:</label>   
    <select name="pizza" size="3">

        <option value="8.99">Pepperoni</option>
        <option value="9.99">Vegetarian</option>
        <option value="10.99">Combo</option>

    </select>
    <span class="error" >* <?php if (isset($_GET['pizzatype'])) {
    $pizzatype = $_GET['pizzatype'];
    echo $pizzatype;
} ?>   </span>
    <br><br>
    <label>Extra Cheese:</label>
    <input type="checkbox" name="extra" value="yes">Yes<br><br>
    <label>Quantity:</label> <input type="text" name="quantity" value="<?php if (isset($quantity)) {
    echo $quantity;
} ?>">
    <span class="error" >* <?php if (isset($_GET['quantityErr'])) {
    $quantityErr = $_GET['quantityErr'];
    echo $quantityErr;
    } ?></span><br><br>
    <label>Cost of selected Pizza:</label>
    <label  style="color: #ff3333">
   <?php if (isset($final_price)) {
    echo "<strong> $final_price</strong> ";
    } ?></label>
    <br>
    <table>
        <tr><td>
                <input type="submit" value="Calculate" name="action" id="calculate"></td>
            <td><input type="submit" value="Finalize" name="action" id="finalize"></td></tr>
    </table>
    
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