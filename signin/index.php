<?php 
require_once '../configs/Database.php';
require_once '../classes/Users.php';

session_start();

$newLogin = new Users();

if (isset($_POST['submit'])) {
     
    $email=$_POST["email"];
    $password=$_POST["password"];

    $newLogin->logIn($email,$password);
}

$successMessage = "";
$warningMessage = "";
$errorMessage = "";

if (isset($_SESSION['registered']) && $_SESSION['registered'] === true) {
  $successMessage = "You have been registered successfully";
  unset($_SESSION['registered']);
} elseif (isset($_SESSION['noPerm']) && $_SESSION['noPerm'] === true) {
  $warningMessage = "Your account is deactivated!";
  unset($_SESSION['noPerm']);
} elseif (isset($_SESSION['false']) && $_SESSION['false'] === true) {
  $errorMessage = "Email or password is invalid!";
  unset($_SESSION['false']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="../css/sign.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Welcome back!</h1>
    <p class="sign-up__subtitle">Sign in to your account to continue</p>
    <form class="sign-up-form form" action="" method="POST">

    <?php 
        if(!empty($errorMessage)) {
            echo "
                <div class='danger alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
    ?>
    <?php 
        if(!empty($warningMessage)) {
            echo "
                <div class='warning alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$warningMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
    ?>
    <?php 
        if(!empty($successMessage)) {
            echo "
                <div class='success alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
    ?>

      <label for="email" class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input id="email" name="email" class="form-input" type="email" placeholder="Enter your email" required>
      </label>
      <label for="password" class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input id="password" name="password" class="form-input" type="password" placeholder="Enter your password" required>
      </label>
      <a class="link-info forget-link" href="../signup/index.php">Create a new account?</a>
      <button type="submit" name="submit" class="form-btn primary-default-btn transparent-btn">Sign in</button>
    </form>
  </article>
</main>
<!-- Chart library -->
<script src="../plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="../plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="../js/script.js"></script>
</body>

</html>