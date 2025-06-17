<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];
    $cancel_reason = $_POST['cancel_reason'] ?? null;

    if ($status === 'canceled' && empty($cancel_reason)) {
        die('Причина отмены обязательна при выборе статуса "Отменено".');
    }

    $sql = "UPDATE requests SET status = :status, cancel_reason = :cancel_reason WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':status' => $status,
        ':cancel_reason' => $cancel_reason,
        ':id' => $request_id,
    ]);

    header('Location: admin_panel.php');
    exit;
}
