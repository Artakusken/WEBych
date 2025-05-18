<?php
// Начинаем сессию в начале файла
session_start();

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Сохраняем данные в сессию
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["phone"] = $_POST["phone"];

    // Сообщение об успешном сохранении
    $message = "Данные сохранены в сессии";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Задание 4</title>
</head>
<body>
    <h2>Введите ваши данные:</h2>

    <?php if (isset($message)): ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <p>Введите имя: <input type="text" name="name" value="<?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : ''; ?>" /></p>
        <p>Введите email: <input type="text" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" /></p>
        <p>Введите номер телефона: <input type="text" name="phone" value="<?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : ''; ?>" /></p>
        <input type="submit" value="Отправить">
    </form>

    <a href = "task_4_new_page.php" >Другая страница</a>
</body>
</html>