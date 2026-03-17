<?php
session_start();
include 'db.php';

$student_id = $_SESSION['student_id'];
$course_id = $_GET['id'];

$sql = "DELETE FROM registrations
        WHERE student_id=$student_id
        AND course_id=$course_id";
$conn->query($sql);

header("Location: dashboard.php");
?>
