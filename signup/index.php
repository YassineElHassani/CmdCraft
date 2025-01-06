<?php 
require_once '../configs/Database.php';
require_once '../classes/Users.php';

$newUser = new Users();
session_start();

if (isset($_POST['submit'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];

  $newUser->register($name,$email,$password);

  $_SESSION['registered'] = true;

  header("location: ../signin/index.php");
}

$errorMessage = "";

if (isset($_SESSION['already']) && $_SESSION['already'] === true) {
  $errorMessage = "User is already exist";
  unset($_SESSION['already']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
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
    <h1 class="sign-up__title">Get started</h1>
    <p class="sign-up__subtitle">Start creating the best possible customer experience for you</p>
    <form class="sign-up-form form" action="" method="POST">
      <?php 
          if(!empty($errorMessage)) {
              echo "
                  <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>$errorMessage</strong>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
              ";
          }
      ?>
      <label for="name" class="form-label-wrapper">
        <p class="form-label">Name</p>
        <input id="name" class="form-input" type="text" placeholder="Enter your name" name="name" required>
      </label>
      <label for="email" class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input id="email" class="form-input" type="email" placeholder="Enter your email" name="email" required>
      </label>
      <label for="password" class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input id="password" class="form-input" type="password" placeholder="Enter your password" name="password" required>
      </label>
      <a class="link-info forget-link" href="../signin/index.php">Already have an a account?</a>
      <button type="submit" name="submit" class="form-btn primary-default-btn transparent-btn">Sign in</button>
    </form>
  </article>
</main>
</body>

</html>