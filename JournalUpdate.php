<?php
header("Content-type:application/json");

require_once 'connect.php';

$idx = $_POST['idx'];
$title = $_POST['title'];
$content = $_POST['content'];

$sql = "UPDATE `journal` SET title = '$title', content = '$content' WHERE idx = '$idx'";

$result = mysqli_query($con, $sql);