<?php
include "connect.php";

$userID = $_POST["userID"];
$userEmail = $_POST["userEmail"];

$statement = mysqli_prepare($con, "SELECT * FROM `user` WHERE `userID` = ? AND `userEmail` = ?");
mysqli_stmt_bind_param($statement, "ss", $userID, $userEmail);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userID, $userEmail, $userPassword);

$response = array();
$response["success"] = false;

while (mysqli_stmt_fetch($statement)) {
    $response["success"] = true;
    $response["userID"] = $userID;    
    $response["userEmail"] = $userEmail;
    $response["userPassword"] = $userPassword;
}

echo json_encode($response);
?>