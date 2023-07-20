<?php
include '/home/mabufudy/db.php';
$targetdirectory = "uploads/";
$filename = $targetdirectory . basename($_FILES['filetoupload']['name']);
if (isset($_POST['tag'])) {
    $tag = $_POST['tag'];
}
$file_type = pathinfo($filename, PATHINFO_EXTENSION);
if (!empty($_FILES['filetoupload']['name'])) {
    $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($file_type, $allowtypes)) {
        if (move_uploaded_file($_FILES['filetoupload']['tmp_name'], $filename)) {
            $insert = $db->query("INSERT into images (filepath,date,tag) VALUES ('$filename', '$tag', NOW())");
            if ($insert) {
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
?>