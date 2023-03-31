<!-- codeToCheckIfBloodGroupsMathched? -->

<?php include '../../config/constants.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
</head>

<body>
    <?php
    $recieverId = $_SESSION['recieverId'];

    // fetchLoggedInReciever'sBloodGroup
    $sql = "SELECT * FROM tbl_reciever WHERE id='$recieverId'";
    $res = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($res);
    $recieverBloodGroup = $rows['bloodGroup'];

    // fetchLoggedInRequested'sBloodGroup
    $bloodBankId = $_GET['id'];
    $sql2 = "SELECT * FROM tbl_bloodbank WHERE id='$bloodBankId'";
    $res2 = mysqli_query($conn, $sql2);
    $rows2 = mysqli_fetch_assoc($res2);
    $requestedBloodGroup = $rows2['bloodGroup'];
    $hospitalId = $rows2['hospital_id'];

    if ($recieverBloodGroup == $requestedBloodGroup) {
        $_SESSION['bloodBankId'] = $bloodBankId;
        $_SESSION['hospitalId'] = $hospitalId;

        header('location:' . HOMEURL . 'reciever/request-blood.php');
    } else {
        $_SESSION['blood-group-mismatch'] =
            '<p class="text-center">Your blood group does not match with the requested blood group !</p>';

        header('location:' . HOMEURL . 'reciever/');
    }

// forCheckingPurpose
// if ($recieverBloodGroup == $requestedBloodGroup) {
//     $_SESSION['bloodBankId'] = $bloodBankId;
//     $_SESSION['hospitalId'] = $hospitalId;

//     echo 'matched';
//     echo 'recieverBloodGroup>' . $recieverBloodGroup;
//     echo 'requestedBloodGroup' . $requestedBloodGroup;

//     // header('location:' . HOMEURL . 'reciever/partials/blood-group-check.php');
// } else {
//     $_SESSION['blood-group-mismatch'] =
//         '<p class="text-center">Your blood group does not match with the requested blood group !</p>';

//     echo 'mismatched';
//     echo 'recieverBloodGroup>' . $recieverBloodGroup;
//     echo 'requestedBloodGroup' . $requestedBloodGroup;

//     // header('location:' . HOMEURL . 'reciever/partials/blood-group-check.php');
// }
?>


</body>

</html>