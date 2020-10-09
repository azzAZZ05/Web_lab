<?php
session_start();
$users = array(
    "admin" => md5("admin"),
    "qwerty" => md5("qwerty"),
    "user" => md5("user")
);
$error = "";
$login = $_POST['login'];
$password = $_POST['password'];
for ($i = 0; $i < strlen($login); $i++) {
    if (!(($login[$i] >= 'A' && $login[$i] <= 'z') || ($login[$i] >= '0' && $login[$i] <= '9'))) {
        $_SESSION['error'] = "Недопустимые символы в логине";
    }
}
for ($i = 0; $i < strlen($password); $i++) {
    if (!(($password[$i] >= 'A' && $password[$i] <= 'z') || ($password[$i] >= '0' && $password[$i] <= '9'))) {
        $_SESSION['error'] = "Недопустимые символы в пароле";
    }
}
if ($error == "") {
    if (isset($users[$login])) {
        if ($users[$login] === md5($password)) {

            $_SESSION['user'] = $login;
            header("location: ../journal.php");
        } else {
            $_SESSION['error'] = "Неверный пароль";
        }
    } else {
        $_SESSION['error'] = "Пользователь не найден";
    }
}
header("location: ../journal.php");
?>
