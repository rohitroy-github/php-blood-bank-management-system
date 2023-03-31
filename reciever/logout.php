<?php
include '../config/constants.php';

// Destroy the 'user' session !

session_destroy();

//Redirect

$_SESSION['logout-success'] = '<p>You have successfully logged out !</p>';

header('location:' . HOMEURL . '');
?> 


