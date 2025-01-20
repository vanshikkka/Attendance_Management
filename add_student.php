<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $division = $_POST['division'];

    $db->exec("INSERT INTO students (name, division) VALUES ('$name', '$division')");
    echo "<script>alert('Student added successfully!'); window.location.href = 'division.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Add Student</h2>
        <form action="" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="division" class="form-label">Division</label>
                <select class="form-control" id="division" name="division" required>
                    <option value="A">Division A</option>
                    <option value="B">Division B</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Add Student</button>
        </form>
    </div>
</body>
</html>
