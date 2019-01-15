<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <link href="./style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   	<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
   	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
<?php
    if(isset($_POST['submit']))
    {
       $telefon=$_POST['telefon'];
       $ad=isset($_POST['ad']) && !empty($_POST['ad']) && trim($_POST['ad']) ? $ad=$_POST['ad'] : $hata="Lütfen adınızı giriniz.!" ;
       $email=isset($_POST['email']) && !empty($_POST['email'])&& trim($_POST['email']) ? $email=$_POST['email'] : $hata="Lütfen E-mail alanını doldurunuz.!";
       $telefon=isset($_POST['telefon']) && is_numeric($_POST['telefon']) && !empty($_POST['telefon']) && strlen((string)$_POST['telefon'])===11 ? $telefon=$_POST['telefon'] : $hata="Lütfen telefon numaranızı kontrol ediniz. 11 haneli olmasına özen gösteriniz!";
       $mesaj=isset($_POST['mesaj']) && !empty($_POST['mesaj'])&& trim($_POST['mesaj']) ? $mesaj=$_POST['mesaj'] : $hata="Lütfen Mesaj giriniz.!";
       
       if(!isset($hata)){
            $kime='mertfender123@gmail.com';
            $gonderen_ad=$ad;
            $gonderen_mail=$email;
            $gonderen_telefon= $telefon;
            $gonderen_mesaj=$mesaj;

            $konu="[!] ZİYARETCİ MESAJI";
            $mesaj="Web sitenizden gönderilen mesaj aşağıdadır.
            <br>        
            ============================================== <br>
            <b>Gönderen adı: </b>".$gonderen_ad."<br>
            <b>Gönderen mail adresi: </b>".$gonderen_mail."<br>
            <b>Gönderen telefon numarası: </b>".$gonderen_telefon."<br>
            <b>Gönderen mesajı: </b>".$gonderen_mesaj."<br>
            ============================================== <br>";
            
            
            $mesaj = '<html><body style="margin-left:22%">';
            $mesaj .= '<img src="http://sepekedis.tk/mail-gonder/header.png"/>';
            $mesaj .= '<table rules="all" style="border-color: #666; min-width: 800px; max-width: 800px;" cellpadding="10">';
            $mesaj .= "<tr style='background: #eee;'><td><strong>Gönderen adı:</strong> </td><td>" . strip_tags($gonderen_ad) . "</td></tr>";
            $mesaj .= "<tr><td style='width:210px'><strong>Gönderen mail adresi:</strong> </td><td>" . strip_tags($gonderen_mail) . "</td></tr>";
            $mesaj .= "<tr><td style='width:210px'><strong>Gönderen telefon numarası:</strong> </td><td>" . strip_tags($gonderen_telefon) . "</td></tr>";
            $mesaj .= "<tr><td style='width:210px'><strong>Gönderen mesajı:</strong> </td><td>" . strip_tags($gonderen_mesaj) . "</td></tr>";
            $mesaj .= "</table>";
            $mesaj .= '<img src="http://sepekedis.tk/mail-gonder/header.png"/>';
            $mesaj .= "</body></html>";
            
            
            // HTML eposta göndermek için, the Content-type başlığı belirtilmeli

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8"' . "\r\n";
            $headers .= 'From: '.$gonderen_ad.' <'.$gonderen_mail.'>' . "\r\n";    
            
            if(mail($kime,$konu,$mesaj,$headers)){
                $basarili="Mesajınız iletilmiştir. Anasayfaya yönlendiriliyorsunuz.";
                unset($_POST);
                echo ('<meta http-equiv="refresh" content="2 url=http://sepekedis.tk/">');
                
            }else{
                $hata="Mail gönderilirken sorun oluştu!";
            }

       }


    }






?>


<section id="contact">
			<div class="section-content">
				<h1 class="section-header">Bizimle<span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> İletişime geçin</span></h1>
                <h3>Şikayet ve önerilerinizi aşağıda ki formu doldurarak bizlere iletebilirsiniz.</h3>
                <h3 style="color:#fcc500;">
                    <?php if(isset($hata)){print $hata;}elseif(isset($basarili)){print $basarili;} ?></h3>

			</div>
			<div class="contact-section">
			<div class="container">
				<form action="" method="POST">
					<div class="col-md-6 form-line">
			  			<div class="form-group">
			  				<label for="exampleInputUsername">A d ı n ı z &emsp; <span style="color:#bdc724">( G e r e k l i )</span></label>
					    	<input name="ad" type="text" class="form-control" id="ad" value="<?php isset($_POST['ad'])?print $_POST['ad']:print ""; ?>"  placeholder="Adınızı giriniz...">
				  		</div>
				  		<div class="form-group">
					    	<label for="exampleInputEmail">E m a i l&emsp;A d r e s i n i z&emsp; <span style="color:#bdc724">( G e r e k l i )</span></label>
					    	<input name="email" type="email" class="form-control" id="exampleInputEmail" value="<?php isset($_POST['email'])?print $_POST['email']:print ""; ?>" placeholder="E-mail adresinizi giriniz...">
					  	</div>	
					  	<div class="form-group">
					    	<label for="telephone">T e l e f o n&emsp;N u m a r a n ı z&emsp; <span style="color:#bdc724">( G e r e k l i )</span></label>
                            <input name="telefon" type="tel"  class="form-control" id="telephone" value="<?php isset($_POST['telefon']) ? print $_POST['telefon'] : print ""; ?>" placeholder="telefon numaranızı giriniz...">
			  			</div>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="form-group">
			  				<label for ="description"> M e s a j ı n ı z&emsp; <span style="color:#bdc724">( G e r e k l i )</span></label>
			  			 	<textarea name="mesaj" class="form-control" id="description"  placeholder="Mesajınızı giriniz"><?php isset($_POST['mesaj'])?print $_POST['mesaj']:print ""; ?></textarea>
			  			</div>
			  			<div>
                            <input type="hidden" name="submit" value="1">
			  				<button type="submit" class="btn btn-default submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i> Mesaj gönder</button>
			  			</div>
			  			
					</div>
				</form>
			</div>
        </section>

