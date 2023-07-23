<?php
session_start();
include '/home/mabufudy/db.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == FALSE) {
	header('Location: gallery.html');
}
?>
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
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
}
?>