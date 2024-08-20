<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Validating Session
if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
    exit;
} else {
    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['aid'];
        $cpassword = md5($_POST['currentpassword']);
        $newpassword = md5($_POST['newpassword']);

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("SELECT ID FROM tbladmin WHERE ID=? AND Password=?");
        $stmt->bind_param("is", $adminid, $cpassword);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $update_stmt = $con->prepare("UPDATE tbladmin SET Password=? WHERE ID=?");
            $update_stmt->bind_param("si", $newpassword, $adminid);
            $update_stmt->execute();

            echo '<script>alert("Your password has been successfully changed.")</script>';
        } else {
            echo '<script>alert("Your current password is incorrect.")</script>';
        }
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin password management page for MK Happy Home.">
    <title>MK Happy Home | Change Password</title>

    <!-- Minified and Optimized CSS -->
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="images/logo.webp">

    <!-- External JS -->
    <script src="js/validation.js" defer></script>
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
     
    <?php include_once('includes/sidebar.php');?>

            <!-- Main Panel -->
            <main class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="color:#2D6D4E">Change Password</h4>
                                    <form class="forms-sample" method="post" name="changepassword" onsubmit="return checkPass();">
                                        <div class="form-group">
                                            <label for="currentpassword">Current Password</label>
                                            <input type="password" class="form-control" name="currentpassword" id="currentpassword" required aria-label="Enter your current password">
                                        </div>
                                        <div class="form-group">
                                            <label for="newpassword">New Password</label>
                                            <input type="password" class="form-control" name="newpassword" id="newpassword" required aria-label="Enter your new password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmpassword">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required aria-label="Confirm your new password">
                                        </div>
                                        <button type="submit" style="margin-left:80%"  class="btn btn-primary mr-2" name="submit">Submit</button>
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

    <!-- Minified JS -->
    <script src="vendors/js/vendor.bundle.base.js" async></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js" async></script>
    <script src="vendors/select2/select2.min.js" async></script>
    <script src="js/off-canvas.js" async></script>
    <script src="js/hoverable-collapse.js" async></script>
    <script src="js/template.js" async></script>
    <script src="js/settings.js" async></script>
    <script src="js/todolist.js" async></script>
    <script src="js/file-upload.js" async></script>
    <script src="js/typeahead.js" async></script>
    <script src="js/select2.js" async></script>
</body>

</html>
<?php } ?>
