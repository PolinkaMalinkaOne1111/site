<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

try {
    $sql = "SELECT r.id, s.name AS service_name, r.payment_type, r.status, r.phone, r.date, r.address, r.cancel_reason
            FROM requests r
            JOIN services s ON r.service_id = s.id
            WHERE r.user_id = :user_id";

    $stmt = $conn->prepare($sql);
    $stmt->execute([':user_id' => $user_id]);
    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Ошибка при получении заявок: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="style1.css">
    <title>Личный кабинет</title>
    <style>
        body {
            background: #E9E9E9;
        }
    </style>

    <script src="script.js"></script>
</head>

<body>
    <div id="logoutModal">
        <p>Вы действительно хотите выйти?</p>
        <button onclick="logout()">Да</button>
        <button onclick="closeModal()">Нет</button>
    </div>
    <div class="container">
        <div class="header">

            <img src="img/logo.png" alt="logo" class="logotipchik">

            <h1 class="title">История заявок</h1>


            <form action="logout.php" class="logout-form">
                <button type="submit" class="logout-button">
                    <img src="img/logout.png" alt="logout-button">
                </button>
            </form>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID Заявки</th>
                        <th>Услуга</th>
                        <th>Тип оплаты</th>
                        <th>Статус</th>
                        <th>Телефон</th>
                        <th>Дата</th>
                        <th>Адрес</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $request): ?>
                        <tr>
                            <td><?= htmlspecialchars($request['id']) ?></td>
                            <td><?= htmlspecialchars($request['service_name']) ?></td>
                            <td><?= htmlspecialchars($request['payment_type']) ?></td>
                            <td>
                                <?= htmlspecialchars($request['status']) ?>
                                <?php if ($request['status'] === 'Отменена'): ?>
                                    <span>(Причина: <?= htmlspecialchars($request['cancel_reason']) ?>)</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($request['phone']) ?></td>
                            <td><?= htmlspecialchars($request['date']) ?></td>
                            <td><?= htmlspecialchars($request['address']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="create_request">
            <form action="create_request.php">
                <button type="submit" class="submit-form_button create-request_button">Создать заявку</button>
            </form>
        </div>
    </div>


</body>

</html>