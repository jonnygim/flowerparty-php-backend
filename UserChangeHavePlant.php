<?php
include "connect.php";

$userID = $_POST["userID"];
$havePlant = (int)$_POST["havePlant"];

$query = "UPDATE `user` SET `havePlant`= ? WHERE `userID`= ?";

$statement = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($statement, "ss", $havePlant, $userID);
mysqli_stmt_execute($statement);

mysqli_stmt_bind_result($statement, $havePlant);

$response = array();
$response["success"] = false;


if(mysqli_stmt_affected_rows($statement)) {
    $response["success"] = true;
    $response["havePlant"] = $havePlant;
}

echo json_encode($response);