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
        <div class="wrapper">
            <h1><a href="/secretgallery.php">go back</a></h1>
            <?php
            $imageid = $_GET['imageid'];
            $query = "SELECT images.filepath, tags.tag, images.imageid 
                        FROM images
                        LEFT JOIN tags ON images.imageid=tags.imageid
                        WHERE images.imageid = '$imageid'";
            $result = $db->query($query);
            $row = $result->fetch_assoc();
            if (isset($row['filepath'])) {
                echo "<h1>Image ID: " . $imageid . "</h1>";
                echo '<img src="/' . $row['filepath'] . '">';
                if (isset($row['tag'])) {
                    echo $row['tag'];
                }
                while ($row = $result->fetch_assoc()) {
                    echo $row['tag'];
                }
            } else {
                echo "<h1>Image ID " . $imageid . " is invalid." . "</h1>";
            }
            ?>
        </div>
    </body>
<?php } ?>