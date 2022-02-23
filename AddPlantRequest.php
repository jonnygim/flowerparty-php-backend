<?php
include "connect.php";

$plantName = $_POST["plantName"];
$userId = $_POST["userId"];
$data = array();

// 정보 나누기 
$data = explode(',', $plantName);
$name = str_replace("{cntntsSj=", "", $data[0]);
$data1 = str_replace("}", "", $data[1]);
$no = str_replace("cntntsNo=", "", $data1);
$plantNick = "null";

$statement = mysqli_prepare($con, "INSERT INTO `userPlant` VALUES (?, ?, ?, ?)"); //
mysqli_stmt_bind_param($statement, "ssss", $name, $no, $userId, $plantNick);
mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);
?>
