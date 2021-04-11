<?php
session_start();
//  判断是否登陆
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {

} else {
    $_SESSION["login"] = false;
    header('Location: ../login.php');
}
?>