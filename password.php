<?php
session_start();
include '/home/mabufudy/db.php';
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT password from users where username='$username'";
$result = $db->query($query);
$row = $result->fetch_assoc();
if (isset($row) && password_verify($password, $row['password'])) {
    session_regenerate_id();
    $_SESSION['loggedin'] = true;
    header('Location: secretgallery.php');
} else {
    echo 'too bad :(';
}
?>