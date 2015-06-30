<?php
session_start();
session_destroy();
$_SESSION['id'] = 123;
$_SESSION['password'] = '24584';
require('form_login_common.php');
?>

