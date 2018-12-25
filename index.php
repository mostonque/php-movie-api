
<?php
session_start();
require './users/users.php';
?>
<?php

if(isset($_SESSION['yonetici_adi'])&& $_SESSION['yonetici_adi']==$uye['yonetici_adi'])
{
    header('location:./admin/admin.php');
}else{
    include_once './login/loginForm.php';
}

?>


