<?php
session_start();
include('sendEmail.php');
require_once "connection.php";

if (isset($_GET["token"])) {
  $token = $_GET["token"];
} elseif (isset($_POST["reset_password"])) {
  $token = $_POST["token"];
  $new_password = $_POST["new_password"];
  $repeat_password = $_POST["repeat_password"];


  if ($new_password !== $repeat_password) {
    echo "<div class='alert alert-danger'>Passwords do not match.</div>";
    die();
  }

  $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
  $update_sql = "UPDATE loginform SET password = '$hashed_password', reset_token = NULL WHERE reset_token = '$token'";
  mysqli_query($conn, $update_sql);

  echo "<div class='alert alert-success'>Password reset successful. <a href='login.php' class='btn btn-primary'>Login</a></div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <form action="reset_password.php" method="post">
      <input type="hidden" name="token" value="<?php echo $token; ?>">
      <div class="form-group">
        <input type="password" placeholder="Enter New Password:" name="new_password" class="form-control" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:" required>
      </div>
      <div class="form-btn">
        <input type="submit" value="Reset Password" name="reset_password" class="btn btn-primary">
      </div>
    </form>
  </div>
</body>

</html>