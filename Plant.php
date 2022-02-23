<?php
mysqli_query($con, 'SET NAMES utf8');

$ch = curl_init();
$url = 'http://api.nongsaro.go.kr/service/garden/gardenList';
$queryParams = '?'.urlencode('apiKey').'='.'??';
$queryParams .= '&'.urlencode('numOfRows'). '='.urlencode('217');

curl_setopt($ch, CURLOPT_URL, $url.$queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

$xml = simplexml_load_string($response);
$sql = "INSERT INTO `plant`(cntntsNo, cntntsSj) VALUES('$cntntsNo', '$cntntsSj')";

print_r(sizeof($xml->body->items->item));

$arr = array(array());
//$arr = $xml->body->items->item[1]->cntntsNo

// xml 파일에 '' 가 있어서 직접 수정함
for ($i=0; $i<sizeof($xml->body->items->item); $i++) {
    for ($j=0; $j<2; $j++) {
        if ($j == 0) {
            $arr[$i][$j] = $xml->body->items->item[$i]->cntntsNo;
            //echo $arr[$i][$j];
        } else {
            $arr[$i][$j] = $xml->body->items->item[$i]->cntntsSj;
            //echo $arr[$i][$j];
        }
    }
    $sub_sql_array[] = " ( '{$arr[$i][0]}', '{$arr[$i][1]}' ) "; 
}

$sql = "INSERT INTO `plant`(cntntsNo, cntntsSj) VALUES";
$sub_sql = implode(', ', $sub_sql_array); 
$sql .= $sub_sql; 
echo $sql;
mysqli_query($con, $sql);

exit;
