<?php
session_start();
include('sendEmail.php');

if (isset($_SESSION["user"])) {
  header("Location: index.php");
}

if (isset($_POST["reset_email"])) {
  $reset_email = $_POST["reset_email"];
  require_once "connection.php";


  $sql = "SELECT * FROM loginform WHERE email = '$reset_email'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if ($user) {

    $token = bin2hex(random_bytes(32));


    $update_sql = "UPDATE loginform SET reset_token = '$token' WHERE email = '$reset_email'";
    mysqli_query($conn, $update_sql);


    $reset_link = "http://localhost/Loginsystem/reset_password.php?token=$token";


    mail($reset_email, "Password Reset", "Click the following link to reset your password: $reset_link");

    echo "<div class='alert alert-success'>Password reset link has been sent to your email.</div>";
  } else {
    echo "<div class='alert alert-danger'>Email not found.</div>";
  }
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
    <form action="forgot_password.php" method="post">
      <div class="form-group">
        <input type="email" placeholder="Enter Email:" name="reset_email" class="form-control">
      </div>
      <div class="form-btn">
        <input type="submit" value="Reset Password" name="reset_password" class="btn btn-primary">
      </div>
    </form>

  </div>
</body>

</html>