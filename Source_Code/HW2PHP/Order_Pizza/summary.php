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
            <li><a href="../Order_Pizza/order.php">Order Pizza</a></li>
          <li class="selected"><a href="">Thank You</a></li>
         
       
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

<?php



echo "Thank You $fname for ordering with PizzaYummy<br>";
echo "Your Unique Order id is:"; ?> <label  style="color: #ff3333"><?php echo "$random_number<br>"; ?> </label>
<?php echo "<br>You will soon receive a confirmation Email from US.";

?>
 </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
    <?php include '../includes/footer.inc.php';?>
     </div>
  </div>
</body>
</html>