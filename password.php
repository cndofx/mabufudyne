<?php
// $servername = 'mabufudyne.com';
// $db_username = 'mabufudy_primary';
// $db_password = 'U7fBt*hUoytp@tcNu4TUgs!Hw';
// $db_name = 'mabufudy_db';
// include(dirname(__DIR__).'/db.php');
include '/home/mabufudy/db.php';
$username = $_POST['username'];
$password = $_POST['password'];
// $db = new mysqli($servername, $db_username, $db_password, $db_name);
$query = "SELECT password from users where username='$username'";
$result = $db->query($query);
$row = $result -> fetch_assoc();
if(isset($row) && password_verify($password,$row['password'])){
    echo 'congrats!';
}
else{
    echo 'too bad :(';
}
?>
