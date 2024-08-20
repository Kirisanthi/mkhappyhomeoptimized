<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
    exit;
} else {
    if (isset($_POST['submit'])) {
        $namesc = $_POST['namesc'];
        $dob = $_POST['dob'];
        $contnum = $_POST['contnum'];
        $commadd = $_POST['commadd'];
        $emeradd = $_POST['emeradd'];
        $emercontnum = $_POST['emercontnum'];
        $addedby = 'admin';
        $regnum = mt_rand(100000000, 999999999);
        $propic = $_FILES["propic"]["name"];
        $extension = strtolower(pathinfo($propic, PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg / png / gif format allowed.');</script>";
        } else {
            $propic = md5($propic) . time() . '.' . $extension;
            move_uploaded_file($_FILES["propic"]["tmp_name"], "images/" . $propic);

            $stmt = $con->prepare("INSERT INTO tblseniorcitizen (RegistrationNumber, Name, DateofBirth, ContactNumber, CommunicationAddress, ProfilePic, EmergencyAddress, EmergencyContactnumber, AddedBy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('issssssss', $regnum, $namesc, $dob, $contnum, $commadd, $propic, $emeradd, $emercontnum, $addedby);
            $stmt->execute();

            echo "<script>alert('Senior citizen details added successfully.');</script>";
            echo "<script>window.location.href='add-scdetails.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Add senior citizen details for MK Happy Home. Register senior citizens with necessary details including contact and emergency information.">
    <meta name="keywords" content="MK Happy Home, Senior Citizen, Registration, Elder Care">
    <title>MK Happy Home | Add Senior Citizen</title>

    <!-- Minified and Optimized CSS -->
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="images/logo.webp">

    <!-- External Script -->
    <script src="js/nicEdit.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        });
    </script>
</head>

<body>
    <div class="container-scroller">
        <!-- Header -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="typcn typcn-th-menu"></span>
            </button>
            </div>
        </div>
        <?php include_once('includes/header.php');?>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <?php include_once('includes/sidebar.php'); ?>

            <!-- Main Panel -->
            <main class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-success">Add Senior Citizen</h4>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="namesc" aria-label="Name of Senior Citizen">Name of Senior Citizen</label>
                                            <input id="namesc" name="namesc" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="dob" aria-label="Date of Birth">Date of Birth</label>
                                            <input id="dob" name="dob" type="date" class="form-control" required max="1970-01-01">
                                        </div>
                                        <div class="form-group">
                                            <label for="contnum" aria-label="Contact Number">Contact Number</label>
                                            <input id="contnum" name="contnum" type="text" pattern="[0-9]+" maxlength="10" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="commadd" aria-label="Communication Address">Communication Address</label>
                                            <textarea class="form-control" id="commadd" name="commadd" rows="5" aria-required="true"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="propic" aria-label="Profile Picture">Profile Picture</label>
                                            <input id="propic" name="propic" type="file" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="emeradd" aria-label="Emergency Address">Emergency Address</label>
                                            <textarea class="form-control" id="emeradd" name="emeradd" rows="5" aria-required="true"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="emercontnum" aria-label="Emergency Contact Number">Emergency Contact Number</label>
                                            <input id="emercontnum" name="emercontnum" pattern="[0-9]+" maxlength="10" type="text" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2" style="float:right" name="submit" aria-label="Submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- Footer -->
                <?php include_once('includes/footer.php'); ?>
            </main>
        </div>
    </div>

    <!-- Minified and Optimized JS -->
    <script src="vendors/js/vendor.bundle.base.js" async></script>
    <script src="js/off-canvas.js" async></script>
    <script src="js/hoverable-collapse.js" async></script>
    <script src="js/template.js" async></script>
    <script src="js/settings.js" async></script>
    <script src="js/todolist.js" async></script>
</body>

</html>
