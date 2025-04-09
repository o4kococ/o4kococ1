<?php
require_once 'db.php'; // Подключаем файл с настройками базы данных

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Хэшируем пароль для безопасности
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Проверяем, существует ли пользователь с таким email или username
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
        $stmt->execute(['email' => $email, 'username' => $username]);
        $user = $stmt->fetch();

        if ($user) {
            die("Пользователь с таким email или именем уже существует.");
        }

        // Добавляем нового пользователя в базу данных
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password
        ]);

        // Перенаправляем на страницу авторизации
        header("Location: login.html");
        exit();
    } catch (PDOException $e) {
        die("Ошибка при регистрации: " . $e->getMessage());
    }
}
?>