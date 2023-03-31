<?php if (!isset($_SESSION['user'])) {
    $_SESSION['not-logged-in'] = '<p>Please login to access admin panels !</p>';

    header('location:' . HOMEURL . '/login.php');
}
?>
