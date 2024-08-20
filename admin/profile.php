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
        $aname = $_POST['adminname'];
        $mobno = $_POST['contactnumber'];

        $stmt = $con->prepare("UPDATE tbladmin SET AdminName=?, MobileNumber=? WHERE ID=?");
        $stmt->bind_param('ssi', $aname, $mobno, $adminid);
        $query = $stmt->execute();

        if ($query) {
            echo '<script>alert("Admin profile has been updated.")</script>';
        } else {
            echo '<script>alert("Something went wrong. Please try again.")</script>';
        }
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin profile management page for MK Happy Home.">
    <title>MK Happy Home | Admin Profile</title>

    <!-- Minified and Optimized CSS -->
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="images/logo.webp">
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
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Admin Details</h4>
                                    <form class="forms-sample" method="post">
                                        <?php
                                        $adminid = $_SESSION['aid'];
                                        $ret = mysqli_query($con, "SELECT * FROM tbladmin WHERE ID='$adminid'");
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <div class="form-group">
                                                <label for="adminname">Admin Name</label>
                                                <input type="text" class="form-control" name="adminname" id="adminname" value="<?php echo htmlspecialchars($row['AdminName']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="username">User Name</label>
                                                <input type="text" class="form-control" name="username" id="username" value="<?php echo htmlspecialchars($row['UserName']); ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="contactnumber">Contact Number</label>
                                                <input type="text" class="form-control" id="contactnumber" name="contactnumber"
                                                 value="<?php echo htmlspecialchars($row['MobileNumber']); ?>" required pattern="[0-9]{10}" maxlength="10">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['Email']); ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="registrationdate">Registration Date</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['AdminRegdate']); ?>" readonly>
                                            </div>
                                        <?php } ?>
                                        <button type="submit"  style="margin-left:80%"class="btn btn-primary" name="submit">Submit</button>
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
