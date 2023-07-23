<?php
include '/home/mabufudy/db.php';
$imageid = $_GET['imageid'];
$query = "DELETE images, tags
		FROM images 
		LEFT JOIN tags 
		ON images.imageid = tags.imageid
		WHERE images.imageid='$imageid'";
$delete = $db->query($query);
if ($delete) {
	echo 'image deleted';
} else {
	echo 'image not deleted';
}
?>