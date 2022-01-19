<?php
header("Content-type:application/json");
require_once 'connect.php';

$title = $_POST['title'];
$content = $_POST['content'];
$userID = $_POST['userID'];


$sql = mysqli_query($con, "SELECT * FROM `journal` WHERE `userID` = '$userID'");

$response = array();

while($row = mysqli_fetch_assoc($sql)) {
    array_push($response, array(
        'idx' => $row['idx'],
        'title' => $row['title'],
        'content' => $row['content'],
        'userID' => $row['userID']
    ));
}

echo json_encode($response);