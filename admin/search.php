<?php 
session_start();
error_reporting(0);

// Database Connection
include('includes/config.php');

// Validating Session
if(strlen($_SESSION['aid']) == 0) {
    header('location:login.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Search and manage senior citizen details at MK Happy Home. Find and update senior citizens' information easily.">
    <meta name="keywords" content="MK Happy Home, Senior Citizen, Search, Manage Details">
    <title>MK Happy Home | Search Senior Citizen Details</title>

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
                            <ul class="navbar-nav mr-lg-2">
                                <li class="nav-item">
                                    <h4 class="mb-0">Search Senior Citizen Details</h4>
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
                    

                    <!-- Search Form -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="text-primary">Search Senior Citizen Details by Registration Number</h3>
                                    <form method="post" class="forms-sample">
                                        <div class="form-group">
                                            <label for="searchdata">Search By Registration Number</label>
                                            <input type="text" id="searchdata" name="searchdata" class="form-control" required autofocus aria-label="Enter registration number to search">
                                        </div>
                                        <button type="submit" name="search" class="btn btn-info btn-min-width mr-1 mb-1">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Search Results -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="table-responsive pt-3">
                                    <?php
                                    if(isset($_POST['search'])) {
                                        $sdata = $_POST['searchdata'];
                                        echo "<h4 class='card-title' style='padding-left: 20px; padding-top: 20px;'>Result against \"$sdata\" keyword</h4>";

                                        $stmt = $con->prepare("SELECT * FROM tblseniorcitizen WHERE RegistrationNumber LIKE ?");
                                        $sdata = "$sdata%";
                                        $stmt->bind_param("s", $sdata);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        if($result->num_rows > 0) {
                                            echo '<table class="table table-striped project-orders-table">';
                                            echo '<thead><tr>';
                                            echo '<th>#</th>';
                                            echo '<th>Registration Number</th>';
                                            echo '<th>Name</th>';
                                            echo '<th>Contact Number</th>';
                                            echo '<th>Date of Birth</th>';
                                            echo '<th>Added By</th>';
                                            echo '<th>Registration Date</th>';
                                            echo '<th>Actions</th>';
                                            echo '</tr></thead><tbody>';

                                            $cnt = 1;
                                            while($row = $result->fetch_assoc()) {
                                                echo '<tr>';
                                                echo '<td>' . htmlentities($cnt) . '</td>';
                                                echo '<td>' . htmlentities($row['RegistrationNumber']) . '</td>';
                                                echo '<td>' . htmlentities($row['Name']) . '</td>';
                                                echo '<td>' . htmlentities($row['ContactNumber']) . '</td>';
                                                echo '<td>' . htmlentities($row['DateofBirth']) . '</td>';
                                                echo '<td>' . htmlentities($row['AddedBy']) . '</td>';
                                                echo '<td>' . htmlentities($row['RegitrationDate']) . '</td>';
                                                echo '<td><div class="d-flex align-items-center">';
                                                echo '<a href="edit-scdetails.php?id=' . $row['ID'] . '" class="btn btn-success btn-sm btn-icon-text mr-3" aria-label="Edit details of ' . htmlentities($row['Name']) . '">Edit <i class="typcn typcn-edit btn-icon-append"></i></a>';
                                                echo '<a href="manage-scdetails.php?id=' . $row['ID'] . '&del=delete" onClick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger btn-sm btn-icon-text" aria-label="Delete ' . htmlentities($row['Name']) . '">Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></a>';
                                                echo '</div></td>';
                                                echo '</tr>';
                                                $cnt++;
                                            }
                                            echo '</tbody></table>';
                                        } else {
                                            echo '<tr><td colspan="8">No record found against this search</td></tr>';
                                        }
                                    }
                                    ?>
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
