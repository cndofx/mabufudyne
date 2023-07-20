<?php
session_start();
if (!isset($_SESSION['loggedin'])){
    header('Location: index.html');
}
?>

<?php if($_SESSION['loggedin']==TRUE) { ?>

<html>
    <head>
    <link rel="stylesheet" href="gallery.css">
    </head>
    <body>
        <h1>secret art gallery</h1>
        <div class="file_upload">
            <form method="post">
                <input type="file" name="filetoupload" enctype="multipart/form-data">
                <input type="submit" name="submit">
            </form>
        </div>
        <div class="text-box">
            <p>welcome to the art gallery, enjoy your stay</p>
        </div>
        <?php
        _print_r($_FILES);
            $filename=$_FILES['filetoupload']["name"];
            if (isset($filename)){
            echo $filename;
            }
        ?>
    </body>
</html>

<?php } ?>