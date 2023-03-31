<?php
include '../config/constants.php';
include './partials/login-check.php';
?>

<?php
$bloodBankId = $_SESSION['bloodBankId'];
$hospitalId = $_SESSION['hospitalId'];
$recieverId = $_SESSION['recieverId'];

// fetchRequestedBloodGroup?
$sql1 = "SELECT * FROM tbl_bloodbank WHERE id='$bloodBankId'";
$res1 = mysqli_query($conn, $sql1);
$rows1 = mysqli_fetch_assoc($res1);
$requestedBloodGroup = $rows1['bloodGroup'];
// fetchRequestedBlood'sVolume
$requestedBloodVolume = $rows1['volume'];
// fetchRequestedBlood'sExpiryDate
$requestedBloodExpiryDate = $rows1['expiryDate'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles/admin.css" />

    <title>Reciever | Request Blood Sample</title>
</head>

<body>
    <div class="container">
        <div class="col-md-6 col-lg-6">
            <form class="login-form" action="" method="POST">
                <h2 class="text-center">Request Blood Sample</h2>
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
                    <label for="password">Current Contact Number</label>
                    <input name="contact" type="text" class="form-control" id="contact"
                        placeholder="Enter your contact number ?" />
                </div>
                <div class="form-group">
                    <label for="address">Current Address</label>
                    <textarea name="address" type="text" class="form-control" id="address"
                        placeholder="Enter your address ?"></textarea>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="bloodGroup">Blood Group</label>
                        <input disabled name="bloodGroup" type="text" class="form-control" id="bloodGroup"
                            value="<?php echo $requestedBloodGroup; ?>" />
                    </div>
                    <div class="col-md-6">
                        <label for="volume">Volume</label>
                        <input disabled name="volume" type="number" class="form-control" id="volume"
                            value="<?php echo $requestedBloodVolume; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="expiryDate">Expiry Date</label>
                    <input type="date" id="expiryDate" name="expiryDate" class="form-control" disabled
                        value="<?php echo $requestedBloodExpiryDate; ?>">
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primaryColor" value="login">
                        Request Blood Sample
                    </button>
                </div>
                <div>
                    <p class="text-center" style="font-size: 10px">
                        <b>Note : Please recheck every information before putting request !</b>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO tbl_request SET
  requester_name = '$name',
  requester_contact = '$contact',
  requester_address = '$address',
  requesterId = '$recieverId',
  bloodBankId = '$bloodBankId',
  hospitalId = '$hospitalId'";
    // Execute query into database
    ($res = mysqli_query($conn, $sql)) or die(mysqli_error());
    // Check whether data is inserted ?
    if ($res == true) {
        // Data inserted
        $_SESSION['request-success'] =
            '<p class="text-center">Request submitted successfully !</p>';

        // Redirect to ManageAdmin Page
        header('location:' . HOMEURL . 'reciever/');
    } else {
        // Failed
        $_SESSION['request-failure'] =
            '<p class="text-center">Request submission failed, please try again later !</p>';

        // Redirect to addAdmin Page again
        header('location:' . HOMEURL . 'reciever/');
    }
} ?>
