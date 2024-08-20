<?php
session_start();
error_reporting(0);
include("includes/config.php");

if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));

    // Use prepared statements for secure database queries
    $stmt = $con->prepare("SELECT ID FROM tbladmin WHERE UserName=? AND Password=?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->fetch();

    if($id) {
        $_SESSION['alogin'] = $username;
        $_SESSION['aid'] = $id;

        if(!empty($_POST["remember"])) {
            // Securely set cookies
            setcookie("user_login", $username, time() + (10 * 365 * 24 * 60 * 60), "/", "", 
            isset($_SERVER["HTTPS"]), true);
            setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60), "/", "",
             isset($_SERVER["HTTPS"]), true);
        } else {
            setcookie("user_login", "", time() - 3600, "/", "", isset($_SERVER["HTTPS"]), true);
            setcookie("userpassword", "", time() - 3600, "/", "", isset($_SERVER["HTTPS"]), true);
        }

        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        header("Location: login.php");
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login to MK Happy Home Admin Dashboard. Secure and easy access to manage your account.">
    <meta name="keywords" content="MK Happy Home, Admin Login, Secure Login">
    <title>MK Happy Home | Admin Login</title>
    
    <!-- Minified CSS -->
    <link rel="stylesheet" href="vendors/typicons/typicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.min.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="images/logo.webp">
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h5 class="text-seagreen">MK Happy Home Admin LOGIN</h5>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username" 
                  aria-label="Username" value="<?php if(isset($_COOKIE["user_login"])) 
                  { echo htmlspecialchars($_COOKIE["user_login"]); } ?>" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" aria-label="Password" value="<?php if(isset($_COOKIE["userpassword"])) { echo htmlspecialchars($_COOKIE["userpassword"]); } ?>" required>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" name="submit">LOGIN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label text-muted" for="remember">Remember me</label>
                  </div>
                  <a href="forgot-password.php" class="auth-link text-blue">Forgot password?</a>
                </div>
                <div class="mt-3">
                  <a href="../index.php" class="auth-link text-blue">Home Page</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Minified JS -->
  <script src="vendors/js/vendor.bundle.base.min.js" defer></script>
  <script src="js/off-canvas.js" defer></script>
  <script src="js/hoverable-collapse.js" defer></script>
  <script src="js/template.js" defer></script>
  <script src="js/settings.js" defer></script>
  <script src="js/todolist.js" defer></script>
</body>
</html>
