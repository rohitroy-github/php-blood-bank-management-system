<?php
include '../constants.php';

// Destroy the 'user' session !

session_destroy();

//Redirect

header('location:' . HOMEURL . '');
?> 

<?php $_SESSION['logout'] = 'Logout Successfull !'; ?>

