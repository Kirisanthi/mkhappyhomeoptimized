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
    <meta name="description" content="Learn more about our senior citizens at MK Happy Home. Get detailed information including contact and emergency details.">
    <meta name="keywords" content="MK Happy Home, Senior Citizens, Profile, Contact Information, Emergency Contact">
    <title>Senior Citizen Profile | MK Happy Home</title>
    
    <!-- Minified CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/component.min.css" type="text/css">
    <link rel="shortcut icon" href="images/2.webp">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Niconne" rel="stylesheet" type="text/css">

    <!-- Deferred JavaScript -->
    <script src="js/jquery-1.8.3.min.js" defer></script>
    <script src="js/modernizr.custom.js" defer></script>
    <script src="js/move-top.js" defer></script>
    <script src="js/easing.js" defer></script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.scroll').forEach(function(element) {
                element.addEventListener('click', function(event) {
                    event.preventDefault();
                    document.querySelector(this.hash).scrollIntoView({ behavior: 'smooth' });
                });
            });
        });
    </script>
</head>
<body>

<?php include_once('includes/header.php'); ?>

<!-- Content -->
<section class="content">
    <div class="blog">
        <div class="container">
            <?php
            $id = intval($_GET['id']);
            $stmt = $con->prepare("SELECT * FROM tblseniorcitizen WHERE ID = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
            ?>
            <article class="blog-top">
                <h3><?php echo htmlentities($row['Name']); ?></h3>
            </article>
            <div class="blog-bottom">
                <div class="single-top">
                    <div class="left-blog">
                        <img class="img-responsive" src="admin/images/<?php echo htmlentities($row['ProfilePic']); ?>" width="300" height="300" alt="<?php echo htmlentities($row['Name']); ?> Profile Picture">
                    </div>
                    <div class="top-blog">
                        <h3>Date of Registration: <?php echo htmlentities($row['RegitrationDate']); ?></h3>
                        <ul class="men-grid">
                            <li><strong>Added By: </strong><?php echo htmlentities($row['AddedBy']); ?></li><br>
                            <li><strong>Registration Number: </strong><?php echo htmlentities($row['RegistrationNumber']); ?></li>
                        </ul>
                        <p><strong>Date of Birth:</strong> <?php echo htmlentities($row['DateofBirth']); ?></p>
                        <p><strong>Contact Number: </strong> <?php echo htmlentities($row['ContactNumber']); ?></p>
                        <p><strong>Communication Address: </strong> <?php echo htmlentities($row['CommunicationAddress']); ?></p>
                        <p><strong>Emergency Address: </strong> <?php echo htmlentities($row['EmergencyAddress']); ?></p>
                        <p><strong>Emergency Contact Number: </strong> <?php echo htmlentities($row['EmergencyContactnumber']); ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include_once('includes/footer.php'); ?>
</body>
</html>



