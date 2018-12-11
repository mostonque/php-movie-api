


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



    <form action="" method="post">
    Youtube Video Link'ini Giriniz: <br>
    <input type="text" name="videoLink">
    <input type="hidden" name="submit" value="1">
    <button type="submit">ARA</button> | <a href="cikis.php">[ÇIKIŞ]</a>
    </form>

    <?php

    if(isset($_POST['submit']))
    {
        $url=$_POST['videoLink'];
        if(empty($url))
        {
            $hata= 'Lütfen link giriniz';
        }else{
            $apiKey='AIzaSyCXZs_BvOIkLuMRK-gxxlht15CJNGrp-Hk';
            $urlid=videoİd($url); 
            $urlid=substr($urlid,2,11);
            $link='https://www.googleapis.com/youtube/v3/videos?id='.$urlid.'&key='.$apiKey.'&fields=items(id,snippet(channelId,title,description,categoryId),statistics)&part=snippet,statistics';
            $encode=json_encode($link);
            var_dump($encode);
        }
    }
        
        function videoİd ($url)
        {
            $id=parse_url($url,PHP_URL_QUERY);
            return $id;
        }
    ?>


    
    <?php
    if(isset($hata)){ echo $hata; }
    ?>

</body>
</html>