<?php 
session_start();
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
    <meta name="description" content="Generate between dates report of senior citizen registrations at MK Happy Home.">
    <meta name="keywords" content="MK Happy Home, Senior Citizen, Between Dates Report, Registration">
    <title>MK Happy Home | Between Dates Report</title>

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
                                    <h4 class="mb-0">Between Dates Report of Senior Citizen Registration</h4>
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
                    <!-- Report Form -->
                    <div class="row">
                        <div class="col-md-10 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Generate Report</h4>
                                    <p class="card-description">Select the date range to generate the report of senior citizen registrations.</p>
                                    <form method="post" action="bwdates-report-details.php" class="forms-sample">
                                        <div class="form-group">
                                            <label for="fromdate">From Date</label>
                                            <input type="date" id="fromdate" name="fromdate" class="form-control" required aria-label="Select start date for the report">
                                        </div>
                                        <div class="form-group">
                                            <label for="todate">To Date</label>
                                            <input type="date" id="todate" name="todate" class="form-control" required aria-label="Select end date for the report">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary" style="float:right">Generate Report</button>
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
