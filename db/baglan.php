<?php
try{
    $db=new PDO("mysql:host=localhost;dbname=videolar;charset=utf8",'serhat','');
    if($db)
    {
        echo 'baglandınız';
    }else{
        echo 'baglanamadınız!';
    }
    }
    catch(PDOException $e)
    {
        echo 'ERROR: '.$e->getmessage();
        die();
    }
    
?>