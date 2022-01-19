<?php
include "connect.php";

$userID = $_POST["userID"];

$statement = mysqli_prepare($con, "SELECT * FROM `userPlant` WHERE `userID` = ?");
mysqli_stmt_bind_param($statement, "s", $userID);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $plantName, $plantNo, $userID, $plantNick);

$response = array();
$response["success"] = false;

while (mysqli_stmt_fetch($statement)) {
    $response["success"] = true;
    $response["plantName"] = $plantName;
    $response["plantNo"] = $plantNo;
    $response["userID"] = $userID;
    $response["plantNick"] = $plantNick;
}

echo json_encode($response);