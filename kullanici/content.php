<style>
div.col-sm-6{
    margin:0% 0% 1% 0%;
}
.card-body{
    text-align:center;
    background-color:rgb(130, 121, 109);
}

</style>
<?php
session_start();
include_once 'header.php';
include_once '../db/baglan.php';

if(isset($_GET['search'])&&!empty($_GET['search']))
{
   $search=$_GET['search'];
   $veri = $db->prepare("SELECT * FROM `videolar` WHERE title LIKE '$search%'"); 
   $veri->execute();
   $dizi = $veri->fetchAll(PDO::FETCH_ASSOC);
   
}else{
    $hata= 'HATA! ARAMA ALANINI DOLDURUNUZ.';
}
if(isset($dizi) && !empty($dizi))
{
    for($i=0;$i<=sizeof($dizi)-1;$i++)
    {
        var_dump(sizeof($dizi));
        var_dump($dizi[$i]) ;
    };
    /*
    $title=dizideBul($dizi,'title');
    $img=dizideBul($dizi,'img');
    $aciklama=dizideBul($dizi,'aciklama');
    $izlenme=dizideBul($dizi,'izlenme');
    $likeSayisi=dizideBul($dizi,'likeSayisi');
    $dislike=dizideBul($dizi,'dislike');
    $yorum=dizideBul($dizi,'yorum');
    */
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
            <input type="text" name="search" autocomplete="off" >
            <button type="submit">Ara</button>
        </form>
    </div>
</div>

<div class="container-fluid">
  <div class="row">
  <div class="col-sm-1">
  
  </div>
    <div class="col-sm-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?php isset($title) ? print $title : $title="";  ?></h5>
          <img src=" <?php isset($img) ? print $img : $img=""; ?> " width="50%"; height="34%";>
          <div class="col-sm-8" style="margin: 2% 0% 2% 17%;" >
          <p style="color:rgba(255, 254, 254, 0.61)" class="card-text"><?php isset($aciklama) && !$aciklama=="" ? print $aciklama.'...' :print "Bu videoya açıklama eklenmemiştir."; ?></p>
          </div>
          <table class="table table-Secondary table-sm " style="text-align: center;">
                <thead>
                <tr>
                    <th scope="col">İzlenme sayısı</th>
                    <th scope="col">Like sayısı</th>
                    <th scope="col">Dislike sayısı</th>
                    <th scope="col">Yorum Sayısı</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"> <?php isset($izlenme) ? print $izlenme :print 0; ?> </th>
                        <td><?php isset($likeSayisi)? print $likeSayisi  : print 0;?></td>
                        <td><?php isset($dislike)? print $dislike : print 0;?></td>
                        <td><?php isset($yorum)? print $yorum : print 0;?></td>
                    </tr>
                </tbody>
            </table>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    
    <div class="col-sm-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
</div>
</div>

<?php
include_once 'footer.php';
?>