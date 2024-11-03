<?php
session_start();

// In a real application, you should use a database and proper password hashing
$admin_email = "admin@example.com";
$admin_password = "admin123";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $admin_email && $password === $admin_password) {
        $_SESSION['admin'] = true;
        // Redirect to the new dashboard page
        header("Location: dashboard.php");
        exit();
    } else {
        // Redirect back to login with error
        header("Location: login.php?error=invalid");
        exit();
    }
}
?> 