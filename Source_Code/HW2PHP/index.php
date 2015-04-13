
       
   <!DOCTYPE HTML>
<html>

<head>
  <title>Pizza</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href=" styles/Templatestyle.css" />
</head>

<body>
  <div id="main">
    <div id="header">
     <?php include 'includes/header.inc.php'; ?>
      <div id="menubar">
        <?php include 'includes/menu.inc.php'; ?>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <?php include 'includes/sidebar.inc.php'; ?>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Welcome to the Bay Area Pizza Company</h1>
        <p>
            FAST DELIVERY TO Bay Area,CA!

Bay Area Pizza Company is  not the largest nor the fastest but we do offer the freshest local ingredients and strive to produce the best product possible. </p>
        <p>Our dough is made fresh in-house every day and our pizza's are hand crafted and baked up piping hot in our authentic brick pizza oven. </p>
        <p>Come on in and see why smaller provides a fresher, more personal experience. Enjoy being part of our Italian family as soon as you walk through the door with our friendly staff and relaxing beach front location.</p>

        </p>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
    <?php include 'includes/footer.inc.php';?>
    
    </div>
  </div>
</body>
</html>
