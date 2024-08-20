<?php
include('includes/config.php');
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Prepared statement to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO tblcontact (FirstName, LastName, Phone, Email, Message)
	 VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $fname, $lname, $phone, $email, $message);
    
    if ($stmt->execute()) {
        echo "<script>alert('Your message was sent successfully!');</script>";
        echo "<script>window.location.href ='contact.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.");</script>';
    }

    $stmt->close();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact MKHappyHome to learn more about our services or to get in touch. We're here to help!">
    <meta name="keywords" content="Contact MKHappyHome, MKHappyHome Contact, Elder Care, Senior Living">
    <title>Contact MKHappyHome | Get in Touch with Us</title>
    
    <!-- Minified CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    <!-- Web Fonts -->
    <link rel="shortcut icon" href="images/2.webp">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic|Niconne" rel="stylesheet" type="text/css">

    <!-- Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "MKHappyHome",
        "url": "https://www.mkhappyhome.com",
        "logo": "https://www.mkhappyhome.com/images/logo.webp",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+1-555-555-5555",
            "contactType": "Customer Service"
        },
        "sameAs": [
            "https://www.facebook.com/mkhappyhome",
            "https://www.twitter.com/mkhappyhome",
            "https://www.linkedin.com/company/mkhappyhome"
        ]
    }
    </script>
</head>
<body>
<!-- Header -->
<?php include_once('includes/header.php'); ?>

<!-- Main Content -->
<div class="contact_desc">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Fill the Form to Get in Touch</h3>
                <div class="contact-form">
                    <form method="post">
                        <div class="col-md-6">
                            <label for="fname">First Name</label>
                            <input required name="fname" type="text" id="fname" class="textbox" pattern="[A-Za-z\s]+" 
							title="Only letters and spaces allowed">
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Last Name</label>
                            <input required name="lname" type="text" id="lname" class="textbox" pattern="[A-Za-z\s]+"
							 title="Only letters and spaces allowed">
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Contact Number</label>
                            <input required name="phone" pattern="[0-9]{10}" maxlength="10" type="text" id="phone" class="textbox" title="10 digit phone number">
                        </div>
                        <div class="col-md-6">
                            <label for="email">E-MAIL</label>
                            <input required name="email" type="text" id="email" class="textbox">
                        </div>
                        <div class="col-md-12">					    	
                            <label for="message">Message</label>
                            <textarea required name="message" id="message" class="textbox"></textarea>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" value="Submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="company_address">
                    <?php
                    $ret = $con->prepare("SELECT * FROM tblpage WHERE PageType = 'contactus'");
                    $ret->execute();
                    $result = $ret->get_result();
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <h3>Contact Details</h3>
                    <p>Address: <?php echo htmlspecialchars($row['PageDescription']); ?></p>
                    <p>Phone: <?php echo htmlspecialchars($row['MobileNumber']); ?></p>
                    <p>Timing: <?php echo htmlspecialchars($row['Timing']); ?></p>
                    <p>Email: <a href="mailto:<?php echo htmlspecialchars($row['Email']); ?>"><?php echo htmlspecialchars($row['Email']); ?></a></p>
                    <?php } ?>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2480.24367395998!2d-0.37909728852553815!3d51.563766306467414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876132cdb24b3cf%3A0x46dc2b9f8b8d6085!2s35%20Leamington%20Cres%2C%20Harrow%20HA2%209HH!5e0!3m2!1sen!2suk!4v1722097423961!5m2!1sen!2suk" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>	
        </div>
    </div>
</div>

<!-- Footer -->
<?php include_once('includes/footer.php'); ?>
</body>
</html>






