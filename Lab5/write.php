<?php
function redirectToHome(): void {  // Возвращаемся на главную страницу витамито
    header("Location: /Lab5/vitamito.php");
    exit();
}

if (false === isset($_POST["email"], $_POST["category"], $_POST["title"], $_POST["description"])) {
    redirectToHome();
}

$email = $_POST["email"];
$category = $_POST["category"];
$title = $_POST["title"];
$description = $_POST["description"];

$filePath = "categories/$category/$title.txt";

if (false === file_put_contents($filePath, [$title, "\n", $email, "\n", $description])) { // Запись файла
    throw new Exception("Не удалось записать файл объявления");
}

redirectToHome();