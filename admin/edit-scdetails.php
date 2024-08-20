<?php 
session_start();
error_reporting(0);
include_once('includes/config.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $namesc = $_POST['namesc'];
        $dob = $_POST['dob'];
        $contnum = $_POST['contnum'];
        $commadd = $_POST['commadd'];
        $emeradd = $_POST['emeradd'];
        $emercontnum = $_POST['emercontnum'];
        $id = intval($_GET['id']);

        // Using prepared statements to prevent SQL injection
        $stmt = $con->prepare("UPDATE tblseniorcitizen SET Name=?, DateofBirth=?, ContactNumber=?, CommunicationAddress=?, EmergencyAddress=?, EmergencyContactnumber=? WHERE ID=?");
        $stmt->bind_param("ssssssi", $namesc, $dob, $contnum, $commadd, $emeradd, $emercontnum, $id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Senior citizen detail has been updated successfully');</script>";
            echo "<script>window.location.href='manage-scdetails.php'</script>";
        } else {
            echo "<script>alert('Failed to update details. Please try again.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Update senior citizen details at MK Happy Home. Ensure the information is accurate and up-to-date.">
    <meta name="keywords" content="MK Happy Home, Senior Citizen, Update Details, Elder Care">
    <title>MK Happy Home | Update Senior Citizen Details</title>
    
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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="color:#2D6D4E">Update Senior Citizen Details</h4>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <?php
                    $id = intval($_GET['id']);
                    $stmt = $con->prepare("SELECT * FROM tblseniorcitizen WHERE ID = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    if ($row) {
                    ?>
                    <div class="form-group">
                       <label for="namesc">Name of Senior Citizen</label>
                       <input id="namesc" name="namesc" type="text" class="form-control" required value="<?php echo htmlentities($row['Name']); ?>">
                    </div>
                    <div class="form-group">
                      <label for="dob">Date of Birth</label>
                      <input id="dob" name="dob" type="date" class="form-control" required value="<?php echo htmlentities($row['DateofBirth']); ?>">
                    </div>
                    <div class="form-group">
                      <label for="contnum">Contact Number</label>
                      <input id="contnum" name="contnum" type="text" pattern="[0-9]+" maxlength="10" class="form-control" required value="<?php echo htmlentities($row['ContactNumber']); ?>">
                    </div>
                    <div class="form-group">
                      <label for="commadd">Communication Address</label>
                      <textarea class="form-control" id="commadd" name="commadd" rows="5" required><?php echo htmlentities($row['CommunicationAddress']); ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="propic">Profile Pic</label>
                      <div>
                        <img src="images/<?php echo htmlentities($row['ProfilePic']); ?>" alt="Profile Picture" width="250">
                        <a href="change-image.php?id=<?php echo $row['ID']; ?>" aria-label="Change Profile Picture">Change Image</a>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="emeradd">Emergency Address</label>
                      <textarea class="form-control" id="emeradd" name="emeradd" rows="5" required><?php echo htmlentities($row['EmergencyAddress']); ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="emercontnum">Emergency Contact Number</label>
                      <input id="emercontnum" name="emercontnum" pattern="[0-9]+" maxlength="10" type="text" class="form-control" required value="<?php echo htmlentities($row['EmergencyContactnumber']); ?>">
                    </div>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" style="float:right">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
      </main>
    </div>
  </div>

  <!-- Minified and Optimized JS -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js" async></script>
  <script src="js/hoverable-collapse.js" async></script>
  <script src="js/template.js" async></script>
  <script src="js/settings.js" async></script>
  <script src="js/todolist.js" async></script>
</body>

</html>
