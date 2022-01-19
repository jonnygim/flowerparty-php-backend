<?php
include "connect.php";

$sql = "SELECT * FROM `plant`";

$result = mysqli_query($con, $sql);
$data = array();



// query 돌려서 array에 넣기
if($result) {
    while($row = mysqli_fetch_array($result)) {
        array_push($data, array('cntntsNo'=>$row[0], 'cntntsSj'=>$row[1]));
    }

    // json 출력
    //echo "<pre>"; print_r($data); echo "</pre>";
    header('Content-Type: application/json; charset=utf8');
    $json = to_han (json_encode(array("webnautes"=>$data)));

    // php 5.3 이상 바로 json_encode 사용
    //$json = json_encode(array("webnautes"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    
    echo $json;
} else {
    echo "sql 문 처리중 에러 발생  : ";
    echo mysqli_error($con);
}

// json 작업 시 한글 깨지 해결 (PHP 5.3 이하는 함수로 작업해야 함 )
function han ($s) { 
    return reset(json_decode('{"s":"'.$s.'"}')); 
} 
function to_han ($str) { 
    return preg_replace('/(\\\u[a-f0-9]+)+/e','han("$0")',$str); 
} 

mysqli_close($con);
?>