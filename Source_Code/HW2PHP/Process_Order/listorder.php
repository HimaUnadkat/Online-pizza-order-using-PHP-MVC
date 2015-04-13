<!DOCTYPE html>
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
          <li class="selected"><a href="../Process_Order/">List Orders</a></li>
          <li><a href="../Process_Order/email.php">Email</a></li>
         
       
        </ul>
      </div>
            </div>
            <div id="content_header"></div>
            <div id="site_content">

                <div id="content">

                    <table>
                      
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Final Price</th>
                                <th class="row-1 row-name">Send Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['o_id']) ?></td>
                                    <td ><?php echo htmlspecialchars($row['c_fname']); ?>
                                        <?php echo htmlspecialchars($row['c_lname']); ?></td>
                                    <td><?php echo htmlspecialchars($row['c_email']); ?></td>

                                    <td><?php echo htmlspecialchars($row['o_finalprice']) . "$"; ?></td>
                                    <td> <form action="index.php" method="post">
                                            <input type="hidden" name="hiddenorderid"  value = "<?php echo $row['o_id']; ?>">
                                            <input type="submit" name="action" value="send Email" id="sendEmail"></form></td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                <?php include '../includes/footer.inc.php'; ?>
            </div>
        </div>
    </body>
</html>