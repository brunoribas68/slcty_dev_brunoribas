<?php

namespace App\Http\Controllers\Facades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurlController extends Controller
{
  <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurlController extends Controller
{

  public static function consultaPOST($url, $json,$token,$xAuth = ''){
    ini_set('max_execution_time', 999999999);
    set_time_limit(999999999);
    $headers = array(
      "POST  HTTP/1.1",
      "Content-type: application/json; charset=\"utf-8\"",
    );
    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $url );
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($soap_do, CURLOPT_POST,           true );
    curl_setopt($soap_do, CURLOPT_HTTPHEADER,   $headers);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS,    $json);
    $result = curl_exec($soap_do);
    $err = curl_error($soap_do);
    return $err ? $err : $result;
  }
}
