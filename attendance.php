<?php
include 'includes/db.php';

// Get the division from the query string (Division A or B)
$division = isset($_GET['division']) ? $_GET['division'] : 'Division A';

// Fetch students from the database
$query = "SELECT * FROM students WHERE division = :division";
$stmt = $db->prepare($query);
$stmt->bindValue(':division', $division, SQLITE3_TEXT);
$result = $stmt->execute();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance - <?php echo htmlspecialchars($division); ?></title>
</head>
<body>
    <h1>Mark Attendance - <?php echo htmlspecialchars($division); ?></h1>
    <form action="save_attendance.php" method="post">
        <table border="1">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>";
                    echo "<input type='hidden' name='student_ids[]' value='" . $row['id'] . "'>";
                    echo "<select name='attendance_status[]'>";
                    echo "<option value='Present'>Present</option>";
                    echo "<option value='Absent'>Absent</option>";
                    echo "</select>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <input type="hidden" name="division" value="<?php echo htmlspecialchars($division); ?>">
        <button type="submit">Save Attendance</button>
    </form>
</body>
</html>
