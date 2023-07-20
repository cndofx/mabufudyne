<?php
session_start();
if (!isset($_SESSION['loggedin'])){
    header('Location: index.html');
}
?>
<html>
    <head>
    <link rel="stylesheet" href="gallery.css">
    </head>
    <body>
        <h1>hello</h1>
        <p>welcome to the art gallery, enjoy your stay</p>
    </body>
</html>