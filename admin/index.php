
<?php
session_start();
require '../users/users.php';
?>
<?php

if(isset($_SESSION['yonetici_adi']))
{
    header('location:admin.php');
}else{
    include_once '../header-footer/header.php';
    include_once '../login/loginForm.php';
    include_once '../header-footer/footer.php';
}

?>


