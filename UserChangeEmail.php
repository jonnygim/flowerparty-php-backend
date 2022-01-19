<?php
include "connect.php";

$userID = $_POST["userID"];
$nUserEmail = $_POST["nUserEmail"];

$query = "UPDATE `user` SET `userEmail`= ? WHERE `userID`= ?";

$statement = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($statement, "ss", $nUserEmail, $userID);
mysqli_stmt_execute($statement);

mysqli_stmt_bind_result($statement, $nUserEmail);

$response = array();
$response["success"] = false;


if(mysqli_stmt_affected_rows($statement)) {
    $response["success"] = true;
    $response["nUserEmail"] = $nUserEmail;
}

echo json_encode($response);