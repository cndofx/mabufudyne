<html>
    <head>
    <link rel="stylesheet" href="gallery.css">
    </head>
    <body>
<h1>search results</h1>
<?php
include '/home/mabufudy/db.php';
$searchtags=$_POST['searchtags'];
print_r($searchtags);
$sql="select images.filepath from tags inner join images on images.imageid = tags.imageid where tags.tag='$searchtags'";
$result=$db->query($sql); 
?>
<div class="image-columns">
<?php
while ($row=mysqli_fetch_assoc($result)){
        ?>
        <img src="/<?php echo $row['filepath'];?>">
        <?php
    }   
?>
</div>
</body>
</html>