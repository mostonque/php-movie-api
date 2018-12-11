<?php
session_start();
require 'users.php';
?>
<?php

if(isset($_SESSION['yonetici_adi']))
{
    include_once 'admin.php';
}else{
    include_once 'admin-login.php';
}

?>


