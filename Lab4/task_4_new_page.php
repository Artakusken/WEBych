<?php
session_start();
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';

if (isset($_SESSION["name"]) && isset($_SESSION["email"]) && isset($_SESSION["phone"])) {
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
    echo "Имя: $name Эл. почта: $email Телефончик: $phone";
}
?>