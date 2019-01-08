<?php
if(!$_SESSION['yonetici_adi'])
{
    header('location:../index.php');
}
?>
<?php
?>
    
    <?php

    if(isset($_POST['ara']))
    {
        $url=dataControl($_POST['videoLink']);
        if(empty($url))
        {
            $hata= 'Lütfen Bir youtube videosu link\'i giriniz...';
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
        if(isset($link) && sizeof($link['items'])===1)
        {
            $_SESSION['videoLink']=$_POST['videoLink'];
            $_SESSION['channelID']=arraydeBul($link,'channelId');
            $_SESSION['videoId']=arraydeBul($link,'id');
            $_SESSION['title']=arraydeBul($link,'title');
            $_SESSION['imgUrl']=$link['items'][0]['snippet']['thumbnails']['high']['url'];
            $_SESSION['aciklama']=arraydeBul($link,'description');
            $_SESSION['goruntulenme_sayisi']=$link['items'][0]['statistics']['viewCount'];
            $_SESSION['like_sayisi']=$link['items'][0]['statistics']['likeCount'];
            $_SESSION['disLike_sayisi']=$link['items'][0]['statistics']['dislikeCount'];
            $_SESSION['yorum_sayisi']=$link['items'][0]['statistics']['commentCount'];
        }

    }elseif(isset($_POST['kayit']))
    {
       if(isset($_SESSION['videoId']))
       {
           header('Location:../db/insert.php');
       }else{
           $hata='HATA! Lütfen geçerli bir youtube videosu link\'i giriniz... ';
       }
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
            
            return FALSE;
          
        };
        
        function videoİd ($url)
        {
            $id=parse_url($url,PHP_URL_QUERY);
            return $id;
        }
    ?>
    