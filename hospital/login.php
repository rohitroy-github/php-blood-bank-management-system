<?php
include '../config/constants.php';
// include './partials/login-check.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="../styles/admin.css"
    />    
    <title>Hospital | Login</title>
  </head>
  <body>
    <div class="container">
      <div class="col-md-6 col-lg-6">
        <form class="login-form" action="" method="POST">
          <h2 class="text-center">Hospital Login</h2>
          <br/>
          <div class="form-group">
            <label for="username">Username</label>
            <input
              name="username"
              type="text"
              class="form-control"
              id="username"
              placeholder="Enter username"
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              name="password"
              type="password"
              class="form-control"
              id="password"
              placeholder="Enter password"
            />
          </div>
          <button
            name="submit"
            type="submit"
            class="btn btn-primaryColor"
            value="login"
          >
          Login
          </button>
        </form>
        <br />
        <!-- loginMessages -->
        <?php
        if (isset($_SESSION['logout'])) {
            echo $_SESSION['logout'];
            unset($_SESSION['logout']);
        }

        if (isset($_SESSION['login-failure'])) {
            echo $_SESSION['login-failure'];
            unset($_SESSION['login-failure']);
        }
        ?>
      </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  </body>
</html>

<!-- <?php if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tbl_hospital WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_assoc($res);
    $id = $rows['id'];

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login-success'] =
            '<p class="text-center">You have successfully logged in !</p>';

        // Login session check
        $_SESSION['user'] = $username;

        header('location:' . HOMEURL . 'hospital/');
    } else {
        $_SESSION['login-failure'] =
            '<p class="text-center">Failed to login | Wrong credentials !</p>';

        header('location:' . HOMEURL . 'hospital/login.php');
    }
} ?> -->
