<?php
session_start();
include 'db.php';

$student_id = $_SESSION['student_id'];

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

echo "<h2>Available Courses</h2>";

while($row = $result->fetch_assoc()){

    $course_id = $row['course_id'];

    $count_sql = "SELECT COUNT(*) AS total
                  FROM registrations
                  WHERE course_id=$course_id AND status='enrolled'";
    $count = $conn->query($count_sql)->fetch_assoc()['total'];

    if($count < $row['capacity']){
        $status = "enrolled";
    } else {
        $status = "waitlist";
    }

    echo $row['course_name'];
    echo " <a href='register_course.php?id=$course_id&status=$status'> Register </a><br>";
}
?>