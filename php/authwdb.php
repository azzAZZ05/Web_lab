<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$hash = md5($password);
$mysql = new mysqli('localhost', 'root', '', 'reg-db');
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$hash'");
$user = $result->fetch_assoc();
if (count($user) == 0) {
    echo "Error. user not found", " ", $password, " ", $hash;
    exit();
}
setcookie('user', $user['name'], time() + 3600, "/");
$mysql->close();
header('Location: /journal.php');
?>