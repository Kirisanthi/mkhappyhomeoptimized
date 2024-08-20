<?php
include('includes/config.php');
session_start();
error_reporting(0);

if (isset($_POST['search'])) {
    $sdata = trim($_POST['searchdata']);
    $stmt = $con->prepare("SELECT * FROM tblseniorcitizen WHERE RegistrationNumber LIKE ?");
    $searchPattern = $sdata . '%';
    $stmt->bind_param('s', $searchPattern);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Search senior citizen details by registration number at MK Happy Home. Get quick access to important details.">
    <meta name="keywords" content="MK Happy Home, Senior Citizen, Registration Search">
    <title>Search Senior Citizens | MK Happy Home</title>

    <!-- Minified CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Web Fonts -->
    <link rel="shortcut icon" href="images/2.webp">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Niconne" rel="stylesheet" type="text/css">

    <!-- Deferred JavaScript -->
    <script src="js/jquery-1.8.3.min.js" defer></script>
    <script src="js/modernizr.custom.js" defer></script>
    <script src="js/move-top.js" defer></script>
    <script src="js/easing.js" defer></script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.scroll').forEach(function(element) {
                element.addEventListener('click', function(event) {
                    event.preventDefault();
                    document.querySelector(this.hash).scrollIntoView({ behavior: 'smooth' });
                });
            });
        });
    </script>

    


</head>
<body>

<?php include_once('includes/header.php'); ?>

<!-- Content -->
<div class="content">
    <div class="blog">
        <div class="container">
            <div class="blog-top">
            <h3>Search Senior Citizen details by regsitration number</h3>
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" method="post">
                                        <div class="form-group">
                                            <label for="searchdata">Search By Registration Number</label>
                                            <input type="text" id="searchdata" name="searchdata" class="form-control" required autofocus>
                                        </div>
                                        <button type="submit" name="search" class="btn btn-info">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (isset($result)): ?>
            <div class="table-responsive pt-3">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Results for "<?php echo htmlspecialchars($sdata); ?>"</h4>
                <table class="table table-striped project-orders-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Registration Number</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Date of Birth</th>
                            <th>Added By</th>
                            <th>Registration Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $cnt = 1;
                            while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo htmlentities($cnt); ?></td>
                            <td><?php echo htmlentities($row['RegistrationNumber']); ?></td>
                            <td><?php echo htmlentities($row['Name']); ?></td>
                            <td><?php echo htmlentities($row['ContactNumber']); ?></td>
                            <td><?php echo htmlentities($row['DateofBirth']); ?></td>
                            <td><?php echo htmlentities($row['AddedBy']); ?></td>
                            <td><?php echo htmlentities($row['RegitrationDate']); ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="view-scdetails.php?id=<?php echo $row['ID']; ?>" class="btn btn-success btn-sm">View</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                                $cnt++;
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="8">No record found against this search</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include_once('includes/footer.php'); ?>

</body>
</html>



<input type="text" id="searchdata" name="searchdata" class="form-control" required autofocus>
