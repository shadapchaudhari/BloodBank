<?php
include '../backend/db.php';

$total_requests = $conn->query("SELECT COUNT(*) AS total_requests FROM requests")
    ->fetch_assoc()['total_requests'] ?? 0;

$total_donors = $conn->query("SELECT COUNT(*) AS total_donors FROM donors")
    ->fetch_assoc()['total_donors'] ?? 0;

$total_sold = $conn->query("SELECT SUM(quantity) AS total_sold FROM purchase_history")
    ->fetch_assoc()['total_sold'] ?? 0;

$blood_stock_result = $conn->query("SELECT blood_group, SUM(quantity) AS stock_quantity FROM blood_stock GROUP BY blood_group");
$blood_stock = [];
if ($blood_stock_result && $blood_stock_result->num_rows > 0) {
    $blood_stock = $blood_stock_result->fetch_all(MYSQLI_ASSOC);
}

$conn->close();
?>
