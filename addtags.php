<?php
	include '/home/mabufudy/db.php';
	$tags=$_POST['tagstoadd'];
	$tags_array = explode(",", $tags);
	$imageid=$_GET['imageid'];
	foreach($tags_array as $tag){
		$tag = trim($tag);
	}
	foreach($tags_array as $tag){
		$query = "INSERT into tags (imageid,tag) VALUES ('$imageid','$tag')";
		if($query){
			echo 'tag addition success!';
		}
		else{
			echo 'tag failed';
		}
	}
?>