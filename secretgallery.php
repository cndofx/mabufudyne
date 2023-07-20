<?php
session_start();
include '/home/mabufudy/db.php';
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
                <select name="tag" for="tags" id="tags">
                    <option value="">select</option>
                    <option value="not explicit">not explicit</option>
                    <option value="explicit">explicit</option>
                </select>
            </form>
        </div>
        <div class="text-box">
            <p>welcome to the art gallery, enjoy your stay</p>
        </div>
        <?php
        $query = "select * from images where tag='explicit'";
        $result = $db->query($query);
        while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <img src="/<?php echo $data['filepath']; ?>">
            <?php
        }
        ?>
    </body>

    </html>
<?php } ?>