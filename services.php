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
    <meta name="description" content="MK Happy Home offers a wide range of services designed to meet the physical, emotional, and social needs of residents.">
    <title>MK Happy Home || Services</title>

    <!-- Combined and Minified CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <!-- Preload Important Resources -->
    <link rel="preload" href="css/style.min.css" as="style">
    <link rel="preload" href="js/jquery-1.8.3.min.js" as="script">
    
    <!-- Defer/Async Loading of JavaScript -->
    <script src="js/jquery-1.8.3.min.js" defer></script>
    <script src="js/modernizr.custom.js" defer></script>
    <script src="js/move-top.js" defer></script>
    <script src="js/easing.js" defer></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/2.webp">
    
    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic|Niconne" rel="stylesheet" type="text/css">

</head>
<body>
    <?php include_once('includes/header.php');?>    

    <!-- Content Section -->
    <div class="content">
        <div class="blog">
            <div class="container">    
                <div class="blog-top">        
                    <h3>Services</h3>
                    <h5>MKHappyHome provides a wide range of services designed to meet the physical, emotional, and social needs of our residents. Common services include:</h5>
                </div>

                <?php
                $query = mysqli_query($con, "SELECT * FROM tblservices");
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                <div class="col-md-12" style="margin-top:1%">
                    <div>
                        <h4><?php echo htmlentities($row['ServiceTitle']);?></h4>
						<p><?php echo $row['ServiceDescription'];?></p>
						</div>
                </div>
                <?php 
                    } 
                } 
                ?>
            </div>    
        </div>    
    </div>
    
    <?php include_once('includes/footer.php');?>
</body>
</html>



