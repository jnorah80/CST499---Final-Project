<?php
session_start();
include 'db.php';

$student_id = $_SESSION['student_id'];
$course_id = $_GET['id'];
$status = $_GET['status'];

$sql = "INSERT INTO registrations(student_id,course_id,status)
        VALUES('$student_id','$course_id','$status')";

$conn->query($sql);

header("Location: dashboard.php");
?>
