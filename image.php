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
        <?php
        $imageid = $_SERVER['PATH_INFO'];
        $query = "SELECT filepath FROM images WHERE imageid = '$imageid'";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        if (isset($row['filepath'])) {
            echo "<h1>Image ID: " . $imageid . "</h1>";
            echo '<img src="' . $row['filepath'] . '">';
        } else {
            echo "<h1>Image ID " . $imageid . "is invalid." . "</h1>";
        }
        ?>
    </body>
<?php } ?>