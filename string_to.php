<?php
include("vendor/autoload.php");

// 文字列からいろいろに変換

// ターゲット文字列
$target =  ["variable1" => 100000, "variable2" => "Hello, World!", "valiable3" => true];
$target = json_encode($target);

echo "ターゲット文字列:". $target. PHP_EOL;

echo "base64_encode:". base64_encode($target). PHP_EOL;

$encoded_data = \CBOR\CBOREncoder::encode($target);
$byte_arr = unpack("C*", $encoded_data);

echo "CBOR Byte Hex:" . implode(" ", array_map(function($byte){
        return  strtoupper(dechex($byte));
    }, $byte_arr)) . PHP_EOL;

echo "CBOR Byte Decimali:" . implode(" ", $byte_arr) . PHP_EOL;

//$decoded_variable = \CBOR\CBOREncoder::decode($encoded_data);
//var_dump($decoded_variable);

