<?php
require_once("modules/multiLang/MultiLang.php");
function getProviderPerformance($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    $performance = json_decode($response, true);

    return $performance;
};

function getChars($string, $first = 5, $last = 5) {
    $length = strlen($string);
    $f = substr($string, 0, $first);
    $l = substr($string, $length - $last, $last);
    
    return $f.'...'.$l;
}

?>