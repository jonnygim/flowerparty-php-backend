<?php
include "connect.php";

$userID = $_POST["userID"];

$statement = mysqli_prepare($con, "SELECT * FROM `user` WHERE `userID` = ?");
mysqli_stmt_bind_param($statement, "s", $userID);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userID, $userPassword, $userEmail, $userName, $imgPath);

$response = array();
$response["success"] = false;

while (mysqli_stmt_fetch($statement)) {
    $response["success"] = true;
    $response["userID"] = $userID;
    $response["userPassword"] = $userPassword;
    $response["userEmail"] = $userEmail;
    $response["userName"] = $userName;
    $response["imgPath"] = $imgPath;
}

echo json_encode($response);