<?php
session_start();
error_reporting(0);
include_once('includes/config.php');

if (isset($_GET['del'])) {
    $serid = intval($_GET['id']);
    $stmt = $con->prepare("DELETE FROM tblservices WHERE ID = ?");
    $stmt->bind_param('i', $serid);
    $stmt->execute();

    echo "<script>alert('Data Deleted');</script>";
    echo "<script>window.location.href='manage-services.php'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage services for MK Happy Home. Add, edit, or delete services for senior citizens.">
    <title>MK Happy Home | Manage Services</title>

    <!-- Minified and Optimized CSS -->
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="images/logo.webp">
</head>

<body>
    <div class="container-scroller">
    <?php include_once('includes/header.php');?>

        <!-- Header -->
        <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0" aria-label="breadcrumb">
                        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-center">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <h4 class="mb-0">Manage Services</h4>
                                </li>
                            </ul>
                        </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <?php include_once('includes/sidebar.php'); ?>

            <!-- Main Panel -->
            <main class="main-panel">
                <div class="content-wrapper">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;" style="color:#2D6D4E">Manage Services</h4>
                                <div class="table-responsive pt-3">
                                    <table class="table table-striped project-orders-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Service Title</th>
                                                <th>Creation Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "SELECT * FROM tblservices");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($row['ServiceTitle']); ?></td>
                                                <td><?php echo htmlentities($row['CreationDate']); ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="edit-services.php?id=<?php echo $row['ID']; ?>" class="btn btn-success btn-sm btn-icon-text mr-3" aria-label="Edit service">Edit <i class="typcn typcn-edit btn-icon-append"></i></a>
                                                        <a href="manage-services.php?id=<?php echo $row['ID']; ?>&del=delete" class="btn btn-danger btn-sm btn-icon-text" data-confirm="Are you sure you want to delete this service?" aria-label="Delete service">Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $cnt++; } ?>
                                        </tbody>
                                    </table>
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
    <script src="vendors/chart.js/Chart.min.js" async></script>
    <script src="js/off-canvas.js" async></script>
    <script src="js/hoverable-collapse.js" async></script>
    <script src="js/template.js" async></script>
    <script src="js/settings.js" async></script>
    <script src="js/todolist.js" async></script>

    <!-- Custom JS for handling the confirmation dialog -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-confirm]').forEach(function (element) {
                element.addEventListener('click', function (event) {
                    if (!confirm(element.getAttribute('data-confirm'))) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
</body>

</html>
