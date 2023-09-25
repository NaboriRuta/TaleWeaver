<?php
$createUsername = $_POST['createUsername'];
$addEmail = $_POST['addEmail'];
$createPass = $_POST['createPass'];
$confirm = $_POST['confirm'];

$host = 'localhost';
$dbname = 'login_score';
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

echo "Connection Successful";

$sql = "INSERT INTO info (username, email, pass, confirm) VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss", $createUsername, $addEmail, $createPass, $confirm);

mysqli_stmt_execute($stmt);
echo "Record saved";