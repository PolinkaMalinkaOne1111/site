<?php
require 'db.php';

$sql = "SELECT 
            r.id AS request_id,
            CONCAT(u.surname, ' ', u.name, ' ', u.last_name) AS full_name,
            u.phone,
            s.name AS service_name,
            r.address,
            r.status,
            r.cancel_reason
        FROM requests r
        JOIN users u ON r.user_id = u.id
        JOIN services s ON r.service_id = s.id";

// $result = $conn->query($sql);
$requests = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <title>Администрирование</title>
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

            <h1 class="title">История заявок пользователей</h1>


            <form action="logout.php" class="logout-form">
                <button type="submit" class="logout-button">
                    <img src="img/logout.png" alt="logout-button">
                </button>
            </form>
        </div>

        <div class="cards-container">
            <?php foreach ($requests as $request): ?>
                <div class="card">
                    <p>Заявка №<?= htmlspecialchars($request['request_id']) ?></p>
                    <p>ФИО: <?= htmlspecialchars($request['full_name']) ?></p>
                    <p>Телефон: <?= htmlspecialchars($request['phone']) ?></p>
                    <p>Тип услуги: <?= htmlspecialchars($request['service_name']) ?></p>
                    <p>Адрес: <?= htmlspecialchars($request['address']) ?></p>
                    <p>Статус: <?= htmlspecialchars($request['status']) ?></p>
                    <?php if ($request['status'] === 'Отменена'): ?>
                        <p>Причина отмены: <?= htmlspecialchars($request['cancel_reason']) ?></p>
                    <?php endif; ?>
                    <form method="POST" action="update_request.php">
                        <input type="hidden" name="request_id" value="<?= $request['request_id'] ?>">
                        <select name="status">
                            <option value="Создана" <?= $request['status'] === 'Создана' ? 'selected' : '' ?>>Создана</option>
                            <option value="Завершена" <?= $request['status'] === 'Завершена' ? 'selected' : '' ?>>Завершена</option>
                            <option value="Отменена" <?= $request['status'] === 'Отменена' ? 'selected' : '' ?>>Отменена</option>
                        </select>
                        <input type="text" name="cancel_reason" placeholder="Причина отмены" <?= $request['status'] !== 'canceled' ? 'style="display:none;"' : '' ?>>
                        <button type="submit">Сохранить</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <script>
            document.querySelectorAll('select[name="status"]').forEach(select => {
                select.addEventListener('change', function() {
                    const reasonInput = this.nextElementSibling;
                    if (this.value === 'Отменена') {
                        reasonInput.style.display = 'block';
                    } else {
                        reasonInput.style.display = 'none';
                    }
                });
            });
        </script>

</body>

</html>
