<?php
$idx = $_POST['idx'];
$userID = $_POST['userID'];

require_once 'connect.php';

$sql = "DELETE FROM `journal` WHERE idx = '$idx'";

$result = mysqli_query($con, $sql);

if ($result) {
    echo "Success";
} else {
    echo "Failed";
}
