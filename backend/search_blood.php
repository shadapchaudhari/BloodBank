<?php
include 'db.php';

if (isset($_GET['blood_group'])) {
    $blood_group = mysqli_real_escape_string($conn, $_GET['blood_group']);
    $sql = "SELECT * FROM donors WHERE blood_group = '$blood_group'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h1 class='available-title'>Available Donors</h1>";
            echo "<div class='donor-result'>";
            echo "<strong>Name:</strong> " . $row['name'] . "<br>";
            echo "<strong>Blood Group:</strong> " . $row['blood_group'] . "<br>";
            echo "<strong>Contact:</strong> " . $row['contact'];
            echo "</div><br>";
        }
    } else {
        echo "<p class='no-result'>No donors found for this blood group.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .available-title {
  text-align: center;
  font-size: 28px;
  color: #2d3436;
  margin-top: 30px;
  margin-bottom: 20px;
  font-weight: bold;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  text-transform: uppercase;
  border-bottom: 2px solid #dfe6e9;
  padding-bottom: 10px;
}

        .donor-result {
  background-color: #f1f2f6;
  border-left: 5px solid #3742fa;
  padding: 15px;
  margin: 15px auto;
  max-width: 500px;
  border-radius: 8px;
  box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
  font-family: Arial, sans-serif;
  color: #2f3542;
}

.donor-result strong {
  color: #1e272e;
}

.no-result {
  text-align: center;
  margin-top: 30px;
  font-size: 18px;
  color: red;
}

    </style>
</body>
</html>