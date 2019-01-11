
<?php
$host='localhost';
$dbname='id8433861_ytvideolar';
$ID='id8433861_serhat';
$pw='A4techviole.,';
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $ID, $pw);
   }catch ( PDOException $e ){
     if(!isset($db))
     {
          echo '<div class="col-md-4" style="text-align:center; margin: 10% 0% 0% 33%; background-color:#dadada; padding:1%; font-size:20px" > ';
          echo '<img width="35%" src="../db/warning.png"></img><br>';
          echo '<br>';
          print '<b>HATA!</b> Veritabanı bağlantısında hata oluştu.'."<br>";
          print $e->getMessage();
          echo '</div>';
          die();
     }
   }
?>