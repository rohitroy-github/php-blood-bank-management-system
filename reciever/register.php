<?php
include '../config/constants.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="../styles/admin.css"
    />   

    <title>Reciever | Register</title>
</head>

<body>
    <div class="container">
        <div class="col-md-6 col-lg-6">
            <form class="login-form" action="" method="POST">
                <h2 class="text-center">Reciever Registration</h2>
                <br />
                <!-- Printing SUCCESSS message -->
                <?php if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    // Ending session
                    unset($_SESSION['add']);
                } ?>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input name="name" type="text" class="form-control" id="name"
                        placeholder="Enter your full name ?" />
                </div>
                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input name="contact" type="text" class="form-control" id="contact"
                        placeholder="Enter your contact number ?" />
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control" id="username"
                        placeholder="Enter a username ?" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password"
                        placeholder="Enter a password ?" />
                </div>
                <div class="form-group">
                    <label for="bloodGroup">Blood Group</label>
                    <input name="bloodGroup" type="text" class="form-control" id="bloodGroup"
                        placeholder="Enter your blood group ?" />
                </div>
                <button name="submit" type="submit" class="btn btn-primaryColor" value="login">
                    Register
                </button>
            </form>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php if (isset($_POST['submit'])) {
    // Store in variables
    $name = $_POST['name'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $bloodGroup = $_POST['bloodGroup'];
    $bloodGroup_upc = strtoupper($bloodGroup);
    // Password encryption using md5
    $password = md5($_POST['password']);
    // Set SQL query
    $sql = "INSERT INTO tbl_reciever SET
  name = '$name',
  username = '$username',
  contact = '$contact',
  bloodGroup = '$bloodGroup_upc',
  password = '$password'
  ";
    // Execute query into database
    ($res = mysqli_query($conn, $sql)) or die(mysqli_error());
    // Check whether data is inserted ?
    if ($res == true) {
        // Data inserted
        $_SESSION['registration-success'] =
            '<p class="text-center">Reciever registered successfully !</p>';

        // sessions
        $_SESSION['user'] = $username;
        $_SESSION['user_type'] = 'reciever';
        $_SESSION['recieverId'] = $id;

        // redirectingToLogin
        header('location:' . HOMEURL . 'reciever/');
    } else {
        // Failed
        $_SESSION['registration-failure'] =
            '<p class="text-center">Failed to register. Please try again later  !</p>';
        // redirectingToRetry
        header('location:' . HOMEURL . 'reciever/register.php');
    }
} ?>
