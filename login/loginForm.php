
<?php

if(isset($_POST['submit']))
{
    $yonetici_adi=$_POST['yonetici_adi'];
    $sifre=$_POST['sifre'];

    if(!$yonetici_adi || !$sifre)
    {
        $hata='Tüm alanları doldurunuz!';
    }elseif($yonetici_adi != $uye['yonetici_adi'])
    {
        $hata='Kullanıcı adı hatalı';
    }elseif($sifre != $uye['sifre'])
    {
        $hata='Şifreniz hatalı';
    }else
    {
        $_SESSION['yonetici_adi'] = $uye['yonetici_adi'];
        header('location:./admin.php');
    }

}

?>

<?php
if(isset($hata))
{
    echo $hata;
}
?>


<div class="container">
    <div class="row">
        <div class="col-md-4" style="margin: 10% 0% 0% 42%; background-color:red; ">        
            <form action="" method="POST">
            Yönetici adı: <br>
            <input type="text" name="yonetici_adi">
            <br>
            Şifre: <br>
            <input type="password" name="sifre">
            <input type="hidden" name="submit" value="1">
            <button type="submit" >Gönder</button>
            </form>
        </div>
    </div>
</div>

