<?php
$servername = 'mabufudyne.com';
$db_username = 'mabufudy_primary';
$db_password = 'U7fBt*hUoytp@tcNu4TUgs!Hw';
$username = $_POST['username'];
$password = $_POST['password'];
$db = new mysqli($servername, $db_username, $db_password);
$query = "SELECT password from users where username='$username'";
$result = $db->query($query);
$row = $result -> fetch_assoc(mysqli_num);
if(password_verify($password,$row['password'])){
    echo 'congrats!';
}
else{
    echo 'too bad :(';
}
?>