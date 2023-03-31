<?php
include '../config/constants.php'; ?>

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
    <title>Recieve | Login</title>
  </head>
  <body>
    <div class="container">
      <div class="col-md-6 col-lg-6">
        <form class="login-form" action="" method="POST">
          <h2 class="text-center">Reciever Login</h2>
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
        if (isset($_SESSION['login-failure'])) {
            echo $_SESSION['login-failure'];
            unset($_SESSION['login-failure']);
        }

        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
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

    $sql = "SELECT * FROM tbl_reciever WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login-success'] =
            '<p class="text-center">You have successfully logged in !</p>';

        // Login session check
        $_SESSION['user'] = $username;
        $_SESSION['user_type'] = 'reciever';

        header('location:' . HOMEURL . 'reciever/');
    } else {
        $_SESSION['login-failure'] =
            '<p class="text-center">Failed to login, please check your credentials !</p>';

        header('location:' . HOMEURL . 'reciever/login.php');
    }
} ?> -->
