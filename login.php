<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM students WHERE email='$email'";
$result = $conn->query($sql);

if($result->num_rows > 0){

    $user = $result->fetch_assoc();

    if(password_verify($password,$user['password'])){
        $_SESSION['student_id'] = $user['id'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid password";
 
        echo "<a href='login.html'>Try Again</a>";
    }

} else {
    echo "User not found";
}

?>