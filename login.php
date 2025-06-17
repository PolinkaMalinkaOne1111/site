<?php
session_start();
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

try {

    $sql = "SELECT * FROM users WHERE login = :login AND password = :password";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $pass);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_surname'] = $user['surname'];
        $_SESSION['user_email'] = $user['email'];

        // Проверка логина
        if ($login === 'adminka') {
            header("Location: admin_panel.php");
        } else {
            header("Location: cabinet.php");
        }
        exit();
    } else {
        echo "<script>alert('Нет такого пользователя')</script>";
        require_once('authorization_page.php');
    }
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}
