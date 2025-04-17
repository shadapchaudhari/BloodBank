<?php
// Assuming database connection is established
include 'db.php';

// Check if donor ID is passed via URL
if (isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];
} else {
    echo "No donor found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Blood</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* General body styling */
/* General body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Align content to the top */
    height: 100vh;
    flex-direction: column; /* Stack elements vertically */
    padding-top: 20px; /* Adds space between the top of the screen and the form */
}

/* Heading style */
h1 {
    text-align: center; /* Center the heading */
    color: #3b3b3b;
    margin: 0;
    padding-bottom: 20px; /* Adds space between heading and form */
    font-size: 2rem;
    width: 100%; /* Make sure the heading takes full width for centering */
    display: flex;
    justify-content: center; /* Ensure the heading is centered */
}

/* Container for the form */
form {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    margin: 0 auto; /* Center the form horizontally */
}

/* Form label styling */
label {
    font-size: 1rem;
    color: #555;
    margin-bottom: 8px;
    display: block;
}

/* Input field styling */
input[type="text"],
input[type="date"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    box-sizing: border-box;
}

/* Button styling */
button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover effect for the button */
button:hover {
    background-color: #0056b3;
}

/* Input fields: Focus state */
input:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Add some space between the fields */
form div {
    margin-bottom: 20px;
}

/* Styling for error or success message */
.error-message {
    color: red;
    font-size: 0.9rem;
    text-align: center;
}

/* Styling for success message */
.success-message {
    color: green;
    font-size: 1rem;
    text-align: center;
}

</style>
<body>
    <h1>Donate Blood</h1>
    <form action="submit_donation.php" method="POST">
        <input type="hidden" name="donor_id" value="<?php echo $donor_id; ?>">

        <label for="donation_date">Donation Date:</label><br>
        <input type="date" id="donation_date" name="donation_date" required><br><br>

        <label for="blood_group">Blood Group:</label><br>
        <input type="text" id="blood_group" name="blood_group" required><br><br>

        <label for="quantity">Quantity (in liters):</label><br>
        <input type="number" id="quantity" name="quantity" step="0.1" required><br><br>

        <label for="contact">Contact Information:</label><br>
        <input type="text" id="contact" name="contact" required><br><br>

        <button type="submit">Donate Blood</button>
    </form>
</body>
</html>
