<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $db->exec("DELETE FROM students WHERE id = $student_id");
    echo "<script>alert('Student removed successfully!'); window.location.href = 'division.php';</script>";
}

$students = $db->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Student</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Remove Student</h2>
        <form action="" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="student_id" class="form-label">Select Student</label>
                <select class="form-control" id="student_id" name="student_id" required>
                    <?php while ($student = $students->fetchArray()): ?>
                        <option value="<?php echo $student['id']; ?>"><?php echo $student['name']; ?> (Division <?php echo $student['division']; ?>)</option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Remove Student</button>
        </form>
    </div>
</body>
</html>
