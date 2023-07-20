<?php
session_start();
if ($_SESSION=false){
    header('Location: index.html');
}
?>
<html>
    <body>
        <h1>hello</h1>
    </body>
</html>