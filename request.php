
<?php
require 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $service_name = $_POST['service_name'];
    $custom_service = $_POST['custom_service'] ?? null;
    $date_time = $_POST['date'];
    $payment_type = $_POST['payment'];
    $user_id = $_SESSION['user_id'];

    // Если выбран чекбокс "иная услуга", то используем значение из custom_service
    if (!empty($custom_service)) {
        $service_name = $custom_service;
    }

    // Проверяем, существует ли услуга в базе
    $stmt = $conn->prepare("SELECT id FROM services WHERE name = :service_name");
    $stmt->execute([':service_name' => $service_name]);
    $service_id = $stmt->fetchColumn();

    // Если услуга не найдена, создаем новую
    if (!$service_id) {
        $stmt = $conn->prepare("INSERT INTO services (name) VALUES (:service_name)");
        $stmt->execute([':service_name' => $service_name]);
        $service_id = $conn->lastInsertId();
    }

    try {
        // Вставляем заявку с найденным или только что созданным service_id
        $stmt = $conn->prepare(
            "INSERT INTO requests (user_id, service_id, address, phone, date, payment_type, status)
VALUES (:user_id, :service_id, :address, :phone, :date_time, :payment_type, 'Создана')"
        );

        $stmt->execute([
            ':user_id' => $user_id,
            ':service_id' => $service_id,
            ':address' => $address,
            ':phone' => $phone,
            ':date_time' => $date_time,
            ':payment_type' => $payment_type,
        ]);

        header('Location: cabinet.php');
        exit;
    } catch (PDOException $e) {
        die("Ошибка при добавлении заявки: " . $e->getMessage());
    }
}
