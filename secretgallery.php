<?php
session_start();
include '/home/mabufudy/db.php';
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
}
?>
<?php if ($_SESSION['loggedin'] == TRUE) { ?>

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
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <input type="file" name="filetoupload">
                <input type="submit" name="submit">
                <select name="tag" for="tags" id="tags">
                    <option value="">select</option>
                    <option value="not explicit">not explicit</option>
                    <option value="explicit">explicit</option>
                </select>
            </form>
        </header>
        <div class="wrapper">
            <h1 class="explicit">explicit</h1>
            <?php
            $query = "select * from images where tag='explicit'";
            $result = $db->query($query);
            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <img src="/<?php echo $data['filepath']; ?>">
                <?php
            }
            ?>
            <h1>not explicit</h1>
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
    </body>

<?php } ?>