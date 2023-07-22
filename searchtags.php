<?php
include '/home/mabufudy/db.php';
$searchtags=$_POST['searchtag'];
$sql="select images.filepath from tags inner join images on images.imageid = tags.imageid where tags.tag='$searchtags'";
$result=$db->query($sql); 
if (isset($result)){
    $row=mysqli_fetch_assoc($result);
    print_r($row['tag']);
}
?>