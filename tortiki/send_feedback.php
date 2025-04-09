<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$log_file = __DIR__.'/db_errors.log';
file_put_contents($log_file, date('Y-m-d H:i:s')." - Начало обработки\n", FILE_APPEND);

try {
    $host = 'MySQL-8.0';
    $dbname = 'teplovik_db';
    $username = 'root';
    $password = '';
    
    // Проверка данных
    $required = ['name', 'phone'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("Не заполнено поле $field");
        }
    }
    
    // Подключение
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Подготовка данных
    $data = [
        ':name' => htmlspecialchars($_POST['name']),
        ':phone' => htmlspecialchars($_POST['phone']),
        ':email' => !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL,
        ':message' => !empty($_POST['message']) ? htmlspecialchars($_POST['message']) : NULL
    ];
    
    // Запрос
    $sql = "INSERT INTO feedback (name, phone, email, message) VALUES (:name, :phone, :email, :message)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    
    header("Location: contacts.php?status=success");
    
} catch(PDOException $e) {
    $error = "Ошибка БД: " . $e->getMessage();
    file_put_contents($log_file, $error."\n", FILE_APPEND);
    header("Location: contacts.php?status=error&message=".urlencode($error));
} catch(Exception $e) {
    $error = "Ошибка: " . $e->getMessage();
    file_put_contents($log_file, $error."\n", FILE_APPEND);
    header("Location: contacts.php?status=error&message=".urlencode($error));
}
?>