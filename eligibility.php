<?php
include('includes/config.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn about the eligibility criteria and rules at MKHappyHome.">
    <meta name="keywords" content="MKHappyHome, Eligibility, Rules, Senior Care, Elderly Care">
    <title>Eligibility & Rules | MKHappyHome</title>
    
    <!-- Minified CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/component.min.css" type="text/css">
    <link rel="shortcut icon" href="images/2.webp">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">

    <!-- Deferred JavaScript -->
    <script src="js/jquery-1.8.3.min.js" defer></script>
    <script src="js/modernizr.custom.js" defer></script>

</head>
<body>
    <?php include_once('includes/header.php'); ?>

    <div class="letest-section">
        <div class="container">
            <?php
            $stmt = $con->prepare("SELECT PageDescription FROM tblpage WHERE PageType = ?");
            $pageType = 'Eligibilities and Rules';
            $stmt->bind_param('s', $pageType);
            $stmt->execute();
            $stmt->bind_result($pageDescription);

            while ($stmt->fetch()) {
				echo '<div>' . $pageDescription . '</div>';            }

            $stmt->close();
            ?>
        </div>
    </div>

    <?php include_once('includes/footer.php'); ?>
</body>
</html>
