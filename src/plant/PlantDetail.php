<?php
include "connect.php";

$ch = curl_init();
$url = 'http://api.nongsaro.go.kr/service/garden/gardenDtl';
$queryParams = '?'.urlencode('apiKey').'='.'??';
$queryParams .= '&'.urlencode('cntntsNo'). '='.urlencode('12938');

curl_setopt($ch, CURLOPT_URL, $url.$queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

$xml = simplexml_load_string($response);
$items = $xml->body->item;

foreach ($items as $item) {
	echo($item->fmlNm)."<br>";
	echo($item->orgplceInfo)."<br>";
	echo($item->clCodeNm)."<br>"."<br>";
}

echo "<pre>";
echo $arr;
echo "</pre>";
print_r($url.$queryParams);
