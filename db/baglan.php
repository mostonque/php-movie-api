<?php

    try {
        $db = new PDO("mysql:host=localhost;dbname=ytvideolar;charset=utf8", "serhat", "");
        if($db){
            echo 'bağladınız';
        }
   } catch ( PDOException $e ){
        print $e->getMessage();
   }
?>