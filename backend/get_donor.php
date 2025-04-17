<?php
include 'backend/db.php';

$sql = "SELECT * FROM donors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row['name'] . " | Blood Group: " . $row['blood_group'] . "<br>";
    }
} else {
    echo "No donors found.";
}
?>