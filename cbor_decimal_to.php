<?php
include("vendor/autoload.php");

// CBOR 10進からいろいろに変換

// ターゲットのCBOR 10進の配列
// {"variable1":100000,"variable2":"Hello, World!","valiable3":true}
$target = [120,65,123,34,118,97,114,105,97,98,108,101,49,34,58,49,48,48,48,48,48,44,34,118,97,114,105,97,98,108,101,50,34,58,34,72,101,108,108,111,44,32,87,111,114,108,100,33,34,44,34,118,97,108,105,97,98,108,101,51,34,58,116,114,117,101,125];

echo "ターゲットCBOR Decimalの配列:". PHP_EOL. print_r($target, true). PHP_EOL;

$string = arrayToString($target);
$string = \CBOR\CBOREncoder::decode($string);
echo "文字列:". $string. PHP_EOL;

echo "base64_encode:". base64_encode($string). PHP_EOL;

$encoded_data = \CBOR\CBOREncoder::encode($string);
$byte_arr = unpack("C*", $encoded_data);

echo "CBOR Byte Hex:" . implode(" ", array_map(function($byte){
        return  strtoupper(dechex($byte));
    }, $byte_arr)) . PHP_EOL;

echo "CBOR Byte Decimali:" . implode(" ", $byte_arr) . PHP_EOL;

function arrayToString($a)
{
    $s = '';
    foreach ($a as $c) {
        $s .= chr($c);
    };
    return $s;
}
