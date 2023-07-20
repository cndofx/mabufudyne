<?php
if (isset($filename)) {
    echo $filename;
}
$targetdirectory = "uploads/";
$filename = $targetdirectory . basename($_FILES['filetoupload']['name']);
$file_type = pathinfo($filename, PATHINFO_EXTENSION);
if (!empty($FILES_['filetoupload']['name'])) {
    $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($file_type, $allowtypes)) {
        if (move_uploaded_file($_FILES['filetoupload']['tmp_name'], $filename)) {
            echo 'successfully uploaded file!';
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