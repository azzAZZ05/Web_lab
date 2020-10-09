<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$key = filter_var(trim($_POST['key']), FILTER_SANITIZE_STRING);
$teacher = $_POST['teacher'];
if (mb_strlen($login) < 5 || mb_strlen($login) > 15) {
    echo "Error. login must be more than 5 symbols and less than 15 symbols";
    exit();
} else if (mb_strlen($key) != 6) {
    echo "Error. wrong key";
    exit();
}
$password = md5($password);
$mysql = new mysqli('localhost', 'root', '', 'reg-db');
$mysql->query("INSERT INTO `users` (`login`, `password`, `key`, `name`,`teacher`) VALUES('$login','$password','$key','$name','$teacher')");
$mysql->close();
header('Location: ../authorization.php');
?>