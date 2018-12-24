<?php
if(!$_SESSION['yonetici_adi'])
{
    header('location:../index.php');
}
?>
<?php

    try {
        $db = new PDO("mysql:host=localhost;dbname=ytvideolar;charset=utf8", "serhat", "");
   } catch ( PDOException $e ){
        print $e->getMessage();
   }
?>