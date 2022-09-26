<?php

include ('mysqlclase.php');
include ('login.php');

// tutorial https://code.tutsplus.com/tutorials/how-to-build-a-simple-rest-api-in-php--cms-37000
// a revisar crear i enviar un json
$url = 'https://domain.com/folder/post_data.php';
$data = json_decode(file_get_contents("https://age-of-empires-2-api.herokuapp.com/api/v1/civilizations"), true);
$crl = curl_init($url);
curl_setopt($crl, CURLOPT_POST, 1);
curl_setopt($crl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($crl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($crl);
echo $result;
//fi a revisar crear i enviar un json



?>