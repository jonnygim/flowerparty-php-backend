<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Content-type:application/json");

    require_once 'connect.php';

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO `journal`(title, content, userID) VALUES('$title', '$content', '$userID')";

    if (mysqli_query($con, $sql)) {
        $response['success'] = true;
        $response['message'] = "추가 완료";
    } else {
        $response['success'] = false;
        $response['message'] = "추가 실패";
    }
} else {
    $response['success'] = false;
    $response['message'] = "POST로 오지 않음";
}

echo json_encode($response);