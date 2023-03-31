<?php
include '../config/constants.php';
include './partials/login-check.php';
?>

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

    <title>Reciever | Request Blood</title>
</head>

<body>
    <div class="container">
        <div class="col-md-6 col-lg-6">
            <form class="login-form" action="" method="POST">
                <h2 class="text-center">Request Blood</h2>
                <br />
                <!-- Printing SUCCESSS message -->
                <?php if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    // Ending session
                    unset($_SESSION['add']);
                } ?>
                <div class="form-group">
                    <label for="username">Full Name</label>
                    <input name="name" type="text" class="form-control" id="name"
                        placeholder="Enter your full name ?" />
                </div>
                <div class="form-group">
                    <label for="password">Contact Number</label>
                    <input name="contact" type="text" class="form-control" id="contact"
                        placeholder="Enter your contact number ?" />
                </div>
                <div class="form-group">
                    <label for="username">Blood Group</label>
                    <input disabled name="bloodGroup" type="text" class="form-control" id="bloodGroup" value="A+"
                         />
                </div>
                <div class="form-group">
                    <label for="password">Volume</label>
                    <input disabled name="volume" type="number" class="form-control" id="volume" value="1"
                      />
                </div>
                <div class="form-group">
                    <label for="expiryDate">Expiry Date</label>
                    <input type="text" id="expiryDate" name="expiryDate" class="form-control" disabled value="05-05-2023">
                </div>
                <button name="submit" type="submit" class="btn btn-primaryColor" value="login">
                    Request Blood
                </button>
            </form>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>

<!-- <?php if (isset($_POST['submit'])) {
    // Store in variables
    $name = $_POST['name'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $bloodGroup = $_POST['bloodGroup'];
    // Password encryption using md5
    $password = md5($_POST['password']);
    // Set SQL query
    $sql = "INSERT INTO tbl_admin SET
  name = '$name',
  username = '$username',
  password = '$password'
  ";
    // Execute query into database
    ($res = mysqli_query($conn, $sql)) or die(mysqli_error());
    // Check whether data is inserted ?
    if ($res == true) {
        // Data inserted
        $_SESSION['add'] = 'Reciever registered successfully !';
        // Redirect to ManageAdmin Page
        header('location:' . HOMEURL . 'reciever/');
    } else {
        // Failed
        $_SESSION['add'] = 'Failed to register reciever !';
        // Redirect to addAdmin Page again
        header('location:' . HOMEURL . 'reciever/register.php');
    }
    // echo $sql;
} ?> -->
