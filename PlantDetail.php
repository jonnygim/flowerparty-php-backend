<?php
include "connect.php";

$ch = curl_init();
$url = 'http://api.nongsaro.go.kr/service/garden/gardenDtl';
$queryParams = '?'.urlencode('apiKey').'='.'20210908LGXOY6G03MU6JAYF22EEQ';
$queryParams .= '&'.urlencode('cntntsNo'). '='.urlencode('12938');

curl_setopt($ch, CURLOPT_URL, $url.$queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

$idx=1;
$xml = simplexml_load_string($response);
$items = $xml->body->item;
var_dump($items);

foreach ($items as $item) {
	echo($item->fmlNm)."<br>";
    echo($item->orgplceInfo)."<br>";
   

    echo($item->clCodeNm)."<br>"."<br>";
    }
    // distbNm
    // orgplceInfo 원산지
    // adviseInfo 조언정보
    // toxctyInfo 독성정보
    // fmlNm 과명
    // growthHgInfo
    // managelevelCodeNm
    // grwhTpCodeNm
    // winterLwetTpCodeNm
    // hdCodeNm
    // frtlzrInfo
    // soilInfo
    // watercycleSprngCodeNm
    // watercycleSummerCodeNm
    // watercycleAutumnCodeNm
    // watercycleWinterCodeNm
    // dlthtsManageInfo
    // speclmanageInfo
    // fncltyInfo
    // managedemanddoCodeNm
    // indoorpsncpacompositionCodeNm
    // ignSeasonCodeNm
    // prpgtmthCodeNm
    // lighttdemanddoCodeNm
    // postngplaceCodeNm
    // dlthtsCodeNm


echo "<pre>";
echo $arr;
echo "</pre>";
print_r($url.$queryParams);