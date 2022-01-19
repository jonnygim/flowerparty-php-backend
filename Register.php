<?php
include "connect.php";

$userID = $_POST["userID"];
$userPassword = $_POST["userPassword"];
$userEmail = $_POST["userEmail"];
$userName = $_POST["userName"];
$havePlant = false;

$statement = mysqli_prepare($con, "INSERT INTO `user` VALUES (?, ?, ?, ?,?)");
mysqli_stmt_bind_param($statement, "sssss", $userID, $userPassword, $userEmail, $userName, $havePlant);
mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);
?>