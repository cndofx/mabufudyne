<?php
session_start();
include '/home/mabufudy/db.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == FALSE) {
    header('Location: gallery.html');
}
?>
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) { ?>

    <head>
        <link rel="stylesheet" href="gallery.css">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>

    <body>
        <header>
            <div class="title">
                <h1>secret art gallery</h1>
                <p>welcome to the art gallery, enjoy your stay</p>
            </div>
            <form class="uploadform" method="post" action="upload.php" enctype="multipart/form-data">
                <input type="file" name="filetoupload">
                <input type="text" placeholder="tags, seperate by commas" name="tags">
                <input type="submit" name="submit">
            </form>
            <form class="searchform" method="post" action="searchtags.php">
                <input type="text" placeholder="search tags" name="searchtags">
            </form>
        </header>
        <div class="wrapper">
            <div class="image-columns">
                <?php
                $query = "SELECT imageid, filepath FROM images";
                $result = $db->query($query);
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <!-- <a href="/image.php/<?php //echo $row['imageid']; ?>"> -->
                    <a href="/image.php?imageid=/<?php echo $row['imageid']; ?>">
                        <img src="/<?php echo $row['filepath']; ?>">
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </body>

<?php } ?>