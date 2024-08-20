<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');

// Validating Session
if(strlen($_SESSION['aid']) == 0) { 
    header('location:index.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="View and manage unread contact details at MK Happy Home.">
    <meta name="keywords" content="MK Happy Home, Unread Contacts, Admin, Management">
    <title>MK Happy Home | Unread Contact Details</title>
    
    <!-- Minified CSS -->
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="images/logo.webp">
</head>

<body>
    <div class="container-scroller">
        <!-- Header -->
        <?php include_once('includes/header.php'); ?>
        <nav aria-label="breadcrumb" class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
                        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-center">
                            <h4 style="color:#FFFFFF">Unread Contact Details</h4>
                        </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <?php include_once('includes/sidebar.php'); ?>

            <!-- Main Panel -->
            <main class="main-panel">
                <div class="content-wrapper">
                   

                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <h4 class="card-title px-3 pt-3">Unread Contact Details</h4>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-striped project-orders-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Contact Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $ret = mysqli_query($con, "SELECT * FROM tblcontact WHERE IsRead IS NULL");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo htmlentities($cnt); ?></td>
                                                        <td><?php echo htmlentities($row['FirstName'] . ' ' . $row['LastName']); ?></td>
                                                        <td><?php echo htmlentities($row['Email']); ?></td>
                                                        <td><span class="badge badge-primary"><?php echo htmlentities($row['EnquiryDate']); ?></span></td>
                                                        <td>
                                                            <a href="view-contact-details.php?viewid=<?php echo $row['ID']; ?>" class="btn btn-success btn-sm" aria-label="View Details">
                                                                <i class="typcn typcn-eye"></i> View
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php $cnt++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Footer -->
                <?php include_once('includes/footer.php'); ?>
            </main>
        </div>
    </div>

    <!-- Minified JS -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js" async></script>
    <script src="js/hoverable-collapse.js" async></script>
    <script src="js/template.js" async></script>
    <script src="js/settings.js" async></script>
    <script src="js/todolist.js" async></script>
</body>

</html>
<?php } ?>
