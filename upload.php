<?php
print_r($_FILES);
$filename = $_FILES['filetoupload']["name"];
if (isset($filename)) {
    echo $filename;
}
?>