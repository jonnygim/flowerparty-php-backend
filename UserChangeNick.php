<?php
include "connect.php";

$userID = $_POST["userID"];
$nUserNick = $_POST["nUserNick"];

$query = "UPDATE `user` SET `userName`= ? WHERE `userID`= ?";

$statement = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($statement, "ss", $nUserNick, $userID);
mysqli_stmt_execute($statement);

mysqli_stmt_bind_result($statement, $nUserNick);

$response = array();
$response["success"] = false;


if(mysqli_stmt_affected_rows($statement)) {
    $response["success"] = true;
    $response["nUserNick"] = $nUserNick;
}

echo json_encode($response);