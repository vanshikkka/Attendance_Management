<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Division Selection</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Select Division</h2>
        <div class="d-flex justify-content-center mt-4">
            <a href="attendance.php?division=A" class="btn btn-primary me-3">Division A</a>
            <a href="attendance.php?division=B" class="btn btn-primary">Division B</a>
        </div>
    </div>
</body>
</html>
