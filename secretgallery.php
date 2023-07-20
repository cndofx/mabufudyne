<?php
session_start();
if (!isset($_SESSION['loggedin'])){
    header('Location: index.html');
}
?>
<html>
    <body>
        <h1>hello</h1>
    </body>
</html>