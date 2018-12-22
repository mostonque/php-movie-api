<?php
session_start();

?>
    
    <?php

    if(isset($_POST['ara']))
    {
        $url=dataControl($_POST['videoLink']);
        if(empty($url))
        {
            $hata= 'Lütfen link giriniz';
        }elseif(strlen($url)<43)
        {
            $hata= 'Girilen link olaması gerekenden kısadır. Lütfen kontrol ediniz!';
        }elseif (strlen($url)>44){
            $hata= 'Girilen link olması gerekenden uzundur. Lütfen kontrol ediniz!';
        }
        else{
            $apiKey='AIzaSyCXZs_BvOIkLuMRK-gxxlht15CJNGrp-Hk';
            $urlid=videoİd($url); 
            $urlid=substr($urlid,2,11);
            $link='https://www.googleapis.com/youtube/v3/videos?id='.$urlid.'&key='.$apiKey.'&fields=items(id,snippet(channelId,title,thumbnails,description,categoryId),statistics)&part=snippet,statistics';
            $link=json_decode(file_get_contents($link),true);     
        };
        if(isset($link))
        {
            $_SESSION['videoLink']=dataControl($_POST['videoLink']);
            $_SESSION['channelID']=dataControl(arraydeBul($link,'channelId'));
            $_SESSION['videoId']=dataControl(arraydeBul($link,'id'));
            $_SESSION['title']=dataControl(arraydeBul($link,'title'));
            $_SESSION['aciklama']=dataControl(arraydeBul($link,'description'));
            $_SESSION['imgUrl']=dataControl($link['items'][0]['snippet']['thumbnails']['high']['url']);
            $_SESSION['goruntulenme_sayisi']=dataControl($link['items'][0]['statistics']['viewCount']);
            $_SESSION['like_sayisi']=dataControl($link['items'][0]['statistics']['likeCount']);
            $_SESSION['disLike_sayisi']=dataControl($link['items'][0]['statistics']['dislikeCount']);
            $_SESSION['yorum_sayisi']=dataControl($link['items'][0]['statistics']['commentCount']);
        }
    }elseif(isset($_POST['kayit']))
    {
       header('Location:insert.php');
    }




        function dataControl($data)
        {
            $data=trim($data);
            $data=htmlspecialchars($data);
            return $data;
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
            
            return "ARRAYDE <u> $anahtar </u> ANAHTARI BULUNAMADI! ";
        }
        
        function videoİd ($url)
        {
            $id=parse_url($url,PHP_URL_QUERY);
            return $id;
        }
    ?>
    