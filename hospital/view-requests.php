<?php
include '../config/constants.php';
include './partials/login-check.php';

// fetchingHospitalId?
$hospitalId = $_SESSION['hospitalId'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles/clientStyles.css">
    <link rel="stylesheet" href="../styles/index.css">  

    <title>View Requests</title>
</head>

<body>
    <!-- Menu Section -->
    <div class="top-container">
        <?php include './partials/navbar.php'; ?>
    </div>

    <!-- mainContentSection -->
    <div class="main-container container" id="dashboard">
        <div class="content">
            <h2 style="font-weight: 500; text-align: center;">
                <b>Blood Sample Requests</b>
            </h2>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h6><b>Serial</b></h6>
                            </th>
                            <th>
                                <h6><b>Name</b></h6>
                            </th>
                            <th>
                                <h6><b>Contact</b></h6>
                            </th>
                            <th>
                                <h6><b>Address</b></h6>
                            </th>
                            <th>
                                <h6><b>Blood Group</b></h6>
                            </th>
                            <th>
                                <h6><b>Volume</b></h6>
                            </th>
                            <th>
                                <h6><b>Expiry Date</b></h6>
                            </th>
                            <th>
                                <h6><b>Requested On</b></h6>
                            </th>
                            <!-- <th>
                                <h6><b>Action</b></h6>
                            </th> -->
                        </tr>
                    </thead>
                    <tbody>

                        <!-- fetchHospitalNameWhoLoggedIn? -->
                        <!-- <?php
                        $sql_tbl_request = "SELECT * FROM tbl_hospital WHERE id=$hospitalId";

                        $res_tbl_request = mysqli_query(
                            $conn,
                            $sql_tbl_request
                        );

                        if ($res_tbl_request == true) {
                            $rows_tbl_request = mysqli_fetch_assoc(
                                $res_tbl_request
                            );

                            $hospitalName = $rows_tbl_hospital['name'];
                        }
                        ?> -->

                        <?php
                        $sql_tbl_request = "SELECT * FROM tbl_request WHERE hospitalId=$hospitalId ORDER BY id DESC ";

                        $res_tbl_request = mysqli_query(
                            $conn,
                            $sql_tbl_request
                        );

                        if ($res_tbl_request == true) {
                            // Count rows for checking data availibility
                            $count = mysqli_num_rows($res_tbl_request);

                            $sn = 1;

                            if ($count > 0) {
                                while (
                                    $rows = mysqli_fetch_assoc($res_tbl_request)
                                ) {

                                    //Run as long as data is available
                                    $id = $rows['id'];
                                    $requesterName = $rows['requester_name'];
                                    $requesterContact =
                                        $rows['requester_contact'];
                                    $requesterAddress =
                                        $rows['requester_address'];
                                    $requesterId = $rows['requesterId'];

                                    $bloodBankId = $rows['bloodBankId'];
                                    // fetchBLOODGROUPandEXPIRYDATE?
                                    $sql2 = "SELECT * FROM tbl_bloodbank WHERE id='$bloodBankId'";
                                    $res2 = mysqli_query($conn, $sql2);
                                    $rows2 = mysqli_fetch_assoc($res2);
                                    $requestedBloodGroup = $rows2['bloodGroup'];
                                    $requestedBloodVolume = $rows2['volume'];
                                    $requestedBloodExpiryDate =
                                        $rows2['expiryDate'];

                                    $hospitalId = $rows['hospitalId'];
                                    $requestedDate = $rows['requestedDate'];
                                    ?>
                        <tr>
                            <td>
                                <p>
                                    <?php echo $sn++; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $requesterName; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $requesterContact; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $requesterAddress; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $requestedBloodGroup; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $requestedBloodVolume; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $requestedBloodExpiryDate; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $requestedDate; ?>
                                </p>
                            </td>
                            <!-- <td>
                                <div class="d-flex justify-content-center">
                                    <a href="<?php echo HOMEURL; ?>hospital/update-blood.php?id=<?php echo $id; ?>"
                                        class="btn adminPanelBtn mr-2">
                                        Update Blood
                                    </a>
                                </div>
                            </td> -->
                        </tr>

                        <?php
                                }
                            } else {
                                 ?>
                                <p>
                                    Currently there are no blood samples requested !
                                </p>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footerSection -->
    <div class="bottom-container">
        <?php include './partials/footer.php'; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>