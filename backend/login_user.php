<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;

            // Set a cookie if "remember me" is checked
            if ($remember) {
                setcookie('user_email', $email, time() + (86400 * 30), "/"); // 30 days
            }

            echo "<script>alert('Login successful! Welcome to Blood Bank.'); window.location.href = '../Home.php';</script>";
        } else {
            echo "<script>alert('Incorrect password.'); window.location.href = '../login.php';</script>";
        }
    } else {
        echo "<script>alert('User not found.'); window.location.href = '../login.php';</script>";
    }

    $conn->close();
}
?>
