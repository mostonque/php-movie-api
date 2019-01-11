<?php
session_start();
?>
<?php

ob_start();
if(!$_SESSION['yonetici_adi'])
{
    header('location:index.php');
}
?>

<?php
require_once '../header-footer/header.php';
require_once 'adminController.php';
?>

<?php
    require_once '../header-footer/content.php';
?>
    


<?php
require_once '../header-footer/footer.php';
?>