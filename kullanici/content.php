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
    $sayfa="";
    $search=dataControl($_GET['search']);
    if(isset($_GET['sayfalar']))
    {
        $sayfa=$_GET['sayfalar'];
    }
    $sayfa_limiti=3;
    $row=$db->query("SELECT * FROM videolar WHERE title LIKE '%$search%'")->rowCount();
    if(!isset($sayfa) || $sayfa=="" )
    {
        $sayfa=0;
    }else{
        $sayfa=($sayfa*$sayfa_limiti)-$sayfa_limiti;
    }
   $veri = $db->prepare("SELECT * FROM `videolar` WHERE title LIKE '%$search%' LIMIT " . $sayfa . "," . $sayfa_limiti); 
   $veri->execute();
   $dizi = $veri->fetchAll(PDO::FETCH_ASSOC);
   $size=sizeof($dizi);
   $sayfa_sayisi2=ceil($row / $sayfa_limiti );
};


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
    <div class="row" style="margin:2% 0% 0% 0%">    
        <div class="container bg-light" style="display:inline-block" >
        <form style="margin:1% 0% 1% 0%;" action="" method="get">
            <div class="col-md-12" style="display: inline-flex;">   
                <div class="input-group col-md-5 ml-auto mr-auto">
                    <input type="text"  name="search"  class="form-control" value="<?php isset($_GET['search']) && $_GET['search']!="" ? print $_GET['search'] : $a="Ara"; ?>" placeholder="<?php isset($a) ? print $a : print "" ;?>" autocomplete="off" >
                    <input type="hidden" name="sayfalar"  class="form-control" value="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Ara</button>
                    </div>
                </div>
         <?php isset($hata) ? print '<p style="color:red; font-weight:bold">'.$hata.'</p>' : $hata=""; ?>
              
                <div>
                    <a class="btn btn-warning" href="../admin/">Admin Panel</a>
                </div>
            </div>
        </form>
        </div>
    </div>
    
</div>

<div class="container mt-4">
  <div class="row">
  
     <?php
if(isset($_GET['search'])&&!empty($_GET['search']))
{
        echo '<div class="col-md-12" style="height:5%; color:green; font-weight:bold;">';
        isset($size)&& $size!=0 && !empty($_GET['search']) ? print $row.' tane videodan '. ($sayfa+1).'--'.($sayfa+$size) .' arası video listeleniyor.':$size=0 ;
        echo '</div>';
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
                        echo '<img src="'; 
                            print $img;
                        echo '"width="100%"; height="175px">';                    
                echo '</div>';

                echo '<div class="col-md-9 " style="height: 175px; background-color:#eeeeee;">';
                    echo '<p style="font-size:17px; font-weight:bold;  margin-top:1%; margin-bottom:3px">';   print $title;   echo'</h5>';
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
        <div class="container">
            <div class="col " style="float:right; font-weight:bold;">
            <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end" style="height: 38px;">
        
            <?php
                if(isset($sayfa_sayisi2))
                {
                    $sayfa_sayisi2=$sayfa_sayisi2;
                }else{
                    $sayfa_sayisi2=0;
                }


            for($i=1;$i<=$sayfa_sayisi2;$i++)
            {
                echo'<li class="page-item"><a class="page-link mt-3 mb-0" href="content.php?search=';isset($_GET['search'])? print $_GET['search']:$_GET['search']==""; echo'&sayfalar=';print $i; echo'">'; print $i; echo'</a> </li>';
            
            }

            ?>
            
        </ul>
        </nav>
            </div>
        </div>

  </div>
</div>








<div class="container" style="margin-top:-3%" >

  <div class="row">
  
     <?php

    if(!isset($_GET['search']) || empty($_GET['search']) )
    {
        


    $sayfa="";
    if(isset($_GET['sayfa']))
    {
        $sayfa=$_GET['sayfa'];
    }
    $sayfa_limiti=3;
    $row=$db->query("SELECT * FROM videolar")->rowCount();
    if(!isset($sayfa) || $sayfa=="" )
    {
        $sayfa=0;
    }else{
        $sayfa=($sayfa*$sayfa_limiti)-$sayfa_limiti;
    }

    $sorgu=$db->prepare("SELECT videoId,title,img,aciklama,izlenme,likeSayisi,dislike,yorum FROM videolar WHERE `no`   LIMIT " . $sayfa . "," . $sayfa_limiti);
    $sorgu->execute();
    $dbsearch= $sorgu->fetchAll(PDO::FETCH_ASSOC);
    $length=sizeof($dbsearch);
    $sayfa_sayisi=ceil($row / $sayfa_limiti );
        
        echo '<div class="col-md-12" style="height:5%; color:green; font-weight:bold;">';
        isset($length)&& $length!=0 && empty($_GET['search']) ? print $row.' tane videodan '. ($sayfa+1).'--'.($sayfa+$length) .' arası video listeleniyor.':$length=0 ;
        echo '</div>';

        for($i=0;$i<$length;$i++)
        {
            
            $id=dizideBul($dbsearch[$i],'videoId');
            $title=dizideBul($dbsearch[$i],'title');
            $img=dizideBul($dbsearch[$i],'img');
            $aciklama=dizideBul($dbsearch[$i],'aciklama');
            $izlenme=dizideBul($dbsearch[$i],'izlenme');
            $likeSayisi=dizideBul($dbsearch[$i],'likeSayisi');
            $dislike=dizideBul($dbsearch[$i],'dislike');
            $yorum=dizideBul($dbsearch[$i],'yorum');
            echo '<div class="col-md-12 " style="display:inherit; margin-bottom:2%">';
                echo '<div class="col-md-3">';
                        echo '<img src="'; 
                            print $img;
                        echo '"width="100%"; height="175px">';                    
                echo '</div>';

                echo '<div class="col-md-9 " style="height: 175px; background-color:#eeeeee;">';
                    echo '<p style="font-size:17px; font-weight:bold;margin-top:1%; margin-bottom:3px">';   print $title;   echo'</p>';
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
    }
?>
<div class="container">
    <div class="col " style="float:right; font-weight:bold;">
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
  
     <?php
        if(isset($sayfa_sayisi))
        {
            $sayfa_sayisi=$sayfa_sayisi;
        }else{
            $sayfa_sayisi=0;
        }


    for($i=1;$i<=$sayfa_sayisi;$i++)
    {
        echo'<li class="page-item"><a class="page-link mt-3 mb-0" href="?sayfa=';print $i;  echo'">'; print $i; echo'</a> </li>';
     
    }

    ?>
    
  </ul>
</nav>
    </div>
</div>

<?php
include_once 'footer.php';
$db=null;
?>
