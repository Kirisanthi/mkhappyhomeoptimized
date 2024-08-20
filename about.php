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
    <meta name="description" content="Welcome to MKHappyHome, where compassion meets care. Our mission is to provide a safe, nurturing, 
    and comfortable environment for seniors to thrive.">
    <meta name="keywords" content="Elder Care, Senior Living, Compassionate Care, MKHappyHome">
    <title>MKHappyHome || About Us Page</title>
    
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

    <link rel="shortcut icon" href="images/2.webp">
</head>
<body>
    <?php include_once('includes/header.php'); ?>
    <div class="About-section">
        <div class="container">
            <h1 style="color:#2D6D4E">About Us</h1>
            <p>Welcome to MKHappyHome, where compassion meets care. Our mission is to provide a safe, nurturing, and comfortable environment for seniors to thrive. Located in the heart of [City/Region], we are dedicated to enhancing the quality of life for our residents through personalized care and attention.</p>
            
            <h2 style="color:#2D6D4E">Our Mission</h2>
            <p>At MKHappyHome, our mission is to offer a home-like atmosphere where seniors can live with dignity, respect, and independence. We strive to meet the physical, emotional, and social needs of our residents, ensuring they feel valued and cherished every day.</p>
            
            <h2 style="color:#2D6D4E">Our Vision</h2>
            <p>We envision a community where seniors feel empowered and supported, living their golden years with joy and fulfillment. Our goal is to be the leading elder care home, recognized for our commitment to excellence and the well-being of our residents.</p>
            
            <h2 style="color:#2D6D4E">Our Values</h2>
            <ul>
                <li>Compassion: We treat each resident with kindness, understanding, and empathy.</li>
                <li>Respect: We honor the individuality and preferences of our residents, respecting their life experiences and choices.</li>
                <li>Excellence: We are committed to providing the highest standard of care, continuously improving our services to better serve our residents.</li>
                <li>Community: We foster a sense of belonging and community, encouraging social interactions and meaningful relationships among residents and staff.</li>
            </ul>  
        </div>
    </div>
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
