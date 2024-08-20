<?php 
session_start();
error_reporting(0);
include_once('includes/config.php');

// Delete Senior Citizen Record
if (isset($_GET['del'])) {
    $scid = intval($_GET['id']);
    $stmt = $con->prepare("DELETE FROM tblseniorcitizen WHERE ID = ?");
    $stmt->bind_param("i", $scid);
    $stmt->execute();
    echo "<script>alert('Data Deleted');</script>";
    echo "<script>window.location.href='manage-scdetails.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage Senior Citizen details for MK Happy Home. View, edit, and delete senior citizen records.">
    <meta name="keywords" content="MK Happy Home, Senior Citizen, Management, Elder Care">
    <title>MK Happy Home | Manage Senior Citizen Details</title>
    
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
        <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
   &nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-center">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0" >Manage Senior Citizen Details</h4>
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
                                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px; color:#2D6D4E;">Manage Senior Citizen Details</h4>
                                <div class="table-responsive pt-3">
                                    <table class="table table-striped project-orders-table" aria-label="Senior Citizen Details Table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Registration Number</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Contact Number</th>
                                                <th scope="col">Date of Birth</th>
                                                <th scope="col">Added By</th>
                                                <th scope="col">Registration Date</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $con->prepare("SELECT ID, RegistrationNumber, Name, ContactNumber, DateofBirth, AddedBy, 
                                            RegitrationDate FROM tblseniorcitizen");
                                            $stmt->execute();
                                            $stmt->bind_result($id, $regNum, $name, $contact, $dob, $addedBy, $regDate);
                                            $cnt = 1;
                                            while ($stmt->fetch()) { ?>

                                            
                                                <tr>
                                                    <td><?php echo $cnt++; ?></td>
                                                    <td><?php echo htmlspecialchars($regNum); ?></td>
                                                    <td><?php echo htmlspecialchars($name); ?></td>
                                                    <td><?php echo htmlspecialchars($contact); ?></td>
                                                    <td><?php echo htmlspecialchars($dob); ?></td>
                                                    <td><?php echo htmlspecialchars($addedBy); ?></td>
                                                    <td><?php echo htmlspecialchars($regDate); ?></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="edit-scdetails.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm btn-icon-text mr-3" aria-label="Edit Senior Citizen Details">Edit <i class="typcn typcn-edit btn-icon-append"></i></a>
                                                            <a href="manage-scdetails.php?id=<?php echo $id; ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm btn-icon-text" aria-label="Delete Senior Citizen Details">Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } 
                                            $stmt->close();
                                            ?>
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
    <script src="js/off-canvas.js" async></script>
    <script src="js/hoverable-collapse.js" async></script>
    <script src="js/template.js" async></script>
    <script src="js/settings.js" async></script>
    <script src="js/todolist.js" async></script>
</body>

</html>



