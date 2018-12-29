<?php
$id=$_POST['id'];
?>

<div class="container">
        <div class="col-md-6" style="margin-left:30%">
        <a href="./kullanici/content.php">Anasayfa</a> 
            <br> 
            <br>
            <iframe width="700" height="400" src="https://www.youtube.com/embed/<?php print $id; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
</div>
