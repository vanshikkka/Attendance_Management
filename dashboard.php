<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded credentials for simplicity
    if ($username == 'professor' && $password == 'password') {
        $_SESSION['loggedin'] = true;
        header('Location: division.php');
        exit();
    } else {
        echo "<script>alert('Invalid Credentials'); window.location.href = 'index.html';</script>";
    }
}
?>
