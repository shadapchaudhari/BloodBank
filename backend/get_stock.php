<?php

header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  
header("Access-Control-Allow-Headers: Content-Type, Authorization"); 

include 'db.php';

// Updated query to include quantity
$sql = "SELECT blood_group, stock, quantity FROM blood_stock"; 

$result = $conn->query($sql);

if ($result === false) {
    echo "Error executing query: " . $conn->error;
    exit;
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Blood Group: " . $row['blood_group'] . 
             " | Stock Available: " . $row['stock'] . 
             " | Quantity: " . $row['quantity'] . "<br>";
    }
} else {
    echo "No stock available.";
}

$conn->close();
?>
