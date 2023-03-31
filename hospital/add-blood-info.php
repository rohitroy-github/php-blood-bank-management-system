<?php
include '../config/constants.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles/admin.css" />

    <title>Hospital | Add Blood</title>
</head>

<body>
    <!-- fetchingHospitalIdWhoLoggedIn -->
    <?php if (isset($_SESSION['hospitalId'])) {
        $hospitalId = $_SESSION['hospitalId'];
    } else {
        header('location: ' . HOMEURL . 'hospital/login.php');
        exit();
    } ?>

    <div class="container">
        <div class="col-md-6 col-lg-6">
            <form class="login-form" action="" method="POST">
                <h2 class="text-center">Add Blood Sample</h2>
                <br />
                <!-- Printing SUCCESSS message -->
                <?php if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    // Ending session
                    unset($_SESSION['add']);
                } ?>
                <div class="form-group">
                    <label for="bloodGroup">Blood Group</label>
                    <input name="bloodGroup" type="text" class="form-control" id="bloodGroup"
                        placeholder="Enter blood group ?" />
                </div>
                <div class="form-group">
                    <label for="volume">Volume</label>
                    <input name="volume" type="number" class="form-control" id="volume"
                        placeholder="Enter volume available (in Lts) ?" />
                </div>
                <div class="form-group">
                    <label for="expiryDate">Blood Sample Expiry Date</label>
                    <input type="date" id="expiryDate" name="expiryDate" class="form-control"
                        placeholder="Enter expiry date : DD/MM/YYYY ?">
                </div>
                <button name="submit" type="submit" class="btn btn-primaryColor" value="login">
                    Add Blood
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
    $bloodGroup = $_POST['bloodGroup'];
    $bloodGroup_upc = strtoupper($bloodGroup);
    $volume = $_POST['volume'];
    $expiryDate = $_POST['expiryDate'];
    // Set SQL query
    $sql = "INSERT INTO tbl_bloodbank SET
    hospital_id = '$hospitalId',
  bloodGroup = '$bloodGroup_upc',
  volume = '$volume',
  expiryDate = '$expiryDate'
  ";
    // Execute query into database
    ($res = mysqli_query($conn, $sql)) or die(mysqli_error());
    // Check whether data is inserted ?
    if ($res == true) {
        // Data inserted
        $_SESSION['addition-success'] =
            '<p class="text-center">Blood sample added successfully !</p>';
        // redirectingToDashboard
        header('location:' . HOMEURL . 'hospital/');
    } else {
        // Failed
        $_SESSION['addition-failure'] =
            '<p class="text-center">Failed to add blood sample !</p>';
        // redirectingToRetry
        header('location:' . HOMEURL . 'hospital/add-blood-info.php');
    }
}
?>
