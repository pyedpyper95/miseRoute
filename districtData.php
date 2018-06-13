<?php
// Read District
function districtData()
{
    header('Access-Control-Allow-Origin: *');
    $url = "http://openapi.seoul.go.kr:8088/42454162596a6f6831323253504c4e43/json/SdeTlSccoSigW/1/25/";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    $parsed = json_decode($result, true);

    if ($err) {
        return "";

    } else {
        return $parsed;
    }
}

