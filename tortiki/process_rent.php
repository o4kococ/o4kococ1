<?php
// Включим вывод ошибок для отладки
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Логирование
file_put_contents('rental_errors.log', "\n".date('Y-m-d H:i:s')." - Начало обработки\n", FILE_APPEND);

try {
    // Подключение к БД (для OpenServer)
    $host = 'MySQL-8.0'; // Измените на 'MySQL-8.0' если используете такое имя хоста
    $dbname = 'teplovik_db';
    $username = 'root';
    $password = ''; // Пароль по умолчанию в OpenServer
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    file_put_contents('rental_errors.log', "Подключение к БД успешно\n", FILE_APPEND);

    // Валидация и сбор данных
    $required = ['equipment_id', 'equipment_name', 'daily_price', 'start_date', 'end_date', 'client_name', 'client_phone'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("Не заполнено обязательное поле: $field");
        }
    }

    // Расчет общей стоимости
    $startDate = new DateTime($_POST['start_date']);
    $endDate = new DateTime($_POST['end_date']);
    if ($endDate < $startDate) {
        throw new Exception("Дата окончания не может быть раньше даты начала");
    }
    $days = $startDate->diff($endDate)->days + 1;
    $totalPrice = $days * $_POST['daily_price'];

    // Подготовка данных для БД
    $data = [
        'equipment_id' => $_POST['equipment_id'],
        'equipment_name' => $_POST['equipment_name'],
        'daily_price' => $_POST['daily_price'],
        'start_date' => $_POST['start_date'],
        'end_date' => $_POST['end_date'],
        'client_name' => $_POST['client_name'],
        'client_phone' => $_POST['client_phone'],
        'client_email' => $_POST['client_email'] ?? null,
        'total_price' => $totalPrice
    ];

    // SQL запрос
    $sql = "INSERT INTO rentals (
        equipment_id, equipment_name, daily_price, 
        start_date, end_date, client_name, 
        client_phone, client_email, total_price, created_at
    ) VALUES (
        :equipment_id, :equipment_name, :daily_price, 
        :start_date, :end_date, :client_name, 
        :client_phone, :client_email, :total_price, NOW()
    )";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    
    file_put_contents('rental_errors.log', "Запись успешно добавлена в БД\n", FILE_APPEND);
    
    // Перенаправление с параметрами успеха
    header("Location: knopka.php?rent_status=success&equipment=".urlencode($_POST['equipment_name'])."&days=$days&total=$totalPrice");
    exit();

} catch(PDOException $e) {
    $error = "Ошибка БД: " . $e->getMessage();
    file_put_contents('rental_errors.log', $error."\n", FILE_APPEND);
    header("Location: knopka.php?rent_status=error&message=".urlencode($error));
    exit();
} catch(Exception $e) {
    $error = "Ошибка: " . $e->getMessage();
    file_put_contents('rental_errors.log', $error."\n", FILE_APPEND);
    header("Location: knopka.php?rent_status=error&message=".urlencode($error));
    exit();
}
?>