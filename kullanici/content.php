<style>
div.col-sm-6{
    margin:0% 0% 1% 0%;
}
.card-body{
    text-align:center;
    background-color:#70cbde;
}
.detay{
    position:absolute;
    left:90%;
    top:65%;
}

</style>
<?php
session_start();
include_once 'header.php';
include_once '../db/baglan.php';

if(isset($_GET['search'])&&!empty($_GET['search']))
{
   $search=dataControl($_GET['search']);
   $veri = $db->prepare("SELECT * FROM `videolar` WHERE title LIKE '%$search%'"); 
   $veri->execute();
   $dizi = $veri->fetchAll(PDO::FETCH_ASSOC);
   $size=sizeof($dizi);
}elseif(isset($_GET['search'])&& $_GET['search']=="")
{
    $hata= 'Lütfen boş yapmayınız';
}    





function dataControl($data)
{
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
}

function dizideBul($array,$anahtar)
{
        
        foreach($array as $key=>$val)
        {
        if($key===$anahtar)
        {
            return $val;
        }elseif(is_array($val))
        {
            $t=dizideBul($val,$anahtar);
            return $t;
        }
        
        }              
    
    return "ARRAYDE <u> $anahtar </u> ANAHTARI BULUNAMADI! ";
}
 
?>


<div class="container-fluid">
    <div class="row" style="margin:1% 0% 1% 42%">    
        <form action="" method="get">
            <input type="text" name="search" value="<?php isset($_GET['search']) && $_GET['search']!="" ? print $_GET['search'] : $a="Ara"; ?>" placeholder="<?php isset($a) ? print $a : print "" ;?>" autocomplete="off" >
            <button type="submit">Ara</button>
            <?php isset($hata) ? print '<p style="color:red; font-weight:bold">'.$hata.'</p>' : $hata=""; ?>
        </form>
        
    </div>
    
</div>

<div class="container">
  <div class="row">
  <div class="col-md-12" style="height:5%; color:green; font-weight:bold;">
    <?php isset($size)&& $size!=0?print $size.' Sonuç bulundu.':$size=0 ?>
  </div>
     <?php
if(isset($_GET['search'])&&!empty($_GET['search']))
{

        if(isset($dizi) && !empty($dizi))
    {    

        for($i=0;$i<sizeof($dizi);$i++)
        {
            $id=dizideBul($dizi[$i],'videoId');
            $title=dizideBul($dizi[$i],'title');
            $img=dizideBul($dizi[$i],'img');
            $aciklama=dizideBul($dizi[$i],'aciklama');
            $izlenme=dizideBul($dizi[$i],'izlenme');
            $likeSayisi=dizideBul($dizi[$i],'likeSayisi');
            $dislike=dizideBul($dizi[$i],'dislike');
            $yorum=dizideBul($dizi[$i],'yorum');
            echo '<div class="col-md-12 " style="display:inherit; margin-bottom:2%">';
                echo '<div class="col-md-3">';
                    echo '<a href="">';    
                        echo '<img src="'; 
                            print $img;
                        echo '"width="100%"; height="175px">';                    
                    echo '</a>';
                echo '</div>';

                echo '<div class="col-md-9 " style="height: 18%; background-color:#eeeeee;">';
                    echo '<p style="font-size:17px; font-weight:bold;  margin-top:1%;">';   print $title;   echo'</h5>';
                    echo '<p style=" font-size:14px">'; isset($aciklama) && $aciklama!="" ? print $aciklama."..." : print '<b>Bu videoya ait açıklama bulunamadı!</b>'; echo'</p>';
                    echo '<form action="../detay.php" method="post">';
                        echo '<input  type="hidden" autocomplete="off"; name="id" value="'; print $id;  echo'">';    
                        echo '<button type="submit" class="btn btn-secondary detay">'; 
                            print 'DETAY';  
                        echo '</button>';
                    echo '</form>';
                    echo '<table class="table bg-secondary table-sm" style="color:#ffc107; font-size:12px; text-align:center; width:83%;margin-top:1%;">';
                    echo '<thead>';
                    echo ' <tr>';
                    echo '<th scope="col">';  print 'İZLENME SAYISI';    echo'</th>';
                                echo '<th scope="col">'; print 'LİKE SAYISI';  echo '</th>';
                                echo '<th scope="col">'; print 'DİSLİKE SAYISI';   echo '</th>';
                                echo '<th scope="col">'; print 'YORUM SAYISI'; echo '</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            echo '<tr>';
                            echo '<td scope="row">'; isset($izlenme) ? print $izlenme : $izlenme=0;  echo '</th>';
                            echo '<td>'; isset($izlenme) ? print $likeSayisi : $likeSayisi=0; echo '</td>';
                            echo '<td>'; isset($dislike) ? print $dislike : $dislike=0; echo '</td>';
                            echo '<td>';  isset($yorum) ? print $yorum : $yorum=0; echo '</td>';
                            echo '</tr>';
                            echo '</tbody>';
                            echo '</table>';
                echo '</div>';
                             
            echo '</div>';
        };
        
    }else{
       echo '<p style="color:red; font-weight:bold;">';
            echo 'Sonuç bulunamadı';
       echo '</p>';
    }



}










     ?>
  </div>
</div>

<?php
include_once 'footer.php';
$db=null;
?>