<?php
	include '/home/mabufudy/db.php';
	$tags=$_POST['tagstoadd'];
	$tags_array = explode(",", $tags);
	$imageid=$_GET['imageid'];
	echo $imageid;
	foreach($tags_array as $tag){
		$tag = trim($tag);
	}
	foreach($tags_array as $tag){
		$query = "INSERT into tags (imageid,tag) VALUES ('$imageid','$tag')";
		$addtags = $db->query($query);
		if($addtags){
			echo 'tag addition success!';
		}
		else{
			echo 'tag failed';
		}
	}
?>