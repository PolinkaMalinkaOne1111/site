/** @var PDO $pdo Объект подключения к PostgreSQL */
 для объявления объекта pdo
Для методов, возвращающих PDOStatement
Добавьте аннотацию для переменных с запросами:
php
/** @var PDOStatement $stmt */
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");

// Теперь при работе с $stmt будут подсказки
$stmt->execute([':id' => 42]);
$result = $stmt->fetchAll();
