<?php
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];


try {
    $sql = "SELECT * FROM users WHERE login = :login OR email = :email OR phone = :phone";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Пользователь с таким логином,email или телефоном уже существует!')</script>";
    } else {
        $pgsql = "INSERT INTO users (surname, name, last_name, phone, email, login, password) 
                  VALUES (:surname, :name, :last_name, :phone, :email, :login, :password)";
        $stmt = $conn->prepare($pgsql);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $pass);

        if ($stmt->execute()) {
            echo "<script>alert('Успешная регистрация!')</script>";
            require_once('authorization_page.php');
        } else {
            echo "<script>alert('Ошибка при регистрации')</script>";
        }
    }
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
