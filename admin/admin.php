<?php
if(!$_SESSION['yonetici_adi'])
{
    header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
</head>
<body>

<?php
include_once './admin/adminController.php';

?>
    
<div class="container-fluid " style="background-color:#145558">
        <div class="col-md-3 d-inline-block" style="float:none; margin:1% 1% 1% 34%; text-align:center; background-color:#dfe8e8; padding:0.3%"> 
                <form action="" method="post">
                    Youtube Video Link'ini Giriniz: <br>
                    <input style="width:67%" type="text"  name="videoLink" autocomplete="off" value="<?php isset($_SESSION['videoLink'])?print $_SESSION['videoLink'] : $_SESSION['videoLink']=""; ?>" />
                   
                    <button style="margin:0% 2% 0% 2%" class="btn btn-info"  name="ara" type="submit">ARA</button>| <a href="cikis.php">[ÇIKIŞ]</a> <br>
                    <?php
                        isset($hata) ? print $hata : $hata="";
                    ?>
                </form>  
        </div>
            <div class="d-inline-block">
                <form action="" method="post">
                <button class="btn btn-warning " name="kayit" type="submit" >KAYDET</button> 
                </form>
            </div>
</div>
  
<div id="alan" >

<div class="container-fluid videoAlan" >
    <div class="col-md-6 d-inline-block " >
        <div class="col-md-12">
            <h3 class="title"> <?php isset($_SESSION['title']) ? print $_SESSION['title'] : $_SESSION['title']=""; ?> </h3> 
            
        </div>   
        <div class="col-md-12 " style="margin:5% 0% 2% 9%" >
            <img src=" <?php isset($_SESSION['imgUrl']) ? print $_SESSION['imgUrl'] : $_SESSION['imgUrl']=""; ?> " width="80%"; height="30%";> 
            
        </div>
        <div class="col-md-12" >
                
            <table class="table table-light table-sm table-striped" style="text-align: center;">
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
                        <td scope="row"> <?php isset($_SESSION['goruntulenme_sayisi']) ? print $_SESSION['goruntulenme_sayisi'] :$_SESSION['goruntulenme_sayisi']=""; ?> </th>
                        <td><?php isset($_SESSION['like_sayisi'])? print $_SESSION['like_sayisi']  : $_SESSION['like_sayisi']="";?></td>
                        <td><?php isset($_SESSION['disLike_sayisi'])? print $_SESSION['disLike_sayisi'] : $_SESSION['disLike_sayisi']="";?></td>
                        <td><?php isset($_SESSION['yorum_sayisi'])? print $_SESSION['yorum_sayisi'] : $_SESSION['yorum_sayisi']="";?></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
    
    
    <div class="col-md-5 d-inline-block" style="margin-left:8%; padding:2%;" >
        <div class="col" style="background-color:#edfffdb3; padding:3%" >
        <?php
        echo "<h3 style='border: 2px ridge #10735f4d; text-align: center; color: #145558; padding:2%;'>AÇIKLAMA</h3>";
        echo '<p style="margin-top:5%; border:1px solid #5c9696; padding:2%">';
        if(isset($_POST['ara'])&& !empty($_POST['videoLink']))
        {
            if(isset($_SESSION['aciklama']) && !empty($_POST['videoLink'])&& !$_SESSION['aciklama']==""){
                if(strlen($_SESSION['aciklama'])>255)
                {
                    print substr($_SESSION['aciklama'],0,255).'...';    
                }else{
                    var_dump($_SESSION['aciklama']);
                    print $_SESSION['aciklama'];
                }
            }else if($_SESSION['aciklama']==""){
              return  print 'Bu videonun açıklaması yoktur';
            }
        }
        echo '</p>';
        ?>
        </div>
    </div>
   
</div>


</div>



</body>
</html>