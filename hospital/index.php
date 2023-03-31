<?php
include '../config/constants.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles/clientStyles.css">
    <link rel="stylesheet" href="../styles/index.css">

    <title>Hospital | Dashboard</title>
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
                <b>Dashboard</b>
            </h2>

            <div>
              <?php if (isset($_SESSION['update-order'])) {
                  echo $_SESSION['update-order'];
                  // Ending session
                  unset($_SESSION['update-order']);
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
                                    $hospitalName = $rows['name'];
                                    $bloodGroup = $rows['bloodGroup'];
                                    $volume = $rows['volume'];
                                    $expiryDate = $rows['expiryDate'];
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
                                    <a href="<?php echo HOMEURL; ?>admin/update-order.php?id=<?php echo $id; ?>"
                                        class="btn adminPanelBtn mr-2">
                                        Request Blood
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <?php
                                }
                            } else {
                                 ?>
                        <tr>
                            <td>
                                <p>
                                    Currently there are no orders !
                                </p>
                            </td>
                        </tr>
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