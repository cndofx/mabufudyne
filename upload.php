<?php
include '/home/mabufudy/db.php';
$targetdirectory = "uploads/";
$path_parts = pathinfo($_FILES['filetoupload']['name']);
$file_type = $path_parts['extension'];
$filename = $targetdirectory . $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
$tags = explode(",", $_POST['tags']);
if (!empty($tags)) {
    if (!empty($_FILES['filetoupload']['name'])) {
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($file_type, $allowtypes)) {
            if (move_uploaded_file($_FILES['filetoupload']['tmp_name'], $filename)) {
                $insert = $db->query("INSERT into images (filepath,date) VALUES ('$filename', NOW())");
                if ($insert) {
                    $image_result = $db->query("SELECT id from images where filepath='$filename'");
                    $image_row = mysqli_fetch_assoc($result);
                    $image_id = $row['id'];
                    foreach ($tags as $tag) {
                        $insert_success = $db->query("INSERT into tags (imageid,tag) VALUES ('$image_id','$tag')");
                        if ($insert_success) {
                            echo 'tag entry successful';
                        } else {
                            echo 'tag entry failed';
                        }
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