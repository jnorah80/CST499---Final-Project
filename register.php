<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

if(empty($name) || empty($email) || empty($password))
{
    die("Fields cannot be empty");
}

if($password != $confirm)
{
    die("Passwords do not match");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO students(name,email,password)
VALUES('$name','$email','$hash')";

if($conn->query($sql))
{
    echo "Registration successful";
}else{
    echo "Error: " . $conn->error;
}
?>