
<!DOCTYPE html>
<html>
<head>
<title>Send Email</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
          <li><a href="../Process_Order">List Orders</a></li>
           <li class="selected"><a href="../Process_Order/email.php">Email</a>
         
         
       
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      
      <div id="content">
          <form method="post" action="index.php">
    <label for="email">Email ID:</label><br />
    <input id="emailid" name="emailid" type="text" size="30"  value="<?php if(isset($email)) echo "$email";?>"/><br />
   <!-- <label id="emailid"><?php echo "$email";?></label>-->
<label for="subject">Subject of email:</label><br />
<input id="subject" name="subject" type="text" size="30" value=<?php if(isset($fname)) echo "Pizza Order Confirmation"; ?>><br />
<label for="message">Body of email:</label><br />
<!-- &#10; - Line Feed and &#13; Carriage Return are HTML entities.
This way you are actually parsing the new line ("\n") rather than displaying it as text.-->
<textarea id="message" name="message"><?php if(isset($fname)){echo "Hello ".htmlspecialchars($fname).",";?> &#13;&#10; <?php echo "Thank You for ordering with PizzaYummy. Your Order is being Processed.";?>&#13;&#10; <?php echo " Thank You.";} ?>
</textarea><br />
<input type="submit" name="action" id="send" value="Send Email Now" />
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