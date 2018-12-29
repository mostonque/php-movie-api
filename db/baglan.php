<?php
?>
<?php
$host='localhost';
$dbname='ytvideolar';
$ID='serhat';
$pw='';
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $ID, $pw);
   } catch ( PDOException $e ){
        print $e->getMessage();
   }
?>