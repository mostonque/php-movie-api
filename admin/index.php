<?php
session_start();
?>
<?php
error_reporting(E_ALL); ini_set('display_errors', 'On');

ob_start();
require_once '../users/users.php';
if(isset($_SESSION['yonetici_adi']))
{
    header('location:admin.php');
}else{
    include_once '../header-footer/header.php';
    include_once '../login/loginForm.php';
    include_once '../header-footer/footer.php';
}

?>


