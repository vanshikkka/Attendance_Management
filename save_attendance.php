<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_ids = $_POST['student_ids'];
    $attendance_status = $_POST['attendance_status'];
    $division = $_POST['division'];
    $date = date('Y-m-d');

    foreach ($student_ids as $index => $student_id) {
        $status = $attendance_status[$index];

        // Insert attendance record
        $query = "INSERT INTO attendance (student_id, date, status) VALUES (:student_id, :date, :status)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':student_id', $student_id, SQLITE3_INTEGER);
        $stmt->bindValue(':date', $date, SQLITE3_TEXT);
        $stmt->bindValue(':status', $status, SQLITE3_TEXT);
        $stmt->execute();
    }

    header("Location: dashboard.php?division=" . urlencode($division));
    exit();
}
?>
