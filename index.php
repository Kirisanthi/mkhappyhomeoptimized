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
    <meta name="description" content="Welcome to MK Happy Home. Providing Quality Elder 
	Care Services to Ensure a Happy and Healthy Life for Your Loved Ones.">
    <meta name="keywords" content="Elder Care, Happy Home, Elderly Services">
    <title>MKHappyHome || Home Page</title>
    
    <!-- CSS Files -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
    
    <!-- Web Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:
	100,300,400,700,900,300italic,400italic,700italic|Niconne">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/1.jpg">
    
    <!-- JavaScript Files -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script defer src="js/scripts.min.js"></script>
</head>

<body>
    <?php include_once('includes/header.php'); ?>

    <div class="banner-section">
        <div class="container">
            <div class="banner-head text-center">
                <h1>Welcome to MK Happy Home</h1>
                <p>Where Care Meets Compassion. Providing Quality Elder Care Services to Ensure a Happy and Healthy Life for Your Loved Ones.</p>
            </div>
        </div>
    </div>

    <section class="welcome-section">
        <div class="container border border-success p-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-success">About Us</h3>
                    <img src="images/h4.webp" alt="Caring services at MK Happy Home" class="img-fluid">
                </div>
                <div class="col-md-6">
				<?php

					$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
					$cnt=1;
					while ($row=mysqli_fetch_array($ret)) {
						?>
					<p><?php  echo $row['PageDescription'];?>.</p><?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="letest-section">
        <div class="container">
		<?php
					$ret=mysqli_query($con,"select * from tblpage where PageType='Eligibilities and Rules' ");
					$cnt=1;
					while ($row=mysqli_fetch_array($ret)) {

					?>
	 				<h3><?php  echo $row['PageTitle'];?></h3>
	 				<p><?php  echo $row['PageDescription'];?>.</p><?php } ?>
        </div>
    </section>

    <section class="gallery-section">
        <div class="container">
            <h3>Gallery</h3>
            <div class="row">
                <div class="col-md-4">
                    <img src="images/h2.webp" alt="Gallery Image 1" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="images/h3.webp" alt="Gallery Image 2" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="images/h4.webp" alt="Gallery Image 3" class="img-fluid">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <img src="images/h4.webp" alt="Gallery Image 4" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="images/h6.webp" alt="Gallery Image 5" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="images/H1.webp" alt="Gallery Image 6" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="services-section">
        <div class="container">
            <h3 class="text-success">Our Main Services</h3>
            <div class="row">
                <?php
                $query = mysqli_query($con, "SELECT * FROM tblservices");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-md-3 mb-3">
                        <div class="border border-success p-3">
						<h4 style="color: #2D6D4E"><?php echo htmlentities($row['ServiceTitle']);?></h4>
						<p><?php echo $row['ServiceDescription'];?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>

    <!-- Scroll to Top -->
    <a href="#home" id="toTop" class="scroll"> <span id="toTopHover"></span></a>
</body>

</html>
