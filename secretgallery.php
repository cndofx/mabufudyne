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
                <select name="tag" for="tags" id="tags">
                    <option value="">select a tag</option>
                    <option value="not explicit">not explicit</option>
                    <option value="explicit">explicit</option>
                </select>
                <input type="submit" name="submit">
            </form>
        </header>
        <div class="wrapper">
            <h1 class="explicit">explicit</h1>
            <div class="image-columns">
                <?php
                $query = "select * from images where tag='explicit'";
                $result = $db->query($query);
                while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                    <img src="/<?php echo $data['filepath']; ?>">
                    <?php
                }
                ?>
            </div>
            <h1>not explicit</h1>
            <div class="image-columns">
                <?php
                $query = "select * from images where tag='not explicit'";
                $result = $db->query($query);
                while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                    <img src="/<?php echo $data['filepath']; ?>">
                    <?php
                }
                ?>
            </div>
        </div>
    </body>

<?php } ?>