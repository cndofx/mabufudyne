<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
}


?>

<?php if ($_SESSION['loggedin'] == TRUE) { ?>

    <html>

    <head>
        <link rel="stylesheet" href="gallery.css">
    </head>

    <body>
        <h1>secret art gallery</h1>
        <div class="file_upload">
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <input type="file" name="filetoupload">
                <input type="submit" name="submit">
            </form>
        </div>
        <div class="text-box">
            <p>welcome to the art gallery, enjoy your stay</p>
        </div>

    </body>

    </html>

<?php } ?>