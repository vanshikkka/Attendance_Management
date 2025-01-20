<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $month = $_POST['month'];

    $students = $db->query("SELECT * FROM students");
    echo "<h2 class='text-center'>Attendance Report for $month</h2>";
    echo "<table class='table table-bordered mt-4'>";
    echo "<thead><tr><th>Student Name</th><th>Present Days</th><th>Absent Days</th></tr></thead>";
    echo "<tbody>";

    while ($student = $students->fetchArray()) {
        $student_id = $student['id'];
        $name = $student['name'];

        $present_count = $db->querySingle("SELECT COUNT(*) FROM attendance WHERE student_id = $student_id AND status = 'present' AND strftime('%m', date) = '$month'");
        $absent_count = $db->querySingle("SELECT COUNT(*) FROM attendance WHERE student_id = $student_id AND status = 'absent' AND strftime('%m', date) = '$month'");

        echo "<tr><td>$name</td><td>$present_count</td><td>$absent_count</td></tr>";
    }

    echo "</tbody></table>";
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Generate Attendance Report</h2>
        <form action="" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="month" class="form-label">Select Month</label>
                <select class="form-control" id="month" name="month" required>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <!-- Add other months -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generate Report</button>
        </form>
    </div>
</body>
</html>
<?php
}
?>
