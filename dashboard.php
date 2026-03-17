<?php
session_start();
include 'db.php';

if(!isset($_SESSION['student_id'])){
    header("Location: login.html");
}

$student_id = $_SESSION['student_id'];
?>

<h2>UAGC Student Dashboard</h2>

<a href="courses.php">Register for Courses</a>

<h3>My Courses</h3>

<a href="logout.php">Log Out</a>
<?php

$sql = "SELECT course_name,status,course_id
        FROM registrations
        JOIN courses
        ON registrations.course_id = courses.course_id
        WHERE student_id = $student_id";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo $row['course_name'] . " (" . $row['status'] . ")";
    echo " <a href='drop.php?id=".$row['course_id']."'> Drop </a><br>";
}
?>