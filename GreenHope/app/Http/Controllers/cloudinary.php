<?php

namespace App\Http\Controllers;

use Cloudinary\Api\ApiUtils;
use Cloudinary\Configuration\CloudConfig;
use Illuminate\Http\Request;

class cloudinary extends Controller
{
    public static function getsignature(){
        $cloudinaryConfig = new CloudConfig([
            "cloud_name" => "dhti1bezp",
            "api_key" => "882123237232126",
            "api_secret" => "MU9exy0Lt03saG_DbAFhRW9BgEs"
        ]);
        $timestamp=time();
        $params =
            [
                "timestamp" => time(),
                "folder" => 'greenHope users'
            ];
        $data = ['signature' => ApiUtils::signParameters($params, $cloudinaryConfig->apiSecret), 'timestamp' => $timestamp];
        return $data;
    }
    public static function getDonationsSignature(){
        $cloudinaryConfig = new CloudConfig([
            "cloud_name" => "dhti1bezp",
            "api_key" => "882123237232126",
            "api_secret" => "MU9exy0Lt03saG_DbAFhRW9BgEs"
        ]);
        $timestamp=time();
        $params =
            [
                "timestamp" => time(),
                "folder" => 'greenHope donations'
            ];
        $data = ['signature' => ApiUtils::signParameters($params, $cloudinaryConfig->apiSecret), 'timestamp' => $timestamp];
        return $data;
    }
    public static function geteventsSignature(){
        $cloudinaryConfig = new CloudConfig([
            "cloud_name" => "dhti1bezp",
            "api_key" => "882123237232126",
            "api_secret" => "MU9exy0Lt03saG_DbAFhRW9BgEs"
        ]);
        $timestamp=time();
        $params =
            [
                "timestamp" => time(),
                "folder" => 'greenHope events'
            ];
        $data = ['signature' => ApiUtils::signParameters($params, $cloudinaryConfig->apiSecret), 'timestamp' => $timestamp];
        return $data;
    }
}
