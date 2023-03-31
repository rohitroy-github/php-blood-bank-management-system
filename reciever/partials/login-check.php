<?php if (!isset($_SESSION['user'])) {
    $_SESSION['not-logged-in'] =
        '<p class="text-center">Please login to access admin panels !</p>';

    header('location:' . HOMEURL . 'reciever/login.php');
}
?>