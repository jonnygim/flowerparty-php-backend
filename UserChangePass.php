<?php
include "connect.php";

$userID = $_POST["userID"];
$nUserPass = $_POST["nUserPass"];

$query = "UPDATE `user` SET `userPassword`= ? WHERE `userID`= ?";

$statement = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($statement, "ss", $nUserPass, $userID);
mysqli_stmt_execute($statement);

mysqli_stmt_bind_result($statement, $nUserPass);

$response = array();
$response["success"] = false;


if(mysqli_stmt_affected_rows($statement)) {
    $response["success"] = true;
    $response["nUserPass"] = $nUserPass;
}

echo json_encode($response);