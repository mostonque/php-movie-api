<style>
@import url(http://fonts.googleapis.com/css?family=Roboto:400);
body {
  background-color:#fff;
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
}

.container {
    padding: 25px;
    position: fixed;
}

.form-login {
    background-color: white;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px;
    border-color:#d2d2d2;
    border-width: 5px;
    box-shadow:0 1px 0 #cfcfcf;
}

h4 { 
 border:0 solid #fff; 
 border-bottom-width:1px;
 padding-bottom:10px;
 text-align: center;
}

.form-control {
    border-radius: 10px;
}

.wrapper {
    text-align: center;
}
.login-register {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    height: 100%;
    width: 100%;
    padding: 10% 0;
    position: fixed;
}
</style>
<?php

if(isset($_POST['submit']))
{
    $yonetici_adi=$_POST['yonetici_adi'];
    $sifre=$_POST['sifre'];

    if(!$yonetici_adi || !$sifre)
    {
        $hata='Tüm alanları doldurunuz!';
    }else
    {
        $query=$db->prepare("SELECT * FROM adminusers WHERE yoneticiAdi='$yonetici_adi' and sifre='$sifre' ");
        $query->execute();
        $query->fetchAll(PDO::FETCH_ASSOC);
        $count=$query->rowCount();
        if($count>0){
            $_SESSION['yonetici_adi'] = $_POST['yonetici_adi'];
            $hata='<p style="color:green; text-align:center">GİRİŞ BAŞARILI YÖNLENDİRİLİYORSUNUZ!</p>';
            header("refresh:2;url='./admin.php'");
        }else{
            $hata='Hatalı giriş. Tekrar deneyiniz';
        }
    }

}

?>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<section id="wrapper">
<div class="login-register" style="background-image:url(../login/login-register.jpg);">

<div class="container" >
    <div class="row">
        <div class="offset-9 col-md-3">
        <form action="" method="POST">
            <div class="form-login">
            <h4>Hoşgeldiniz</h4>
            <input type="text" name="yonetici_adi" id="userName" autocomplete="off" class="form-control input-sm chat-input" placeholder="Yönetici Adı" />
            <br>
            <input type="password"  name="sifre" id="userPassword" class="form-control input-sm chat-input" placeholder="Şifre" />
            <input type="hidden" name="submit" value="1">
            <br>
            <?php
                    if(isset($hata))
                    {
                        echo'<p style="color:red">'; echo $hata;echo'</p>';
                    }
                ?>
            <div class="wrapper">
            <span class="group-btn">     
                <button class="btn btn-warning btn-md" type="submit" >Giriş <i class="fa fa-sign-in"></i></button> &emsp;
                <button onclick="location.href='../' " class="btn btn-warning btn-md" type="button" >Anasayfa </i></button>
                
            </span>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>

</div>
</section>


