<?php
include '/home/mabufudy/db.php';
$targetdirectory = "uploads/";
$path_parts = pathinfo($_FILES['filetoupload']['name']);
$file_type = $path_parts['extension'];
$filename = $targetdirectory . $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
$tags=explode(",",$_POST['tags']);
if (!empty($tags)) {
    if (!empty($_FILES['filetoupload']['name'])) {
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($file_type, $allowtypes)) {
            if (move_uploaded_file($_FILES['filetoupload']['tmp_name'], $filename)) {
                $insert = $db->query("INSERT into images (filepath,date) VALUES ('$filename', NOW())");
                if ($insert) {
                    $id = $db->query("SELECT id from images where filepath='$filename'");
                    $id_array = mysqli_fetch_assoc($id);
                    foreach($tags as $value){
                        $insert_tags = $db->query("INSERT into tags (id,tag) VALUES ('$id_array[id]','$value')");
                    }
                    header('Location: secretgallery.php');
                } else {
                    echo 'the file has not gone to the database';
                }
            } else {
                echo 'failed to upload file :(';
            }
        } else {
            echo 'wrong type of file, dingus';
        }
    } else {
        echo 'you have to upload a file';
    }
} else {
    echo 'you must choose a tag';
}
?>