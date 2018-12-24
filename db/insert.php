<?php
session_start();
if(!$_SESSION['yonetici_adi'])
{
    header('location:index.php');
}
?>
<?php

require_once 'baglan.php';

function trimAciklama($data){
    if(isset($data)){
        if(strlen($data)>255)
        {
            $data=substr($data,0,255);
        }else {
            $data=$data;
        }
        return $data;
    }else{
      return $data;
    }
}

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
    $_SESSION['aciklama']=trimAciklama($_SESSION['aciklama']),
    $_SESSION['imgUrl'],
    $_SESSION['goruntulenme_sayisi'],
    $_SESSION['like_sayisi'],
    $_SESSION['disLike_sayisi'],
    $_SESSION['yorum_sayisi']
));
if($insert){
    print 'Kayıt işlemi başarılı';
}else{
    print 'HATA! Bu video daha önceden veri tabanına kaydedilmiştir.';
}
?>
&emsp;&emsp;<a href="../index.php">ANASAYFA</a> <a href="../cikis.php">[ÇIKIŞ]</a><br>

