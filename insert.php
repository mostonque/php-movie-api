<?php
session_start();
require_once './db/baglan.php';


$query = $db->prepare("INSERT INTO videolar SET
videoId=?,
title=?,
aciklama=?,
img=?,
izlenme=?,
likeSayisi=?,
dislike=?,
yorum=?");
$insert = $query->execute(array(
    $_SESSION['videoId'],
    $_SESSION['title'],
    $_SESSION['aciklama'],
    $_SESSION['imgUrl'],
    $_SESSION['goruntulenme_sayisi'],
    $_SESSION['like_sayisi'],
    $_SESSION['disLike_sayisi'],
    $_SESSION['yorum_sayisi']
));

?>
&emsp;&emsp;<a href="admin.php">ANASAYFA</a>
<?php


?>