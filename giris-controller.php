<?php
session_start();
require 'users.php';
?>
<?php

if(isset($_SESSION['yonetici_adi']))
{
    header('location:admin.php');
}else{
    include_once 'admin-login.php';
}

?>


