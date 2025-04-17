<?php
// Assuming database connection is established
include 'db.php';

// Check if the form is submitted
if (isset($_POST['donor_id'], $_POST['donation_date'], $_POST['blood_group'], $_POST['quantity'], $_POST['contact'])) {
    // Get the form data
    $donor_id = $_POST['donor_id'];
    $donation_date = mysqli_real_escape_string($conn, $_POST['donation_date']);
    $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    // Insert the donation details into the donations table
    $sql = "INSERT INTO donations (donor_id, donation_date, blood_group, quantity, contact) 
            VALUES ('$donor_id', '$donation_date', '$blood_group', '$quantity', '$contact')";

    if ($conn->query($sql) === TRUE) {
        // Update the blood stock for the respective blood group
        $sql_update = "UPDATE blood_stock SET stock = stock - '$quantity' WHERE blood_group = '$blood_group'";

        if ($conn->query($sql_update) === TRUE) {
            // Success message
            echo "<script>('Thank you for your donation! Blood stock has been updated.');</script>";
            echo '
<div id="custom-alert">Thank you for your donation! Blood stock has been updated.</div>
<style>
#custom-alert {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #28a745;
    color: white;
    padding: 16px 24px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    font-size: 1rem;
    z-index: 9999;
    animation: fadeOut 3s forwards;
}

@keyframes fadeOut {
    0% { opacity: 1; }
    70% { opacity: 1; }
    100% { opacity: 0; top: 0px; }
}
</style>
<script>
    setTimeout(function() {
        window.location.href = "http://127.0.0.1:5501/Home.php";
    }, 3000);
</script>
';



            // PHP redirection after 2 seconds
            header("Refresh: 2; url=http://127.0.0.1:5501/Home.php");
            exit; // Stop the script to prevent further processing
        } else {
            echo "Error updating blood stock: " . $conn->error;
        }
    } else {
        echo "Error recording donation: " . $conn->error;
    }
}
?>