<?php
include './config/constants.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./styles/clientStyles.css">
    <link rel="stylesheet" href="./styles/index.css">

    <title>Blood Bank | Home</title>
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
                <b>Blood Bank</b>
            </h2>

            <div>
                <p class="text-center">All available blood samples are listed here !</p>
                <?php if (isset($_SESSION['logout-success'])) {
                    echo $_SESSION['logout-success'];
                    unset($_SESSION['logout-success']);
                } ?>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h6><b>Serial</b></h6>
                            </th>
                            <th>
                                <h6><b>Hospital</b></h6>
                            </th>
                            <th>
                                <h6><b>Blood Group</b></h6>
                            </th>
                            <th>
                                <h6><b>Volume (in Lts)</b></h6>
                            </th>
                            <th>
                                <h6><b>Expiry</b></h6>
                            </th>
                            <th>
                                <h6><b>Action</b></h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'SELECT * FROM tbl_bloodbank ORDER BY id DESC';

                        $res = mysqli_query($conn, $sql);

                        if ($res == true) {
                            // Count rows for checking data availibility
                            $count = mysqli_num_rows($res);

                            $sn = 1;

                            if ($count > 0) {
                                while ($rows = mysqli_fetch_assoc($res)) {

                                    //Run as long as data is available
                                    $id = $rows['id'];
                                    $hospitalId = $rows['hospital_id'];
                                    $bloodGroup = $rows['bloodGroup'];
                                    $volume = $rows['volume'];
                                    $expiryDate = $rows['expiryDate'];

                                    // fetchHospitalNameWhoLoggedIn?
                                    $sql_tbl_hospital = "SELECT * FROM tbl_hospital WHERE id=$hospitalId";

                                    $res_tbl_hospital = mysqli_query(
                                        $conn,
                                        $sql_tbl_hospital
                                    );

                                    if ($res_tbl_hospital == true) {
                                        $rows_tbl_hospital = mysqli_fetch_assoc(
                                            $res_tbl_hospital
                                        );

                                        $hospitalName =
                                            $rows_tbl_hospital['name'];
                                    }
                                    ?>
                        <tr>
                            <td>
                                <p>
                                    <?php echo $sn++; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $hospitalName; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $bloodGroup; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $volume; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $expiryDate; ?>
                                </p>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="<?php echo HOMEURL; ?>reciever/request-blood.php?id=<?php echo $id; ?>"
                                        class="btn adminPanelBtn mr-2">
                                        Request Blood Sample
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <?php
                                }
                            } else {
                                 ?>
                        <p>
                            Currently there are no blood samples !
                        </p>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div>
                    <p class="text-center" style="font-size: 10px">
                        <b>Note : Please login / register as a reciever to request blood from blood bank !</b>
                    </p>
                </div>
            </div>
        </div>
    </div>

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