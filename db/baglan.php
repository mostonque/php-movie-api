<?php
try{
    $db=new PDO("mysql:host=localhost;dbname=videolar;charset=utf8",'serhat','');
    
    }
    catch(PDOException $e)
    {
        echo 'ERROR: '.$e->getmessage();
        die();
    }
    
?>