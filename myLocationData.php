<?php
/**
 * Created by PhpStorm.
 * User: HojaeYoon
 * Date: 2018. 6. 7.
 * Time: PM 11:34
 */
function getMylocationData($lat,$lng)
{
    $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&sensor=true&language=ko-KR&key=AIzaSyAdugoqojSzFm9BpIeEiLvTomW7LvndZEw";
    $data = file_get_contents($url);
    $jsondata = json_decode($data, true);
    $myLocationDistrict = $jsondata['results'][1]['formatted_address'];
//    if($myLocationDistrict == ""){
//        return getMylocationData($lat,$lng);
//    }
    $ret_val = explode(" ", $myLocationDistrict);
    //Array ( [0] => 대한민국 [1] => 서울특별시 [2] => 종로구 [3] => 구기동 )
    return json_encode($ret_val);
}

function getMylocationDataString($lat,$lng)
{
    $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&sensor=true&language=ko-KR&key=AIzaSyAdugoqojSzFm9BpIeEiLvTomW7LvndZEw";
    $data = file_get_contents($url);
    $jsondata = json_decode($data, true);
    $myLocationDistrict = $jsondata['results'][1]['formatted_address'];
//    print_r($myLocationDistrict));
    return json_encode($myLocationDistrict);
}
