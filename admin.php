
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
        $link='https://www.googleapis.com/youtube/v3/videos?id='.$urlid.'&key='.$apiKey.'&fields=items(id,snippet(channelId,title,categoryId),statistics)&part=snippet,statistics';
        echo $link;
    }
}
    
    function videoİd ($url)
    {
        $id=parse_url($url,PHP_URL_QUERY);
        return $id;
    }
?>


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
    <button type="submit">ARA</button>
    
    </form>
    <?php
    
    if(isset($hata))
    {
        echo $hata;
    }
    
    ?>

</body>
</html>