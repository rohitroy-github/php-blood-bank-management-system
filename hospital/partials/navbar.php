<!-- <?php include '../../config/constants.php'; ?>

<?php if (isset($_SESSION['hospitalId'])) {
    $hospitalId = $_SESSION['hospitalId'];
} else {
    header('location: ' . HOMEURL . 'hospital/login.php');
    exit();
} ?> -->

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">Blood Bank Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="link nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="link nav-link" href="add-blood-info.php">Add Blood Information</a>
                </li>
                <li class="nav-item">
                    <a class="link nav-link" href="view-requests.php">View Requests</a>
                </li>
                <li class="nav-item">
                    <a class="link nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>