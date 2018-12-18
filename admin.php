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
    require_once './db/baglan.php';


    if(isset($_POST['submit']))
    {
        $url=$_POST['videoLink'];
        if(empty($url))
        {
            $hata= 'Lütfen link giriniz';
        }elseif(strlen($url)<32)
        {
            $hata= 'Girilen link olaması gerekenden kısadır. Lütfen kontrol ediniz!';
        }
        else{
            

            $apiKey='AIzaSyCXZs_BvOIkLuMRK-gxxlht15CJNGrp-Hk';
            $urlid=videoİd($url); 
            $urlid=substr($urlid,2,11);
            $link='https://www.googleapis.com/youtube/v3/videos?id='.$urlid.'&key='.$apiKey.'&fields=items(id,snippet(channelId,title,thumbnails,description,categoryId),statistics)&part=snippet,statistics';
            $link=json_decode(file_get_contents($link),true);
            $channelID=arraydeBul($link,'channelId');
            $id=arraydeBul($link,'id');
            $title=arraydeBul($link,'title');
            $aciklama=arraydeBul($link,'description');
            $imgUrl=$link['items'][0]['snippet']['thumbnails']['high']['url'];
            $goruntulenme_sayisi=$link['items'][0]['statistics']['viewCount'];
            $like_sayisi=$link['items'][0]['statistics']['likeCount'];
            $disLike_sayisi=$link['items'][0]['statistics']['dislikeCount'];
            $yorum_sayisi=$link['items'][0]['statistics']['commentCount'];
             
           
        }
    }
    

        function arraydeBul($array,$anahtar)
        {
                
                foreach($array as $key=>$val)
                {
                if($key===$anahtar)
                {
                    return $val;
                }elseif(is_array($val))
                {
                    $t=arraydeBul($val,$anahtar);
                    return $t;
                }
                
                }              
            
            return "ARRAYDE <u>$anahtar</u> ANAHTARI BULUNAMADI! ";
        }
        
        function videoİd ($url)
        {
            $id=parse_url($url,PHP_URL_QUERY);
            return $id;
        }
    ?>
    

    


    
<div class="container-fluid">
    <div class="col-md-3 " style="float:none; margin:1% auto; text-align:center; background-color:#dfe8e8; padding:0.3%">
    <form action="" method="post">
        Youtube Video Link'ini Giriniz: <br>
        <input type="text" name="videoLink" autocomplete="off">
        <input type="hidden" name="submit" value="1">
        <button class="btn btn-info"  id="ara" type="submit">ARA</button> <button class="btn btn-warning " type="submit" >KAYDET</button> |<a href="cikis.php">[ÇIKIŞ]</a> <br>
        <?php
            isset($hata) ? print $hata : $hata="";
        ?>
    </form>  
    </div>
    
</div>
  
<div id="alan" style="">

<div class="container-fluid videoAlan" >
    <div class="col-md-6 d-inline-block " >
        <div class="col-md-12">
            <h3 class="title"> <?php isset($title) ? print $title : $title="" ?> </h3> 
            
        </div>   
        <div class="col-md-12 " style="margin:5% 0% 2% 9%" >
            <img src=" <?php isset($imgUrl) ? print $imgUrl : $imgUrl="" ?> " width="80%"; height="30%";> 
            
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
                        <td scope="row"> <?php isset($goruntulenme_sayisi) ? print $goruntulenme_sayisi : $goruntulenme_sayisi=" "; ?> </th>
                        <td><?php isset($like_sayisi)? print $like_sayisi : $like_sayisi="";?></td>
                        <td><?php isset($disLike_sayisi)? print $disLike_sayisi : $disLike_sayisi="";?></td>
                        <td><?php isset($yorum_sayisi)? print $yorum_sayisi : $yorum_sayisi="";?></td>
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
        if(isset($aciklama)){
            if(strlen($aciklama)>255)
            {
                print substr($aciklama,0,255).'...';
            }else{
            
                print $aciklama;
            }
        }else{
            $aciklama="";
        }
        echo '</p>';
        ?>
        </div>
    </div>
   
</div>


</div>


</body>
</html>