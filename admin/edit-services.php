<?php 
session_start();
error_reporting(0);
include_once('includes/config.php');

// Validating Session
if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
    exit;
} else {
    if (isset($_POST['submit'])) {
        $sertitle = $_POST['sertitle'];
        $serdes = $_POST['serdes'];
        $id = intval($_GET['id']);

        // Using prepared statements to prevent SQL injection
        $stmt = $con->prepare("UPDATE tblservices SET ServiceTitle = ?, ServiceDescription = ? WHERE ID = ?");
        $stmt->bind_param('ssi', $sertitle, $serdes, $id);
        $stmt->execute();

        echo "<script>alert('Service detail has been updated successfully');</script>";
        echo "<script>window.location.href='manage-services.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Update services for MK Happy Home. Manage and edit services offered to senior citizens.">
    <title>MK Happy Home | Update Services</title>

    <!-- Minified and Optimized CSS -->
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="images/logo.webp">

    <!-- External JavaScript for rich text editor -->
    <script src="http://js.nicedit.com/nicEdit-latest.js" defer></script>
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
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Services</h4>
                                    <p class="card-description">Update services of old age home</p>
                                    <form class="forms-sample" method="post">
                                        <?php
                                        $id = intval($_GET['id']);
                                        $query = $con->prepare("SELECT ServiceTitle, ServiceDescription FROM tblservices WHERE ID = ?");
                                        $query->bind_param('i', $id);
                                        $query->execute();
                                        $result = $query->get_result();
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <div class="form-group">
                                            <label for="sertitle">Service Title</label>
                                            <input id="sertitle" name="sertitle" type="text" class="form-control" required aria-label="Service Title" aria-required="true" value="<?php echo htmlentities($row['ServiceTitle']); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="serdes">Service Description</label>
                                            <textarea class="form-control" name="serdes" id="serdes" rows="5" aria-label="Service Description" aria-required="true"><?php echo htmlentities($row['ServiceDescription']); ?></textarea>
                                        </div>
                                        <?php } ?>
                                        <button type="submit" class="btn btn-primary mr-2" name="submit" style="float:right">Submit</button>
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
