<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $quantity = $_POST['quantity'];
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $type = 'buy'; // Indicate this is a buy request

    // Insert into requests table
    $sql = "INSERT INTO requests (name, blood_group, quantity, contact, type) 
            VALUES ('$name', '$blood_group', $quantity, '$contact', '$type')";

    if ($conn->query($sql)) {
        echo "<h2 style='color: green;'>🛒 Blood bought successfully!</h2>";

        // Optional: Display matching donors
        $donor_sql = "SELECT name, contact, blood_group FROM donors WHERE blood_group = '$blood_group'";
        $result = $conn->query($donor_sql);

        if ($result->num_rows > 0) {
            echo "<h3>✅ Matching Donors:</h3>";
            echo "<table border='1' cellpadding='10' style='border-collapse: collapse; width: 100%;'>";
            echo "<tr><th>Name</th><th>Blood Group</th><th>Contact</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['blood_group'] . "</td>
                        <td>" . $row['contact'] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color: red;'>⚠️ No matching donors available at the moment.</p>";
        }

    } else {
        echo "<p style='color: red;'>❌ Error: " . $conn->error . "</p>";
    }

    // Buttons
    echo "<div style='margin-top: 30px; text-align: center;'>
            <a href='http://127.0.0.1:5501/Home.html' style='padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;'>🏠 Return to Home</a>
            <a href='http://127.0.0.1:5501/request.html' style='padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; font-size: 16px; margin-left: 15px;'>🛒 Buy More Blood</a>
          </div>";
}
?>
