<?php
// Assuming you already have the database connection
include 'db.php';

// Check if the form is submitted
if (isset($_POST['name'], $_POST['age'], $_POST['blood_group'], $_POST['contact'])) {
    // Get the donor details from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    // Insert the donor details into the database
    $sql = "INSERT INTO donors (name, age, blood_group, contact) VALUES ('$name', '$age', '$blood_group', '$contact')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to donation page after successful registration
        header("Location: donate_blood.php?donor_id=" . $conn->insert_id);
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
