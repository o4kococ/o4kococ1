<?php
require_once 'db.php'; // Подключаем файл с настройками базы данных
session_start(); // Запускаем сессию

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        // Ищем пользователя по имени пользователя
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Сохраняем имя пользователя в сессии
            $_SESSION['username'] = $user['username'];
            // Перенаправляем на главную страницу
            header("Location: main.php");
            exit();
        } else {
            echo "Неверное имя пользователя или пароль.";
        }
    } catch (PDOException $e) {
        die("Ошибка при авторизации: " . $e->getMessage());
    }
}
?>