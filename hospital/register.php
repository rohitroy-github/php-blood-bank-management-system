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

    <title>Hospital | Registration</title>
</head>

<body>
    <div class="container">
        <div class="col-md-6 col-lg-6">
            <form class="login-form" action="" method="POST">
                <h2 class="text-center">Hospital Registration</h2>
                <br />
                <!-- Printing SUCCESSS message -->
                <?php if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    // Ending session
                    unset($_SESSION['add']);
                } ?>
                <div class="form-group">
                    <label for="name">Hospital Name</label>
                    <input name="name" type="text" class="form-control" id="name"
                        placeholder="Enter hospital's name ?" />
                </div>
                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input name="contact" type="text" class="form-control" id="contact"
                        placeholder="Enter hospital's contact number ?" />
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

<!-- <?php if (isset($_POST['submit'])) {
    // Store in variables
    $name = $_POST['name'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    // Password encryption using md5
    $password = md5($_POST['password']);
    // Set SQL query
    $sql = "INSERT INTO tbl_admin SET
  name = '$name',
  username = '$username',
  contact = '$contact',
  password = '$password'
  ";
    // Execute query into database
    ($res = mysqli_query($conn, $sql)) or die(mysqli_error());
    // Check whether data is inserted ?
    if ($res == true) {
        // Data inserted
        $_SESSION['add'] = 'Hospital registered successfully !';
        // Redirect to ManageAdmin Page
        header('location:' . HOMEURL . 'hospital/');
    } else {
        // Failed
        $_SESSION['add'] = 'Failed to register hospital !';
        // Redirect to addAdmin Page again
        header('location:' . HOMEURL . 'hospital/register.php');
    }
    // echo $sql;
} ?> -->
