
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
        header('Location:giris-controller.php');
    }

}

?>

<?php
if(isset($hata))
{
    echo $hata;
}
?>



<form action="" method="POST">
Yönetici adı: <br>
<input type="text" name="yonetici_adi">
<hr>
Şifre: <br>
<input type="password" name="sifre">
<input type="hidden" name="submit" value="1">
<button type="submit">Gönder</button>

</form>



